<?php

namespace UnivControl\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
        return view('home')->with('msg', 'Welcome!');
    }

    public function block()
    {
        return view('home')->with('msg', Auth::user()->status == 'Denied' ? 'You access was denied' : 'You don\'t have access yet');
    }
}
