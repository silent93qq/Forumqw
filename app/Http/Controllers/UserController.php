<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requsets;
use Image;
use App\Thread;

class UserController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threadsUser = auth()->user()->threads()->get();
        return view('profile',['threadsUser'=>$threadsUser],array('user' => Auth::user()));
    }

//    public function profile(Request $request)
//    {
//        return view('profile', );
//    }

    public function updateProfile(Request $request)
    {
        $threadsUser = auth()->user()->threads()->get();
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user()),['threadsUser'=>$threadsUser]);
    }


}