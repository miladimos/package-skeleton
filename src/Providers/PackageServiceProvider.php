<?php

namespace Miladimos\Package\Providers;

use App\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Miladimos\Package\Facades\PackageFacade;
use Miladimos\Package\Console\Commands\InstallPackageCommand;

class PackageServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/config.php", 'package');

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
            return new PackageFacade();
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
    //         __DIR__ . '/../../resources/statics' => public_path('dashboarder'),
    //     ], 'dashboarder-assets');
    // }

    // private function publishStubs()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../Console/Stubs' => resource_path('vendor/laravelir/dashboarder/stubs'),
    //     ], 'dashboarder-stubs');
    // }



    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'dashboarder');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/laravelir/dashboarder'),
        ], 'dashboarder-langs');
    }

    // private function registerRoutes()
    // {
    //     Route::group($this->routeConfiguration(), function () {
    //         $this->loadRoutesFrom(__DIR__ . '/../../routes/dashboarder.php', 'dashboarder-routes');
    //     });
    // }

    // private function routeConfiguration()
    // {
    //     return [
    //         'prefix' => config('dashboarder.routes.prefix'),
    //         'middleware' => config('dashboarder.routes.middleware'),
    //         'as' => 'dashboarder.'
    //     ];
    // }

    // protected function publishMigrations()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../database/migrations/create_dashboarder_tables.stub' => database_path() . "/migrations/{$timestamp}_create_dashboarder_tables.php",
    //     ], 'dashboarder-migrations');
    // }

    // protected function registerBladeDirectives()
    // {
    //     Blade::directive('format', function ($expression) {
            // return "<?php echo ($expression)->format('m/d/Y H:i') ?/>";
    //     });

    //     Blade::directive('config', function ($key) {
    //         return "<?php echo config('dashboarder.' . $key); ?/>";
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
    //     // Livewire::component('test', Test::class);
    // }
}
