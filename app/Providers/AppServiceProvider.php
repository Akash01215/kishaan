<?php

namespace App\Providers;
use App\SiteSetting;

use Illuminate\Support\ServiceProvider;

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
       $settings = SiteSetting::pluck('value', 'key')->toArray();
       view()->share('globalSettings', $settings);
    }
}

