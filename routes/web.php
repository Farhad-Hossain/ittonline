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
Route::get('/about-us/{menu_slag}', 'FrontendController@aboutUsMenu')->name('about_us_menu');
Route::get('/fee/{menu_slag}', 'FrontendController@feeMenu')->name('fee_menu');
Route::get('/class-schedule/{menu_slag}', 'FrontendController@classScheduleMenu')->name('class_schedule_menu');
Route::get('/courses', 'FrontendController@courses')->name('courses');
Route::get('/course-details/{id}', 'FrontendController@courseDetails')->name('course_details');
Route::get('/training-details/{id}', 'FrontendController@trainingDetails')->name('training_details');
Route::get('/free-quote', 'FrontendController@getQuote')->name('quote');
Route::get('inquiry-form', 'FrontendController@inqueryForm')->name('inquery_form');

Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/quote-form', 'FrontendController@quoteForm')->name('quote_form');
Route::post('/contact-form', 'FrontendController@contactForm')->name('contact_form');
Route::get('/gallery', 'FrontendController@gallery')->name('gallery');
Route::get('/our-excelent--members', 'FrontendController@team')->name('team');
Route::get('/testimonials', 'FrontendController@testimonials')->name('testimonials');

Route::get('/artisan-command-9090', 'FrontendController@executeCommand')->name('artisan_command');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace'=>'Admin', 'middleware'=>'auth'], function() {
    Route::get('', 'GeneralController@dashboard')->name('dashboard');
    Route::match(['GET','POST'], 'profile-setting', 'GeneralController@profile')->name('profile');
    Route::match(['POST'], 'change-password', 'GeneralController@changePassword')->name('change_password');

    Route::match(['GET', 'POST'], 'app-setup', 'AppSetupController@appSettings')->name('app_setup');
    Route::match(['GET', 'POST'], 'slider-setup', 'AppSetupController@sliderSetup')->name('slider_setup');
    Route::match(['POST'], 'slider-edit-add', 'AppSetupController@sliderAddEdit')->name('slider_add_edit');
    Route::match(['POST'], 'slider-img-delete', 'AppSetupController@sliderDelete')->name('slider_img_delete');

    Route::match(['GET'], 'quotes', 'QuotesController@quotes')->name('quotes');
    Route::match(['GET'], 'contacts', 'ContactsController@contacts')->name('contacts');
    Route::match(['GET'], 'stuffs', 'StuffController@stuffs')->name('stuffs');
    Route::match(['POST'], 'stuffs/add', 'StuffController@addStuff')->name('stuff.add');

    Route::group(['prefix'=>'page-content', 'as'=>'page_content.'], function () {
        Route::match(["GET","POST"],'about-us', 'PageContentController@aboutUs')->name('about_us');
        Route::match(["GET"],'about-us-menus', 'PageContentController@aboutUsMenus')->name('about_us_menus');
        Route::match(["GET", "POST"],'about-us-menu-content-update', 'PageContentController@aboutUsMenuContentUpdate')
            ->name('about_us_menu_content_update');

        Route::match(["GET"],'fee-menus', 'PageContentController@feeMenus')->name('fee_menus');
        Route::match(['POST'], 'delete-fee-menu', 'PageContentController@deleteFeeMenu')->name('fee_menu_delete');

        Route::match(["GET", "POST"],'fee-menu-content-update', 'PageContentController@feeMenuContentUpdate')
            ->name('fee_menu_content_update');

        Route::match(['GET', 'POST'], 'class-schedule-menus', 'PageContentController@classScheduleMenus')->name('class_schedule_menus');
        Route::match(['GET','POST'],'class-schedule-menu-content-update', 'PageContentController@classScheduleMenuContentUpdate')
            ->name('class_schedule_menu_content_update');

        Route::match(["GET","POST"],'free-quote', 'PageContentController@freeQuote')->name('free_quote');
        Route::match(["GET","POST"],'contact', 'PageContentController@contact')->name('contact');
        Route::match(["GET","POST"],'why-choose-us', 'PageContentController@whyChooseUs')->name('why_choose_us');
    });

    // Course is service
    Route::group(['prefix'=>'courses', 'as'=>'course.'], function () {
        Route::match(['GET'], '/', 'ServiceController@services')->name('all');
        Route::match(['GET', 'POST'], 'save-course', 'ServiceController@saveService')->name('save');
        Route::match(['POST'], 'delete-course', 'ServiceController@deleteService')->name('delete');
        Route::match(['GET'], 'categories', 'ServiceController@serviceCategories')->name('categories');
        Route::match(['POST'], 'add-category', 'ServiceController@addServiceCategory')->name('add_category');
        Route::match(['POST'], 'edit-category', 'ServiceController@editServiceCategory')->name('edit_category');
    });

    // Corprate training
    Route::group(['prefix'=>'corp-training', 'as'=>'corp_training.'], function () {
        Route::match(['GET'], '/', 'ServiceController@trainings')->name('all');
        Route::match(['GET', 'POST'], 'save-training', 'ServiceController@saveTraining')->name('save');
        Route::match(['POST'], 'delete-training', 'ServiceController@deleteTraining')->name('delete');
        Route::match(['GET'], 'categories', 'ServiceController@trainingCategories')->name('categories');
        Route::match(['POST'], 'add-category', 'ServiceController@addTrainingCategory')->name('add_category');
        Route::match(['POST'], 'edit-category', 'ServiceController@editTrainingCategory')->name('edit_category');
    });

    // Gallery
    Route::group(['prefix'=>'gallery', 'as'=>'gallery.'], function () {
        Route::match(['GET'], '/', 'GalleryController@gallery')->name('list');
        Route::match(['POST'], '/save', 'GalleryController@galleryAddEdit')->name('add_edit');
        Route::match(['POST'], '/img-delete', 'GalleryController@galleryImageDelete')->name('img_delete');

        Route::match(['GET'], 'events', 'GalleryController@events')->name('events');
        Route::match(['POST'], 'events/add-edit', 'GalleryController@eventAddEdit')->name('add_event');
        Route::match(['POST'], 'events/delete', 'GalleryController@eventDelete')->name('delete_event');
    });

    // Testimonial
    Route::group(['prefix'=>'testimonials', 'as'=>'testimonial.'], function() {
        Route::match(['GET'], '/', 'TestimonialController@getList')->name('list');
        Route::match(['POST'], '/add', 'TestimonialController@addTestimonial')->name('add');
        Route::match(['POST'], '/edit', 'TestimonialController@editTestimonial')->name('edit');
        Route::match(['POST'], '/delete', 'TestimonialController@deleteTestimonial')->name('delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');