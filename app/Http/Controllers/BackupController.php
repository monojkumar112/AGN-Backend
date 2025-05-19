<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Tasks\Backup\BackupJob;
use Spatie\Backup\Config\Config;
use Illuminate\Support\Collection;
use Spatie\Backup\Tasks\Backup\FileSelection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BackupController extends Controller
{
    public function index()
    {
        $backups = BackupDestination::create('local', config('backup.backup.name'))->backups();
        return view('backend.backup.index', compact('backups'));
    }

    public function download()
    {
        try {
            // Create a new backup
            $config = Config::fromArray(config('backup'));
            $backupJob = new BackupJob($config);

            // Disable signals since we're running in a web context
            $backupJob->disableSignals();

            // Configure file selection
            $fileSelection = FileSelection::create([base_path()])
                ->excludeFilesFrom([
                    base_path('vendor'),
                    base_path('node_modules')
                ]);
            $backupJob->setFileSelection($fileSelection);

            // Set up backup destinations
            $backupDestinations = new Collection([
                BackupDestination::create('local', config('backup.backup.name'))
            ]);
            $backupJob->setBackupDestinations($backupDestinations);

            // Run the backup
            $backupJob->run();

            // Get the latest backup file
            $backups = BackupDestination::create('local', config('backup.backup.name'))->backups();
            $latestBackup = $backups->first();

            if (!$latestBackup) {
                return back()->with('error', 'No backup file found!');
            }

            // Get the file path and verify it exists
            $path = $latestBackup->path();
            if (!Storage::disk('local')->exists($path)) {
                return back()->with('error', 'Backup file not found in storage!');
            }

            // Create database backup
            $tables = DB::select('SHOW TABLES');
            $databaseBackup = '';

            foreach ($tables as $table) {
                $tableName = array_values((array) $table)[0];

                // Get table structure
                $createTable = DB::select('SHOW CREATE TABLE ' . $tableName)[0];
                $databaseBackup .= "\n\n" . $createTable->{'Create Table'} . ";\n\n";

                // Get table data
                $rows = DB::table($tableName)->get();
                foreach ($rows as $row) {
                    $values = array_map(function ($value) {
                        return is_null($value) ? 'NULL' : "'" . addslashes($value) . "'";
                    }, (array) $row);

                    $databaseBackup .= "INSERT INTO `$tableName` VALUES (" . implode(', ', $values) . ");\n";
                }
            }

            // Save database backup
            $dbBackupPath = 'database-backup-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sql';
            Storage::disk('local')->put($dbBackupPath, $databaseBackup);

            // Return both files as a zip
            $zip = new \ZipArchive();
            $zipPath = storage_path('app/backup-with-db.zip');

            if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
                // Add the backup zip
                $zip->addFile(storage_path('app/' . $path), basename($path));
                // Add the database backup
                $zip->addFile(storage_path('app/' . $dbBackupPath), $dbBackupPath);
                $zip->close();

                // Clean up the database backup file
                Storage::disk('local')->delete($dbBackupPath);

                return response()->download($zipPath)->deleteFileAfterSend();
            }

            return back()->with('error', 'Failed to create backup archive!');
        } catch (\Exception $e) {
            return back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function downloadSpecific($filename)
    {
        try {
            $backup = BackupDestination::create('local', config('backup.backup.name'))
                ->backups()
                ->first(function (Backup $backup) use ($filename) {
                    return basename($backup->path()) === $filename;
                });

            if (!$backup) {
                return back()->with('error', 'Backup file not found!');
            }

            return response()->download(storage_path('app/' . $backup->path()));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to download backup: ' . $e->getMessage());
        }
    }

    public function delete($filename)
    {
        try {
            $backup = BackupDestination::create('local', config('backup.backup.name'))
                ->backups()
                ->first(function (Backup $backup) use ($filename) {
                    return basename($backup->path()) === $filename;
                });

            if (!$backup) {
                return back()->with('error', 'Backup file not found!');
            }

            Storage::disk('local')->delete($backup->path());
            return back()->with('success', 'Backup deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete backup: ' . $e->getMessage());
        }
    }
}
