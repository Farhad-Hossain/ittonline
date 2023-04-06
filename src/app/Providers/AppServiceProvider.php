<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;
use App\Models\AppBasicInfo;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use App\Models\Course;
use App\Models\PageContentAboutUs;
use App\Models\ClassScheduleMenu;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $appInfo = Schema::hasTable('app_basic_infos') ? AppBasicInfo::first() : null;
        View::share('appInfo', $appInfo);

        $currentUrl = url()->full();
        $courseCategories = Schema::hasTable( (new ServiceCategory())->getTable() ) ? ServiceCategory::all() : null;
        $courses = Schema::hasTable( (new Course())->getTable() ) ? Course::where('is_active', 1)->get() : null;
        $about_us_menus = Schema::hasTable( (new PageContentAboutUs())->getTable() ) ? PageContentAboutUs::where('is_menu', 1)->get() : null;
        $class_schedule_menus = Schema::hasTable( (new ClassScheduleMenu())->getTable() ) ? ClassScheduleMenu::all() : null;
        View::share([
            'currentUrl'=>$currentUrl,
            'title'=>$appInfo ? $appInfo->app_name : '',
            'nav_title'=>'',
            'courseCategories'=>$courseCategories,
            'courses'=>$courses,
            'about_us_menus' => $about_us_menus,
            'class_schedule_menus' => $class_schedule_menus,
        ]);
    }
}
