<?php

namespace Webberman\Helper;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/helper.php', 'helper' );

        $this->app->singleton('helper', function () {
            return new Helper;
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/helper.php' => $this->app->configPath('helper.php')
            ],'helper-config');
        }

        foreach( Config::get('helper.autoload') as $helper ) {
            $this->app['helper']->load($helper);
        }
    }
}
