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
    'page' => [
        'archive' => 'pages',
        'prefix'  => '',
        'view'    => 'gazette::types.page'
    ],

    /*
    |--------------------------------------------------------------------------
    | Post Settings
    |--------------------------------------------------------------------------
    |
    | Controlls the settings for posts.
    |
    */
    'post' => [
        'archive' => 'posts',
        'prefix'  => 'posts',
        'view'    => 'gazette::types.post'
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
