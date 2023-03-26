<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;
use App\Models\AppBasicInfo;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
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
        $courseCategories = Schema::hasTable( (new ServiceCategory())->getTable() ) ? ServiceCategory::has('services')->get() : null;
        View::share([
            'currentUrl'=>$currentUrl,
            'title'=>$appInfo ? $appInfo->app_name : '',
            'nav_title'=>'',
            'courseCategories'=>$courseCategories,
        ]);
    }
}
