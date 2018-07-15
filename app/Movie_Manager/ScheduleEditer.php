<?php

namespace App\Movie_Manager;


use App\Movies;
use Illuminate\Http\Request;
use DB;
use DateTime;
use App\Schedules;
use Auth;

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
            ->whereDate('schedules.date','>',date('Y-m-d'))
            ->join('schedules', 'schedules.movie_id', '=', 'movies.id')
            ->select( 'movies.id')
            ->groupBy('movies.id')
            ->get()->toArray();
        
            foreach($sheduledmovies as $row){
            $row->dates =  $this->get_dates_for_movies($row->id);
            $row->image_location = Movies::find($row->id)->image_location;
            $row->title = Movies::find($row->id)->title;

            }
                     
        
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



    public function get_schedule_details($shedule_id)
    {
        
        $Shedule_info = DB::table('schedules')->distinct('schedules.date')
            ->where('schedules.id','=',$shedule_id)
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->select('schedules.id','schedules.date','schedules.time','schedules.price','schedules.movie_id','movies.title','movies.type','movies.image_location')
            ->first();            
           return $Shedule_info;


    }


    public static function show_schedule_of_movies()
    {
        
        $sheduledmovies = DB::table('schedules')
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price','schedules.id')
            ->orderBy('schedules.id','desc')
            ->get()->toArray();
        $shedule_to_edit = null;
        $available_movies_to_add = DB::table('movies')
            ->select('movies.id','movies.title')
            ->get()->toArray();          
    

    return ['sheduledmovies'=>$sheduledmovies,
                    'shedule_to_edit' => $shedule_to_edit,
                    'available_movies_to_add'=> $available_movies_to_add, 
                   ];        


    }




    public static function get_user_booked_movies()
    {
        
        $booked_movies = DB::table('bookings')->where('user_id', Auth::User()->id)
           ->join('schedules','bookings.shedule_id','=','schedules.id')
           ->join('movies', 'schedules.movie_id', '=', 'movies.id')
           ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price','bookings.first_seat_option')
            ->get()->toArray();        
    

    return $booked_movies;      


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
    public static function store_shedule(Request $request)
    {
        
        $request->validate(
            ['date' => 'required', 
             'time' => 'required',
             'price' => 'required',
             'movie_id' => 'required',
                                    ]);  

        $schedule_data = $request->only(
               ['date', 'time', 'price','movie_id','file']);
        $new_shedule = Schedules::create($schedule_data);
        return ['success' => 'success'];

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


    public static function update_shedules($request,$id){

       $request->validate(
            ['date' => 'required', 
             'time' => 'required',
             'price' => 'required',
             'movie_id' => 'required',
                                    ]);  

        $new_schedule_data = $request->only(
               ['date', 'time', 'price','movie_id','file']);
        $new_shedule = Schedules::where('id', $id)
            ->update( $new_schedule_data);


        return ['success' => 'success'];

    

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
