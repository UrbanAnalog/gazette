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
        'prefix'  => 'pages',
        'views'   => [
            'single' => 'gazette::pages.single'
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
            'card'    => 'gazette::posts.card',
            'archive' => 'gazette::posts.archive',
            'single'  => 'gazette::posts.single',
        ],
        'per_page'       => 10,
        'featured_image' => [
            'width'  => 600,
            'height' => 400
        ]
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
