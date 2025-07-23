<?php

namespace Niharb\MyForm;

use Illuminate\Support\ServiceProvider;

class MyFormServiceProvider extends ServiceProvider
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
        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'my-form');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/my-form'),
        ], 'my-form-views');

        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'my-form-migrations');

        // seeders
    $this->publishes([
        __DIR__.'/../database/seeders' => database_path('seeders'),
    ], 'my-form-seeders');

        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}