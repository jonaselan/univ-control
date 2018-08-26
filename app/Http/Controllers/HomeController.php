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
        return view('home')->with('msg', "Hello, ". Auth::user()->name);
    }

    public function block()
    {
      $msg = "Hello, ". Auth::user()->name;
      if (Auth::user()->status == 'Denied')
        $msg = 'You access was denied';
      elseif (Auth::user()->status == 'Pending')
        $msg = 'You don\'t have access yet';

      return view('home')
                  ->with('msg', $msg);
    }
}
