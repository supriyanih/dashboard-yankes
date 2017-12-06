<?php namespace Supriyanih\DashboardYankes;

use Illuminate\Support\ServiceProvider;
use Supriyanih\DashboardYankes\Console\Commands\DashboardYankesCommand;


class DashboardYankesServiceProvider extends ServiceProvider
{

    protected $defer = false;

    
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->migrationHandle();
    }

   
    public function register()
    {
        $this->app->singleton('dashboard-yankes', function ($app) {
            return new DashboardYankes;
        });

        $this->app->singleton('command.dashboard-yankes', function ($app) {
            return new DashboardYankesCommand;
        });

        $this->commands('command.dashboard-yankes');
    }


    public function provides()
    {
        return [
            'dashboard-yankes',
            'command.dashboard-yankes',
        ];
    }


    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }


    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('dashboard-yankes.php');

        $this->mergeConfigFrom($packageConfigPath, 'dashboard-yankes');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

  
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'dashboard-yankes');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/dashboard-yankes'),
        ], 'lang');
    }

 
    protected function viewHandle()
    {
         $packageViewsPath = __DIR__.'/resources/assets/components';
        $this->publishes([
            $packageViewsPath => resource_path('assets/components'),
        ], 'views');
    }

 

 
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }
}
