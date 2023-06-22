<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CheckerController extends Controller
{
    /**
     * Check Online.
     */
    public function checkOnline($key)
    {
        if ($key == 'wmve8isg18ky7ne4bm942djvo') {
            Artisan::call('online:check');
        }
    }
}
