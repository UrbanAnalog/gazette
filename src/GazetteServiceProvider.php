<?php
/**
 * @see https://devdojo.com/blog/tutorials/how-to-create-a-laravel-package
 */

namespace UrbanAnalog\Gazette;

use Illuminate\Support\ServiceProvider;

class GazetteServiceProvider extends ServiceProvider
{
    public $version = '0.0.6';

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'gazette');

        $this->publishes([
            __DIR__.'/../config/gazette.php' => config_path('gazette.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    public function register()
    {
        $this->app->make('UrbanAnalog\Gazette\Controllers\UploadController');
        $this->app->make('UrbanAnalog\Gazette\Controllers\MediaController');
        $this->app->make('UrbanAnalog\Gazette\Controllers\PostsController');
    }
}
