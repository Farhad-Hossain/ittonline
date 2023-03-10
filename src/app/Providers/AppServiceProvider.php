<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;
use App\Models\AppBasicInfo;

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
        View::share([
            'currentUrl'=>$currentUrl,
            'title'=>$appInfo ? $appInfo->app_name : '',
            'nav_title'=>''
        ]);
    }
}
