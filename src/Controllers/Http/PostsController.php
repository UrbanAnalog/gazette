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
     * Get a page's data form a slug.
     *
     * @return Response
     */
    public function show(Post $page)
    {
        return view(config('gazette.pages.views.single'), compact('page'));
    }
}
