<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;
use App\Models\WebsiteStatusResult;
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
     * Display Website.
     *
     * @param \App\Models\Website $website
     */
    public function show(Website $website)
    {
        $histories = WebsiteStatusResult::where('website_id', $website->id)->latest()->paginate(20);
        return view('websites.details', compact('website', 'histories'));
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
     * @return \Illuminate\Http\RedirectResponse
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

    /**
     * Display edit page.
     *
     * @param \App\Models\Website $website
     * @return \Illuminate\View\View
     */
    public function edit(Website $website)
    {
        return view('websites.edit', compact('website'));
    }

    /**
     * Update website.
     *
     * @param \App\Models\Website $website
     * @param \App\Http\Requests\WebsiteRequest $request
     */
    public function update(Website $website, WebsiteRequest $request)
    {
        try {
            $website->url = $request->url;
            $website->status = $request->status;
            if ($website->save()) {
                return redirect()->route('admin.websites')->with(['status' => true, 'title' => 'Website updated!!']);
            }
            throw (new Exception());
        } catch (Exception $e) {
            return redirect()->route('admin.websites')->with(['status' => false, 'title' => 'Something went wrong!']);
        }
    }

    /**
     * Delete website.
     *
     *@param \App\Models\Website $website
     */
    public function delete(Website $website)
    {
        if ($website) {
            $website->delete();
            return response()->json([], 200);
        }
        return response()->json([], 404);
    }
}
