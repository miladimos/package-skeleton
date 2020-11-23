<?php

namespace Miladimos\Package\Providers;

use Illuminate\Support\ServiceProvider;
use Miladimos\Package\Facades\PackageFacade;


class PackageServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/config.php", 'package');

        $this->app->bind('package', function($app){
            return new PackageFacade();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {

            $this->registerPublishes();

        }

    }

    private function registerPublishes()
    {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('package.php')
        ], 'package-config');

    }
}
