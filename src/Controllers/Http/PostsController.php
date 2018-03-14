<?php

namespace UrbanAnalog\Gazette\Controllers\Http;

use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;

class PostsController extends Controller
{
    /**
     * Get a post's data form a slug.
     *
     * @return Response
     */
    public function show(Post $post)
    {
        return view(config('gazette.posts.views.single'), compact('post'));
    }
}
