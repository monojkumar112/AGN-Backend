<?php

namespace App\Http\Livewire;

use App\Models\Speaking;
use App\Models\WatchNow;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class WatchTable extends Component
{
    public $data;
    protected $listeners = ['watchNowUpdated' => 'loadWatchNow'];
    public $editId;

    public function mount()
    {
        $this->loadWatchNow();
    }

    public function loadWatchNow()
    {
        $this->data = WatchNow::latest()->get();
    }

    public function deleteRecord($id)
    {
        $record = WatchNow::find($id);
        // dd($record->image);

        if ($record) {
            $filePath = $record->image;
            // Delete the associated image if it exists
            if (!empty($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            } else {
                Log::warning('File not found or path is null: ' . ($filePath ?? 'NULL'));
            }

            // Delete the record from the database
            $record->delete();
            flash()->addSuccess('Record deleted');
        }

        // Refresh the data
        $this->data = WatchNow::all();
    }

    public function editRecord($id)
    {
        $this->editId = $id;
        // dd($id);
        $this->emit('sendEditIdToWatchEdit', $this->editId);
    }

    public function render()
    {
        return view('livewire.watch-table');
    }
}
