<?php

namespace UnivControl\Http\Controllers;

use UnivControl\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $universities = University::latest()->simplePaginate(10);
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
    public function store(Request $request)
    {
        $university = University::create($request->all());

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
      University::find($id)->update($request->all());
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
        University::find($id)->delete();
        return redirect()
            ->action('UniversityController@index');
    }
}
