<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;
use App\Models\AppBasicInfo;
use App\Models\ServiceCategory;

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
        $appInfo = AppBasicInfo::first() or null;
        View::share('appInfo', $appInfo);

        $currentUrl = url()->full();
        $courseCategories = ServiceCategory::has('services')->get();
        View::share([
            'currentUrl'=>$currentUrl,
            'title'=>$appInfo ? $appInfo->app_name : '',
            'nav_title'=>'',
            'courseCategories'=>$courseCategories,
        ]);
    }
}
