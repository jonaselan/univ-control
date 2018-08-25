<?php

namespace UnivControl\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home')->with('msg', 'Seja Bem vindo');
    }

    public function block()
    {
        return view('home')->with('msg', 'Você ainda não possui acesso');
    }
}
