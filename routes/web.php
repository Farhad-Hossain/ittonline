<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', 'FrontendController@welcome')->name('welcome');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace'=>'Admin', 'middleware'=>'auth'], function() {
    Route::get('', 'GeneralController@dashboard')->name('dashboard');
    Route::match(['GET', 'POST'], 'app-setup', 'AppSetupController@appSettings')->name('app_setup');
    Route::match(['GET', 'POST'], 'slider-setup', 'AppSetupController@sliderSetup')->name('slider_setup');
    Route::match(['POST'], 'slider-edit-add', 'AppSetupController@sliderAddEdit')->name('slider_add_edit');
    Route::match(['POST'], 'slider-img-delete', 'AppSetupController@sliderDelete')->name('slider_img_delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
