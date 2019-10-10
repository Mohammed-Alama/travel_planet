<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Auth0\Login\Contract\Auth0UserRepository;
use \App\Repositories\TravelPlanetUserRepository;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            Auth0UserRepository::class,
            TravelPlanetUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
