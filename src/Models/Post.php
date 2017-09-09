<?php

namespace UrbanAnalog\Gazette\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'post_type',
        'meta_title',
        'meta_description',
        'robots',
        'media_id',
        'user_id'
    ];
}
