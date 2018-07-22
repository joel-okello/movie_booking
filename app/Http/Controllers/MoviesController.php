<?php

namespace App\Http\Controllers;

use App\schedules;
use App\Movies;
use Illuminate\Http\Request;
use DB;
use App\Movie_Manager\MoviesEditer;
use Storage;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

        $data = MoviesEditer::show_all();
        $movies = $data['movies'];
        $movie = $data['movie'];
    
        
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
       

        MoviesEditer::storemovie($request);
        return redirect()->route('add_movies.index')->with('success','Movie added sucessfully');

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
      

        $data = MoviesEditer::edit($id);
        $movies = $data['movies'];
        $movie = $data['movie'];
        return view('add_movie',compact('movie','movies','id'));
        
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

          MoviesEditer::updatemovieinfo($request, $id);
          
        return redirect()->route('add_movies.index')->with('success','Movie Updated');
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
        $movies->deleted = 'yes';
        $movies->save();
                
        return redirect()->route('add_movies.index')->with('success','Movie Deleted sucessfully');
    }
}
