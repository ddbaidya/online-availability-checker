<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;
use Exception;
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
        return view('websites.index', compact('websites'));
    }

    /**
     * Display create page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('websites.create');
    }

    /**
     * Store website.
     *
     * @param \App\Http\Requests\WebsiteRequest $request
     */
    public function store(WebsiteRequest $request)
    {
        try {
            if (Website::create($request->only('url', 'status'))) {
                return redirect()->route('admin.websites')->with(['status' => true, 'title' => 'New website added.']);
            }
            throw (new Exception());
        } catch (Exception $e) {
            return redirect()->route('admin.websites')->with(['status' => false, 'title' => 'Something went wrong!']);
        }
    }
}
