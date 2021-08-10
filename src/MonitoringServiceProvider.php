<?php

namespace Foxyntax\Monitoring;

use Illuminate\Support\ServiceProvider;

class MonitoringServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/monitor.php', 'monitor'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration file
        $this->publishes([
            __DIR__.'/config/monitor.php' => config_path('monitor.php'),
        ], 'config');

        // Publish views [email views] file
        $this->publishes([
            __DIR__.'/views/development.php'=> resource_path('views/emails/fx_development.blade.php'),
            __DIR__.'/views/client.php'     => resource_path('views/emails/fx_client.blade.php')
        ], 'views');

        // Publishing translations
        $this->loadTranslationsFrom(__DIR__.'/app/lang', 'monitoring');

        // Load migration
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        // Load API routes
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        
    }
}
