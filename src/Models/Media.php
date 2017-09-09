<?php

namespace UrbanAnalog\Gazette\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'filename',
        'alt_text',
        'dimensions',
        'user_id'
    ];
}
