<?php

Route::group([
    'middleware' => ['web','dev']
], function () {
    //* Posts
    Route::resource('gazette/posts', 'UrbanAnalog\Gazette\Controllers\PostsController');

    //* Media
    Route::get('gazette/media', 'UrbanAnalog\Gazette\Controllers\MediaController@index')->name('gazette.media');
    Route::post('gazette/media', 'UrbanAnalog\Gazette\Controllers\UploadController@upload')->name('gazette.upload');
});

Route::get(config('gazette.page.prefix') . '/{slug}', 'UrbanAnalog\Gazette\Controllers\PostsController@view');
Route::get(config('gazette.post.prefix') . '/{slug}', 'UrbanAnalog\Gazette\Controllers\PostsController@view');
