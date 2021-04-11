<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //FIXME quitar en deploy
        if (App::environment('local')) {

            DB::enableQueryLog();

            DB::listen(function ($query) {
                Log::info(sprintf("%s (%s) : %s", $query->sql, implode(",", $query->bindings), $query->time));
            });

        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
