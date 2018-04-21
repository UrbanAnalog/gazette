<?php

namespace UrbanAnalog\Gazette\Http\Controllers\Kiosk;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Post::where('type', $request->type)
                   ->orderBy('title', 'asc')
                   ->get();
    }

    /**
     * Get a single post's data form a slug.
     *
     * @return Response
     */
    public function show($slug)
    {
        $column = is_numeric($slug) ? 'id' : 'slug';

        return Post::where($column, $slug)->firstOrFail();
    }

    /**
     * Return the view for a single post
     *
     * @return Response
     */
    public function view($slug)
    {
        $post = $this->show($slug);
        $view = config("gazette.{$post->type}.view");

        return view($view, [
            $post->type => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( empty($request->slug) ) {
            $request->slug = str_slug($request->title);
        } else {
            $request->slug = str_slug($request->slug);
        }

        \Validator::make($request->all(),  [
            'title' => 'bail|required',
            'slug' => 'unique:posts'
        ])->validate();

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->type = $request->type;
        $post->user_id = $request->user()->id;

        $post->save();

        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ( empty($request->slug) ) {
            $request->slug = str_slug($request->title);
        } else {
            $request->slug = str_slug($request->slug);
        }

        $this->validate($request, [
            'title' => 'bail|required',
            'slug' => Rule::unique('posts')->ignore($id)
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content ?: null;
        $post->meta_title = $request->meta_title ?: null;
        $post->meta_description = $request->meta_description ?: null;
        $post->robots = $request->robots ?: null;

        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
