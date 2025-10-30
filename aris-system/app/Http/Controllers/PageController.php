<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the application's home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // This method's only job is to return the main home view.
        // All the dynamic content and mock data are currently handled
        // within the Blade components themselves for frontend prototyping.
        return view('home');
    }
}