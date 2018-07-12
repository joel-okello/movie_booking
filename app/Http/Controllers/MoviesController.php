<?php

namespace App\Http\Controllers;

use App\schedules;
use App\Movies;
use Illuminate\Http\Request;
use DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          
        $movies = DB::table('movies')->get()->toArray();
     
        $movie = null;
        return view('add_movie',compact('movie','movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['title' => 'required', 'type' => 'required',]);    
        $movie_data = $request->only(['title', 'type', 'image_location']);
        $movie = Movies::create($movie_data);
        return redirect()->route('add_movies.index')->with('success','Movie Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("$id");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = movies::find($id);
        $movies ->delete();
        return redirect()->route('movies.index')->with('success','Movie Deleted sucessfully');
    }
}
