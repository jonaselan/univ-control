<?php

namespace UnivControl\Http\Controllers;

use UnivControl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::latest()->simplePaginate(10);
      return view('user.index')->withUsers($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \UnivControl\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
      User::find($id)->update(['status' => ucfirst(\Request::route()->getName())]);
      return redirect()->action('UserController@index');
    }

}
