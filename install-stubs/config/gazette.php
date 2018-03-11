<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Page Settings
    |--------------------------------------------------------------------------
    |
    | Controlls the settings for pages.
    |
    */
    'pages' => [
        'archive' => 'pages',
        'prefix'  => '',
        'views'   => [
            'single' => 'gazette::types.page'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Post Settings
    |--------------------------------------------------------------------------
    |
    | Controlls the settings for posts.
    |
    */
    'posts' => [
        'archive'  => 'posts',
        'prefix'   => 'posts',
        'views'    => [
            'archives' => 'gazette::archives.posts',
            'single'   => 'gazette::post',
        ],
        'per_page' => 10
    ],

    /*
    |--------------------------------------------------------------------------
    | Comment Settings
    |--------------------------------------------------------------------------
    |
    | Controlls the settings for comments.
    |
    */
    'comments' => [
        'post_types' => ['post']
    ],

    /*
    |--------------------------------------------------------------------------
    | Media Settings
    |--------------------------------------------------------------------------
    |
    | Controlls the settings for comments.
    |
    */
    'media' => [
        'path'     => 'media',
        'disk'     => 'public',
        'types'    => 'jpeg,png,jpg,gif,svg',
        'max_size' => 2048
    ],

];
