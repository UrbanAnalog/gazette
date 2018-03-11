<?php

//* Kiosk
Route::namespace('\UrbanAnalog\Gazette\Controllers\Http\Kiosk')->group([
    'middleware' => ['web', 'dev']
], function () {
    //* Posts
    Route::resource('gazette/posts', 'PostsController');

    //* Media
    Route::get('gazette/media', 'MediaController@index')->name('gazette.media');
    Route::post('gazette/media', 'UploadController@upload')->name('gazette.upload');
});

Route::namespace('\UrbanAnalog\Gazette\Controllers\Http')->group(function () {
    //* Pages
    Route::get(config('gazette.pages.prefix') . '/{slug}', 'PagesController@view');

    //* Blog
    Route::get(config('gazette.posts.archive'), 'BlogController@index');
    Route::get(config('gazette.posts.prefix') . '/{slug}', 'BlogController@show');
});
