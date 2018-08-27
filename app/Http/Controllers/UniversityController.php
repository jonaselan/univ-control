<?php

namespace UnivControl\Http\Controllers;

use UnivControl\University;
use Illuminate\Http\Request;
use UnivControl\Http\Requests\UniversityRequest;

class UniversityController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $universities = University::latest()->simplePaginate(5);
      return view('university.index')->withUniversities($universities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityRequest $request)
    {
        if (University::create($request->all()))
          flash('University created!')->success();
        else
          flash('An error has occurred!')->error();

        return redirect()
            ->action('UniversityController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \UnivControl\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
      $university = University::find($id);
      return view('university.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \UnivControl\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
      if (University::find($id)->update($request->all()))
        flash('University updated!')->success();
      else
        flash('An error has occurred!')->error();

      return redirect()
          ->action('UniversityController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \UnivControl\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        if (University::find($id)->delete())
          flash('University deleted!')->success();
        else
          flash('An error has occurred!')->error();

        return redirect()
            ->action('UniversityController@index');
    }
}
