<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Repositories\RoleRepository;

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
        Blade::if('admin', function() {
            return auth()->check() && auth()->user()->admin;
        });
        Blade::if('cuisinier', function() {
            return auth()->check() && auth()->user()->cuisinier;
        });
        Blade::if('particulier', function() {
            return auth()->check() && auth()->user()->particulier;
        });

        if (request()->server('SCRIPT_NAME') !== 'artisan'){
            view()->share('roles', resolve(RoleRepository::class)->getAll());
        }
    }
}
