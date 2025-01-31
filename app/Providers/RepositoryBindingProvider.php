<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BasicDashboard\Foundations\Domain\Pages\Repositories\Eloquent\PageRepository;
use BasicDashboard\Foundations\Domain\Pages\Repositories\PageRepositoryInterface;
use BasicDashboard\Foundations\Domain\Roles\Repositories\Eloquent\RoleRepository;
use BasicDashboard\Foundations\Domain\Roles\Repositories\RoleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Audits\Repositories\AuditRepositoryInterface;
use BasicDashboard\Foundations\Domain\Audits\Repositories\Eloquent\AuditRepository;
use BasicDashboard\Foundations\Domain\Settings\Repositories\Eloquent\SettingRepository;
use BasicDashboard\Foundations\Domain\Settings\Repositories\SettingRepositoryInterface;
use BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent\UserRepository;
use BasicDashboard\Foundations\Domain\Users\Repositories\UserRepositoryInterface;

class RepositoryBindingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuditRepositoryInterface::class,AuditRepository::class);
        $this->app->bind(PageRepositoryInterface::class,PageRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
