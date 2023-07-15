<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index(){        
        return view("admin.home");        
    }
    public function clearCache()
    {
        \Artisan::call('optimize:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('route:clear');
        \Artisan::call('config:cache');
        \Artisan::call('view:clear');
        
    }
}
