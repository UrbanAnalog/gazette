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
        'user_id',
        'password',
    ];

    protected $appends = [
        'path'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function path()
    {
        $type = str_plural($this->type);

        return url(config("gazette.{$type}.prefix") . '/' . $this->slug);
    }

    public function excerpt()
    {
        return ! empty($this->meta_description)
            ? $this->meta_description
            : str_limit(strip_tags($this->content), 255, '...');
    }

    public function featured_image()
    {
        return $this->belongsTo('\UrbanAnalog\Gazette\Models\Media', 'media_id');
    }

    public function has_thumbnail() {
        return isset($this->featured_image->filename);
    }

    public function thumbnail()
    {
        if (! $this->has_thumbnail()) {
            return config('gazette.posts.featured_image.default');
        }

        $width = config('gazette.posts.featured_image.width');
        $height = config('gazette.posts.featured_image.height');

        return \Croppa::url($this->featured_image->filename, $width, $height);
    }
}
