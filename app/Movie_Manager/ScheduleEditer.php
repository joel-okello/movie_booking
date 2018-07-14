<?php

namespace App\Movie_Manager;

use App\schedules;
use App\Movies;
use Illuminate\Http\Request;
use DB;
use DateTime;

class ScheduleEditer 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show_movies_on_shedule()
    {

        $sheduledmovies = DB::table('movies')->distinct('movie_id')
            ->join('schedules', 'schedules.movie_id', '=', 'movies.id')
            ->select('schedules.movie_id','movies.title', 'schedules.date', 'schedules.time','schedules.price','schedules.id','movies.image_location')
            ->orderBy('schedules.date', 'asc')
            ->take(1)
            ->get()->toArray();
            foreach($sheduledmovies as $row)
            $row->dates =  $this->get_dates_for_movies($row->movie_id);
                     
        
           foreach($sheduledmovies as $row)
           {
            foreach ($row->dates as $key => $date) {
                $row->dates[$key] = $this->format_to_date($date);
            }
            
           }

           return $sheduledmovies;
    }


  public function get_dates_for_movies($movie_id)
    {
        
            $array_of_dates = [];
            $dates = DB::table('schedules')->distinct('schedules.date')
            ->where('movie_id','=',$movie_id)
            ->select('schedules.date')
            ->orderBy('schedules.date', 'asc')
            ->get()->toArray();
            foreach ($dates as $date) {
               
               array_push($array_of_dates,$date->date);  
            }
            
            return $array_of_dates;


    }



    public function get_details_for_movie($movie_id)
    {
           $shedule_info = DB::table('movies')->where('movies.id','=',$movie_id)
            ->join('schedules', 'schedules.movie_id', '=', 'movies.id')
            ->select('schedules.movie_id','movies.title', 'schedules.date', 'schedules.time','schedules.price','schedules.id','movies.image_location')
            ->orderBy('schedules.date', 'asc')
            ->get()->toArray();


            foreach ($shedule_info as $shedule_row) {
                $shedule_row->date = $this->format_to_date($shedule_row->date);
            }
            $movie_data = Movies::find($movie_id)->toArray();
                        

            return [
               'schedule_info' => $shedule_info,
               'movie_data' => $movie_data 

            ];

    }


    public function format_to_date($string)
    {
        
            $formated_date = DateTime::createFromFormat("Y-m-d", $string);
            
            return $formated_date;


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
