<?php

namespace UrbanAnalog\Gazette\Http\Controllers;

use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;

class PostsController extends Controller
{
    public function checkPassword($request, $post)
    {

    }

    /**
     * Get a post's data form a slug.
     *
     * @return Response
     */
    public function show(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->where('type', 'post')->firstOrFail();

        if (!$request->password && $post->password_protected && $post->password && !$request->session()->get("post-pw-{$post->id}")) {
            return view('gazette::password');
        }

        if ($request->password && !password_verify($request->password, $post->password) && !$request->session()->get("post-pw-{$post->id}")) {
            $error = 'Password incorrect';

            return view('gazette::password', compact('error'));
        }

        $request->session()->set("post-pw-{$post->id}", true);

        return view(config('gazette.posts.views.single'), compact('post'));
    }
}
