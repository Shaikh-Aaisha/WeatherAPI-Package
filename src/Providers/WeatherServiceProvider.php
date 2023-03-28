<?php

namespace Weather\Weatherbit\Providers;
use Weather\Weatherbit\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WeatherService::class, function () {
            return new WeatherService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        
    }
}
