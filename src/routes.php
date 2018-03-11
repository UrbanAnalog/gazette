<?php

//* Kiosk
Route::group([
    'middleware' => ['web', 'dev']
], function () {
    //* Posts
    Route::resource('gazette/posts', 'UrbanAnalog\Gazette\Controllers\Http\Kiosk\PostsController');

    //* Media
    Route::get('gazette/media', 'UrbanAnalog\Gazette\ControllersHttp\Kiosk\MediaController@index')->name('gazette.media');
    Route::post('gazette/media', 'UrbanAnalog\Gazette\Controllers\Http\Kiosk\UploadController@upload')->name('gazette.upload');
});

//* Pages
Route::get(config('gazette.pages.prefix') . '/{slug}', 'UrbanAnalog\Gazette\Controllers\Http\PagesController@view');

//* Blog
Route::get(config('gazette.posts.archive'), 'UrbanAnalog\Gazette\Controllers\Http\BlogController@index');
Route::get(config('gazette.posts.prefix') . '/{slug}', 'UrbanAnalog\Gazette\Controllers\Http\BlogController@show');
