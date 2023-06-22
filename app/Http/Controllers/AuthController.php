<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display login page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }
}
