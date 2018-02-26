<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Image;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
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
        return view('auth.passwords.change_password');
    }


    /**
     * @return mixed
     */
    public function resetPassword(){

        $User = User::find(Auth::user()->id);
        if (Hash::check(Input::get('passwordold'), $User['password']) && Input::get('password') == Input::get('password_confirmation')){

            $User->password = bcrypt(Input::get('password'));
            $User->save();
            return back()->withMessage('success');
        }
        else{
            return back()->withMessage('error');

        }
    }






}