<?php

namespace App\Providers;

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
        //To Test Log for database query
        // DB::listen(function ($query) {
        //     \Log::info($query->sql, ['bindings' => $query->bindings, 'time' => $query->time]);
        // });
    }

}
