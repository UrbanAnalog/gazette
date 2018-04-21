<?php

//* Kiosk
Route::namespace('\UrbanAnalog\Gazette\Http\Controllers\Kiosk')
    ->name('gazette.')
    ->middleware(['web', 'dev'])
    ->group(function () {
        //* Posts
        Route::resource('gazette/posts', 'PostsController');

        //* Media
        Route::get('gazette/media', 'MediaController@index')->name('media');
        Route::post('gazette/media', 'UploadController@upload')->name('upload');
    });

Route::namespace('\UrbanAnalog\Gazette\Http\Controllers')
    ->middleware(['web', 'bindings'])
    ->group(function () {
        //* Pages
        Route::get(config('gazette.pages.prefix') . '/{slug}', 'PagesController@show');

        //* Blog
        Route::get(config('gazette.posts.archive'), 'BlogController@index');
        Route::get(config('gazette.posts.prefix') . '/{post}', 'BlogController@show');
    });
