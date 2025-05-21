<?php

use App\Http\Controllers\Frontend\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
//Frontend Routes
Route::get('/', 'Frontend\WebController@index')->name('index');
Route::get('/service', [WebController::class, 'service'])->name('service');
Route::get('/advisor', [WebController::class, 'advisor'])->name('advisor');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/donate', [WebController::class, 'donate'])->name('donate');
Route::get('/achia-nila', [WebController::class, 'achiaNila'])->name('achiaNila');
Route::post('/contact/store', [WebController::class, 'contactStore'])->name('contact.store');
//Backend Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['auth', 'admin']], function () {
    // Admin Dashboard and profile settings route
    Route::get('dashboard', 'AdminDashboardController@dashboard')->name('dashboard');
    Route::resource('slider', 'SliderController');
    Route::resource('company', 'CompanyLogoController');
    Route::resource('service', 'ServiceController');
    Route::resource('advisory', 'AdvisoryTeamController');
    Route::resource('technology', 'TechnologyTeamController');
    Route::resource('event', 'EventTeamController');
    Route::resource('leadership', 'LeadershipTeamController');

    Route::get('account-setting', 'AccountSettingController@accountSetting')->name('account.setting');
    Route::put('account-update', 'AccountSettingController@accountUpdate')->name('account.update');
    Route::put('password-update', 'AccountSettingController@passwordUpdate')->name('password.update');
    // Contact-Us Lists
    Route::resource('contact', 'ContactUsController');

});
//User Or Author Routes
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', 'AuthorDashboardController@dashboard')->name('dashboard');
});


// Backup Routes
Route::group(
    ['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['auth', 'admin']],
    function () {
        Route::get('/backup', [BackupController::class, 'index'])->name('backup.index');
        Route::get('/backup/download', [BackupController::class, 'download'])->name('backup.download');
        Route::get('/backup/download/{filename}', [BackupController::class, 'downloadSpecific'])->name('backup.download.specific');
        Route::delete('/backup/{filename}', [BackupController::class, 'delete'])->name('backup.delete');
    }
);
