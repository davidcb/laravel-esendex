<?php

namespace Davidcb\LaravelEsendex;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LaravelEsendexServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/esendex.php' => config_path('esendex.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/esendex.php', 'esendex');

        $this->app->singleton('laravel-esendex', function ($app) {
            return new LaravelEsendex($app);
        });
    }

    public function provides()
    {
        return ['laravel-esendex'];
    }
}
