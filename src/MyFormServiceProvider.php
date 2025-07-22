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
        // Views publish karo
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'my-form');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/my-form'),
        ], 'my-form-views');

        // Migrations publish karo
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'my-form-migrations');

        // Routes load karo
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}