<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

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
        $threadsUser = auth()->user()->threads()->get();
        return view('profile', ['threadsUser' => $threadsUser]);
    }
}