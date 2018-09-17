<?php

namespace UrbanAnalog\Gazette\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Post;

class PagesController extends Controller
{
    /**
     * Get a page's data form a slug.
     *
     * @return Response
     */
    public function show(Request $request, $slug)
    {
        $page = Post::where('slug', $slug)->where('type', 'page')->firstOrFail();

        if (!isset($request->password) && $page->password && !$request->session()->get("page-pw-{$page->id}")) {
            return view('gazette::password');
        }

        if (!$request->session()->get("page-pw-{$page->id}") && isset($request->password) && !password_verify($request->password, $page->password)) {
            $error = 'Password incorrect';

            return view('gazette::password', compact('error'));
        }

        $request->session()->put("page-pw-{$page->id}", true);

        return view(config('gazette.pages.views.single'), compact('page'));
    }
}
