<?php

namespace UrbanAnalog\Gazette\Controllers\Http;

use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;

class PagesController extends Controller
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
