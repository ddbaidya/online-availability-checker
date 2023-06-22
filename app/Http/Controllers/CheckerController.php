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
        if ($key == 'ovi') {
            Artisan::call('online:check');
        }
    }
}
