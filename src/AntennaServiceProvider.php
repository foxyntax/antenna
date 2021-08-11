<?php

namespace Foxyntax\Antenna;

use Illuminate\Support\ServiceProvider;

class AntennaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/antenna.php', 'antenna'
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
            __DIR__.'/config/antenna.php' => config_path('antenna.php'),
        ], 'config');

        // Publish views [email views] file
        $this->publishes([
            __DIR__.'/app/views/fx_development.blade.php'=> resource_path('views/emails/fx_development.blade.php'),
            __DIR__.'/app/views/fx_client.blade.php'     => resource_path('views/emails/fx_client.blade.php')
        ], 'views');

        // Publishing translations
        $this->loadTranslationsFrom(__DIR__.'/app/lang', 'antenna');

        // Load migration
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        // Load API routes
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        
    }
}
