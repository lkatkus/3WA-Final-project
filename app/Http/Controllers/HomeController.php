<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        $derp = $levels -> sortByDesc('created_at');
        return view('home', compact('levels','derp'));
    }
}
