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
    
        $this->validate($request,['title' => 'required', 'type' => 'required','file'=>'required']);
        
        $entered_path = $request->file('file')->store('public'); 
         // dd($request);
        $movie_data = $request->only(['title', 'type']);
        $movie_data['image_location'] = Storage::url($entered_path);

        // dd($movie_data);
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



        $movie = movies::find($id);
        $movies = movies::all();
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
         $new_movie_data = $request->only(['title', 'type', 'image_location']);
         $movie = movies::where('id', $id)
          ->update($new_movie_data);
        return redirect()->route('add_movies.index')->with('success','Data Updated');
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
        return redirect()->route('add_movies.index')->with('success','Movie Deleted sucessfully');
    }
}
