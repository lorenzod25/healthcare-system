<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $visited = $request->cookie('visited_healthcare');

        if (!$visited) {
            Cookie::queue('visited_healthcare', 'yes', 60); // 60 minutes
        }

        return view('home', ['visited' => $visited]);
    }
}
