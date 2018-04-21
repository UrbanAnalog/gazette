<?php

namespace UrbanAnalog\Gazette\Http\Controllers;

use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;

class PostsController extends Controller
{
    /**
     * Get a post's data form a slug.
     *
     * @return Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('type', 'post')->firstOrFail();

        return view(config('gazette.posts.views.single'), compact('post'));
    }
}
