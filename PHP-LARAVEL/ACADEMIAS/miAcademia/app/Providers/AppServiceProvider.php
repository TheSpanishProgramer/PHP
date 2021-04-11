<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Que use bootstrap
use Illuminate\Pagination\Paginator;

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
        //Para que use la paginacion de bootstrap
        Paginator::useBootstrap();
    }
}
