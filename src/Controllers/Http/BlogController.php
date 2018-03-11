<?php

namespace UrbanAnalog\Gazette\Controllers\Http\Kiosk;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('type', 'post')
            ->latest()
            ->paginate(config('gazette.posts.per_page'));

        return view(config('gazette.posts.views.archive'), compact('posts'));
    }

    /**
     * Get a single post's data form a slug.
     *
     * @return Response
     */
    public function show(Post $post)
    {
        return view(config('gazette.posts.views.single'), compact('post'));
    }
}
