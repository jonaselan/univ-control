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
      $users = User::with(['university'])->simplePaginate(5);
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
      User::find($id)->update($request->all());
      // se for ajax, não redireciona, apenas retorna os valores editados
      if (\Request::ajax())
        return response()->json(User::find($id));

        return redirect()->action('UserController@index');
    }
}
