<?php

use App\Http\Controllers\Frontend\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\SpeakingController;
use App\Http\Controllers\Backend\SpeakingWatchController;
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

//Backend Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['auth', 'admin']], function () {
    // Admin Dashboard and profile settings route
    Route::get('dashboard', 'AdminDashboardController@dashboard')->name('dashboard');
    Route::resource('slider', 'SliderController');
    Route::resource('company', 'CompanyLogoController');

    Route::get('account-setting', 'AccountSettingController@accountSetting')->name('account.setting');
    Route::put('account-update', 'AccountSettingController@accountUpdate')->name('account.update');
    Route::put('password-update', 'AccountSettingController@passwordUpdate')->name('password.update');
    // Contact-Us Lists
    Route::resource('contact', 'ContactUsController');
    Route::resource('subscribers', 'SubscribersController');
    Route::resource('lets-talk', 'LetsTalkController');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::resource('/category', 'CategoryController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/course', 'CourseController');
    Route::post('/popular-between', [AdminDashboardController::class, 'popular_between'])->name('popular.between');

    // speaking
    Route::get('/speaking', SpeakingController::class)->name('speaking');
    Route::resource('/speaking-watch', 'SpeakingWatchController');
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
