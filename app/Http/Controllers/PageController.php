<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show the FAQ page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * Show the terms page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Show the privacy page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function privacy()
    {
        return view('pages.privacy');
    }
}