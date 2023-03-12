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
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/courses', 'FrontendController@courses')->name('courses');
Route::get('/free-quote', 'FrontendController@getQuote')->name('quote');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/quote-form', 'FrontendController@quoteForm')->name('quote_form');
Route::post('/contact-form', 'FrontendController@contactForm')->name('contact_form');

Route::get('/artisan-command-9090', 'FrontendController@executeCommand')->name('artisan_command');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace'=>'Admin', 'middleware'=>'auth'], function() {
    Route::get('', 'GeneralController@dashboard')->name('dashboard');
    Route::match(['GET', 'POST'], 'app-setup', 'AppSetupController@appSettings')->name('app_setup');
    Route::match(['GET', 'POST'], 'slider-setup', 'AppSetupController@sliderSetup')->name('slider_setup');
    Route::match(['POST'], 'slider-edit-add', 'AppSetupController@sliderAddEdit')->name('slider_add_edit');
    Route::match(['POST'], 'slider-img-delete', 'AppSetupController@sliderDelete')->name('slider_img_delete');

    Route::match(['GET'], 'quotes', 'QuotesController@quotes')->name('quotes');
    Route::match(['GET'], 'contacts', 'ContactsController@contacts')->name('contacts');

    Route::group(['prefix'=>'page-content', 'as'=>'page_content.'], function () {
        Route::match(["GET","POST"],'about-us', 'PageContentController@aboutUs')->name('about_us');
        Route::match(["GET","POST"],'free-quote', 'PageContentController@freeQuote')->name('free_quote');
        Route::match(["GET","POST"],'contact', 'PageContentController@contact')->name('contact');
    });

    // Course is service
    Route::group(['prefix'=>'courses', 'as'=>'course.'], function () {
        Route::match(['GET'], '/', 'ServiceController@services')->name('all');
        Route::match(['GET', 'POST'], 'add-course', 'ServiceController@addService')->name('add_course');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
