<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\User;

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
        $sortedLevels = $levels -> sortByDesc('created_at');
        $totalLevels = Level::count();
        $totalUsers = User::count();
        return view('home', compact('levels','sortedLevels','totalLevels','totalUsers'));
    }
}
