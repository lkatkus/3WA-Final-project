<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('user');
        $this->middleware('admin')->only('index','userConfirm');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // CHECK IF USER IS TRYING TO LOOK AT OWN ACCOUNT OR IF USER IS ADMIN
        if($user->id == Auth::user()->id || Auth::user()->role == 'admin'){
            $user = User::find($user -> id);
            return view('users.show', compact('user'));
        }else{
            return abort(404);
        }
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(Request $request, User $user)
    {
        // CHECK IF USER IS NOT DELETING OWN ACCOUNT
        if($user->id == Auth::user()->id){
            // ADD ERROR MESSAGE
            $request->session()->flash('status', 'You cannot delete your own account.');
            // REDIRECT
            return redirect()->route('user.index');
        }
        else{
            // FIND USER IN DB AND DELETE
            $user = User::find($user -> id);
            $user -> delete();
            // ADD MESSAGE
            $request->session()->flash('status', 'User deleted.');
            // REDIRECT
            return redirect()->route('user.index');
        }
    }

    // USERS MUST BE CONFIRMED BY ADMIN BEFORE THEY WILL BE ABLE TO POST LEVELS
    public function userConfirm(Request $request, $id)
    {
        // CHECK IF USER IS NOT CONFIRMING OWN ACCOUNT
        if($id == Auth::user()->id){
            // ADD ERROR MESSAGE
            $request->session()->flash('status', 'You cannot confirm your own account.');
            // REDIRECT
            return redirect()->route('user.index');
        }
        else{
            // FIND USER IN DB
            $user = User::where('id',$id)->first();
             // CHECK IF USER ACCOUNT IS CONFIRMED OR NOT
            if($user -> confirmed != 1){
                User::where('id', $user->id)->update([
                    'confirmed' => 1
                ]);
                // ADD MESSAGE
                $request->session()->flash('status', 'User account confirmed.');
                // REDIRECT
                return redirect()->action('UserController@index');
            }else{
                User::where('id', $user->id)->update([
                    'confirmed' => 0
                ]);
                // ADD MESSAGE
                $request->session()->flash('status', 'User account confirmation removed.');
                // REDIRECT
                return redirect()->action('UserController@index');
            }
        }
    }
}
