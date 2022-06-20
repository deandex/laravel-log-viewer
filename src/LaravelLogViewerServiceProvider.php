<?php

namespace Deandex\LaravelLogViewer;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelLogViewerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'logviewer');
    }

    public function boot()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'logviewer');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/logviewer'),
            ], 'views');
        }
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('logviewer.prefix'),
            'middleware' => config('logviewer.middleware'),
        ];
    }
}
