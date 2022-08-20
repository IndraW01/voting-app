<?php

namespace App\Providers;

use App\Repository\Impl\RegisterRepositoryImpl;
use App\Repository\RegisterRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RegisterServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegisterRepository::class, function($app) {
            return new RegisterRepositoryImpl;
        });
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

    public function provides()
    {
        return [RegisterRepository::class];
    }
}
