<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    public function userLevels(){
        $levels = Level::where('userId', Auth::user()->id)->get();
        $totalLevels = Level::where('userId', Auth::user()->id)->count();
        return view ('levels.index', compact('levels','totalLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = new Level;
        $level -> userId = Auth::user()->id;
        $level -> title = $request -> title;
        $level -> description = $request -> description;
        $level -> layout = $request -> levelLayoutJSON;

        $level -> save();

        return redirect()->action('LevelController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $level = Level::find($level -> id);

        if($level->featured != 1){
            Level::where('id', $level->id)->update([
                'featured' => 1
            ]);
            return redirect()->action('LevelController@index');
        }else{
            Level::where('id', $level->id)->update([
                'featured' => 0
            ]);
            return redirect()->action('LevelController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level = Level::find($level -> id);
        $level -> delete();
        return redirect()->action('LevelController@index');
    }
}
