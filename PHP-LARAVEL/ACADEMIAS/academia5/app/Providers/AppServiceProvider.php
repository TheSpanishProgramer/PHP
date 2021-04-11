<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Schema;

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
        //Para MariaDB Schema::defaultStringLength(191); y el use Schema
    }
}
