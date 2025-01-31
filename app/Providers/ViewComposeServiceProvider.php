<?php

namespace App\Providers;

use App\View\Composers\BranchComposer;
use App\View\Composers\RoleComposer;
use Illuminate\Support\Facades\View;
use App\View\Composers\CountryComposer;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\UserTypeComposer;

class ViewComposeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //User
        View::composer('admin.user.create',RoleComposer::class);
        View::composer('admin.user.edit',RoleComposer::class);
    }
}
