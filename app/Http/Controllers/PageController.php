<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Page;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($slug)
    {
        $page = Page::enabled()->where('slug', $slug)->firstOrFail();

        $this->authorize('view', $page);

        return view('pages.show', ['page' => $page]);
    }
}
