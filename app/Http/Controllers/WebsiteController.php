<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display all website.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $websites = Website::paginate(20);
        return view('websites', compact('websites'));
    }
}
