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
use App\Models\CorpTraining;
use App\Models\FeeMenu;
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
        $courses = Schema::hasTable( (new Course())->getTable() ) ? Course::where('is_active', 1)->orderBy('id', 'desc')->get() : null;
        $about_us_menus = Schema::hasTable( (new PageContentAboutUs())->getTable() ) ? PageContentAboutUs::where('is_menu', 1)->get() : null;
        $class_schedule_menus = Schema::hasTable( (new ClassScheduleMenu())->getTable() ) ? ClassScheduleMenu::all() : null;
        $corp_training_categories = Schema::hasTable( (new CorpTraining())->getTable() ) ? CorpTraining::with('trainings')->where('is_category', 1)->where('is_active', 1)->get() : null;
        $fee_menus = Schema::hasTable( (new FeeMenu())->getTable() ) ? FeeMenu::all() : null;
        View::share([
            'currentUrl'=>$currentUrl,
            'title'=>$appInfo ? $appInfo->app_name : '',
            'nav_title'=>'',
            'courseCategories'=>$courseCategories,
            'courses'=>$courses,
            'about_us_menus' => $about_us_menus,
            'class_schedule_menus' => $class_schedule_menus,
            'corp_training_categories' => $corp_training_categories,
            'fee_menus' => $fee_menus,
        ]);
    }
}