<?php
/**
 * @see https://devdojo.com/blog/tutorials/how-to-create-a-laravel-package
 */

namespace UrbanAnalog\Gazette;

use Illuminate\Support\ServiceProvider;

class GazetteServiceProvider extends ServiceProvider
{
    public $version = '0.2.0';

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'gazette');

        $this->publishes([
            __DIR__.'/../install-stubs/config/gazette.php' => config_path('gazette.php')
        ], 'config');

        if (! class_exists('CreateMediaTable')) {
            $this->publishes([
                __DIR__.'/../install-stubs/database/migrations/create_media_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_media_table.php'),
            ], 'migrations');
        }

        if (! class_exists('CreatePostsTable')) {
            $this->publishes([
                __DIR__.'/../install-stubs/database/migrations/create_posts_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_posts_table.php'),
            ], 'migrations');
        }
    }

    public function register()
    {
        $this->app->make('UrbanAnalog\Gazette\Http\Controllers\UploadController');
        $this->app->make('UrbanAnalog\Gazette\Http\Controllers\MediaController');
        $this->app->make('UrbanAnalog\Gazette\Http\Controllers\PostsController');
    }
}
