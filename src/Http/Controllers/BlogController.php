<?php

namespace UrbanAnalog\Gazette\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;

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
            ->with('featured_image')
            ->paginate(config('gazette.posts.per_page'));

        return view(config('gazette.posts.views.archive'), compact('posts'));
    }

    /**
     * Get a single post's data form a slug.
     *
     * @return Response
     */
    public function show(Request $request, Post $post)
    {
        $next = Post::query()
            ->where('id', '>', $post->id)
            ->where('type', 'post')
            ->oldest()
            ->first();

        $previous = Post::query()
            ->where('id', '<', $post->id)
            ->where('type', 'post')
            ->latest()
            ->first();

        if (!isset($request->password) && $post->password && !$request->session()->get("post-pw-{$post->id}")) {
            return view('gazette::password');
        }

        if (!$request->session()->get("post-pw-{$post->id}") && isset($request->password) && !password_verify($request->password, $post->password)) {
            $error = 'Password incorrect';

            return view('gazette::password', compact('error'));
        }

        $request->session()->put("post-pw-{$post->id}", true);

        return view(config('gazette.posts.views.single'), compact(['post', 'next', 'previous']));
    }
}
