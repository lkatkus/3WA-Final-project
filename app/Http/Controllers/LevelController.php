<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{

    public function __construct(){
        $this->middleware('user')->except('index','show');
    }

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

    public function create()
    {
        return view('levels.create');
    }

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

    public function show(Level $level)
    {
        return view('levels.show', compact('level'));
    }

    public function edit(Level $level)
    {
        // CHECK IF USER IS AUTHOR OF LEVEL
        if(Auth::user() -> id == $level -> userId || Auth::user() -> role == 'admin'){
            $level = Level::where('id', $level->id)->first();
            return view('levels.edit', compact('level'));
        }else{
            return abort(404);
        }
    }

    public function update(Request $request, Level $level)
    {
        $level = Level::find($level -> id);
        Level::where('id', $level->id)->update([
            'title' => $request -> title,
            'description' => $request -> description,
            'layout' => $request -> levelLayoutJSON
        ]);

        return redirect()->action('LevelController@index');
    }

    public function featureLevel($id)
    {
        $level = Level::where('id', $id)->first();

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

    public function destroy(Level $level)
    {
        $level = Level::find($level -> id);
        $level -> delete();
        return redirect()->action('LevelController@index');
    }
}
