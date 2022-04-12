<?php

namespace Vendor\Package\Providers;

use App\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Vendor\Package\Console\Commands\InstallPackageCommand;
use Vendor\Package\Facades\Package;

class PackageServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/package.php", 'package');

        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // $this->registerViews();

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerCommands();
        // $this->registerTranslations();
        // $this->registerAssets();
        // $this->registerRoutes();
        // $this->registerBladeDirectives();
        // $this->publishStubs();
        // $this->registerLivewireComponents();
    }

    private function registerFacades()
    {
        $this->app->bind('package', function ($app) {
            return new Package();
        });
    }

    // private function registerViews()
    // {
    //     $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'package');

    //     $this->publishes([
    //         __DIR__ . '/../../resources/views' => resource_path('views/laravelir/package'),
    //     ]);
    // }


    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/package.php' => config_path('package.php')
        ], 'package-config');
    }

    // private function registerAssets()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../../resources/statics' => public_path('package'),
    //     ], 'package-assets');
    // }

    // private function publishStubs()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../Console/Stubs' => resource_path('vendor/laravelir/package/stubs'),
    //     ], 'package-stubs');
    // }

    // public function registerTranslations()
    // {
    //     $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'package');

    //     $this->publishes([
    //         __DIR__ . '/../../resources/lang' => resource_path('lang/laravelir/package'),
    //     ], 'package-langs');
    // }

    // private function registerRoutes()
    // {
    //     Route::group($this->routeConfiguration(), function () {
    //         $this->loadRoutesFrom(__DIR__ . '/../../routes/package.php', 'package-routes');
    //     });
    // }

    // private function routeConfiguration()
    // {
    //     return [
    //         'prefix' => config('package.routes.prefix'),
    //         'middleware' => config('package.routes.middleware'),
    //         'as' => 'package.'
    //     ];
    // }

    // protected function publishMigrations()
    // {
    // $timestamp = date('Y_m_d_His', time());
    //     $this->publishes([
    //         __DIR__ . '/../database/migrations/package_tables.stub' => database_path() . "/migrations/{$timestamp}package_tables.php",
    //     ], 'package-migrations');
    // }

    // protected function registerBladeDirectives()
    // {
    //     Blade::directive('format', function ($expression) {
    // return "<?php echo ($expression)->format('m/d/Y H:i') ?/>";
    //     });

    //     Blade::directive('config', function ($key) {
    //         return "<?php echo config('package.' . $key); ?/>";
    //     });
    // }

    // protected function registerMiddleware(Kernel $kernel, Router $router)
    // {
    //     // global
    //     $kernel->pushMiddleware(CapitalizeTitle::class);

    //     // route middleware
    //     // $router = $this->app->make(Router::class);
    //     $router->aliasMiddleware('capitalize', CapitalizeTitle::class);

    //     // group
    //     $router->pushMiddlewareToGroup('web', CapitalizeTitle::class);
    // }

    // public function registerLivewireComponents()
    // {
    // Livewire::component('test', Test::class);
    // }
}
