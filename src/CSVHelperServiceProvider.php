<?php

namespace narwanimonish\CSVHelper;

use Illuminate\Support\ServiceProvider;

class CSVHelperServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'narwanimonish');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'narwanimonish');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/csvhelper.php', 'csvhelper');

        // Register the service the package provides.
        $this->app->singleton('csvhelper', function ($app) {
            return new CSVHelper;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['csvhelper'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/csvhelper.php' => config_path('csvhelper.php'),
        ], 'csvhelper.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/narwanimonish'),
        ], 'csvhelper.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/narwanimonish'),
        ], 'csvhelper.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/narwanimonish'),
        ], 'csvhelper.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
