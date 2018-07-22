<?php

namespace App\Movie_Manager;

use App\schedules;
use App\Movies;
use Illuminate\Http\Request;
use DB;
use Storage;

class MoviesEditer 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public static function show_all()
    {

          
        $movies = DB::table('movies')
                   ->where('deleted','=','no')
                   ->get()
                   ->toArray();
     
        $movie = null;
        return ['movie' => $movie,
        'movies' => $movies];
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
    public static function storemovie(Request $request)
    {

        
        $request->validate(['title' => 'required', 'type' => 'required','file'=> 'required']);    
        $movie_data = $request->only(['title', 'type', 'image_location']);
        $movie_data['image_location'] = $request->file('file')->store('public'); 
        //$movie_data['image_location'] = Storage::url($request->file('file')->store('public')); 
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
    public static function edit($id)
    {



        $movie = movies::find($id);
        $movies = movies::where('deleted','=','no')
                 ->get();
                 
        return ['movie'=>$movie,
                 'movies' => $movies];
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public static function updatemovieinfo(Request $request, $id)
    {
         $request->validate(['title' => 'required', 'type' => 'required',]); 
        if(!$request->file){
             $new_movie_data = $request->only(['title', 'type']);
             $movie = movies::where('id', $id)
             ->update($new_movie_data);
          }
          
          else
          {
            $movie = movies::find($id);
            $old_file_path = $movie->image_location;
            Storage::delete($old_file_path);
            $entered_path = $request->file('file')->store('public'); 
            $new_movie_data = $request->only(['title', 'type']);
            //$new_movie_data['image_location'] = Storage::url($entered_path);
            $new_movie_data['image_location'] = $entered_path;
            $movie = movies::where('id', $id)
            ->update($new_movie_data);
          }

          return ['sucess' => 'movie updated'];

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
