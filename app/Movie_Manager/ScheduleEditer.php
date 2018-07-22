<?php

namespace App\Movie_Manager;


use App\Movies;
use Illuminate\Http\Request;
use DB;
use DateTime;
use App\Schedules;
use Auth;
use Carbon\Carbon;
use App\Bookings;

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
            ->where('movies.deleted','=','no')
            ->whereDate('schedules.date', '>=', Carbon::today()->toDateString())
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



     public function get_schedule_time_for_movie_on_a_date($movie_id,$date)
    {

        $sheduled_times = DB::table('schedules')
            ->whereDate('schedules.date','=',$date)
            ->where('schedules.movie_id','=',$movie_id)
            ->select( 'schedules.id','schedules.time','schedules.price','schedules.date','schedules.movie_id')
            ->orderBy('schedules.time', 'asc')
            ->get()->toArray();
            return $sheduled_times;
    }



    public function show_searched_movies($search_query)
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
            ->where('schedules.deleted','=','no')
            ->whereDate('schedules.date', '>=', Carbon::today()->toDateString())
            ->select('schedules.date')
            ->orderBy('schedules.date', 'asc')
            ->get()->toArray();
            foreach ($dates as $date) {
               
               array_push($array_of_dates,$date->date);  
            }
            
            return $array_of_dates;


    }

    public static function show_schedule_of_today()
    {
         $sheduledmoviestoday = DB::table('schedules')
            ->whereDate('schedules.date', '=', Carbon::today()->toDateString())
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price','schedules.id','schedules.being_verified')
            ->orderBy('schedules.time','desc')
            ->get()->toArray();

         return ['sheduledmoviestoday'=>$sheduledmoviestoday, 
                   ];  

    }

    public function get_details_for_movie($movie_id)
    {

       
           $shedule_info = DB::table('movies')->where('movies.id','=',$movie_id)
            ->join('schedules', 'schedules.movie_id', '=', 'movies.id')
            ->whereDate('schedules.date', '>=', Carbon::today()->toDateString())
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



     public function all_dates_btn($start_date,$end_date)
    {
     $all_dates_btn = null;  
     if($start_date>$end_date)
        return $all_dates_btn;
     $days_btn_dates = $start_date->diffInDays($end_date);
     $all_dates_btn = [];
     array_push($all_dates_btn,$start_date->format('Y-m-d'));
     
     for($counter = 0;$counter<$days_btn_dates;$counter++)
     {
       array_push($all_dates_btn,($start_date->addDay())->format('Y-m-d'));
     }


     for($counter = 0;$counter<sizeof($all_dates_btn);$counter++)
     {
       $all_dates_btn[$counter] = $this->format_to_date($all_dates_btn[$counter]);
     }
     
     return $all_dates_btn;
            

    }





    public function all_dates_in_week($start_date)
    {
     $all_dates_btn = null;  
     $days_btn_dates = 6;
     $all_dates_btn = [];
     array_push($all_dates_btn,$start_date->format('Y-m-d'));
     
     for($counter = 0;$counter<$days_btn_dates;$counter++)
     {
       array_push($all_dates_btn,($start_date->addDay())->format('Y-m-d'));
     }


     for($counter = 0;$counter<sizeof($all_dates_btn);$counter++)
     {
       $all_dates_btn[$counter] = $this->format_to_date($all_dates_btn[$counter]);
     }
     
     return $all_dates_btn;
            

    }




    public function summarise_movie_shows_in_week($start_date)
    {



      $all_dates_in_range = $this->all_dates_in_week($start_date);   
      $movies = DB::table('movies')
                ->where('deleted','=','no')
                ->get()
                ->toArray();

         
     $schedule_for_dates = [];
     $movies_array = [];
     foreach ($movies as $key => $movie ) 
     {   
         $movies_array[$key]= $movie;

        foreach ($all_dates_in_range as $keys => $date) 
        {
           

         $schedule_for_dates[$key][$keys] = $this->check_if_there_exists_given_movie_on_date($date,$movie->id);
        }



         
      }

      $filtered_data = $this->remove_movies_that_wont_be_shown($movies,$schedule_for_dates);
      $schedule_for_dates = $filtered_data['shedule_for_movies']; 
      $movies = $filtered_data['movies_array'];

      

      



      return [ 'showing_status_per_movie' => $schedule_for_dates,
                 'movies'                 => $movies,
                 'all_dates_in_range'     => $all_dates_in_range,

                ];

    }



    public function remove_movies_that_wont_be_shown($movies_array,$shedule_for_movies)
    {

       
    $index_with_no_single_true = [];




     foreach ($movies_array as $key => $movie) 
     {
         if (in_array(true, $shedule_for_movies[$key]))
         {
           
         }
         else
         {
          array_push($index_with_no_single_true,$key); 
         }


     }
      
    $counter = 0;
    foreach ($index_with_no_single_true as $key => $value) 
    {

    array_splice($movies_array,$value-$counter, 1);
    array_splice($shedule_for_movies,$value-$counter,1);
    $counter++;
    }

     return [ 'movies_array'=>$movies_array,
              'shedule_for_movies' =>$shedule_for_movies,
                ];

    }



     public function check_if_there_exists_given_movie_on_date($date,$movie_id)
    {

     $movie_on_schedule = DB::table('schedules')
            ->where('schedules.date','=',$date->format('Y-m-d'))
            ->where('schedules.deleted','=','no')
            ->where('schedules.movie_id','=',$movie_id)
            ->select('schedules.date','schedules.movie_id')
            ->get()->first();
     if($movie_on_schedule)
        return true;
     else
        return false;

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
            ->whereDate('schedules.date', '>=', Carbon::today()->toDateString())
            ->select('schedules.id','schedules.date','schedules.time','schedules.price','schedules.movie_id','movies.title','movies.type','movies.image_location')
            ->first();            
           return $Shedule_info;


    }



     public function sales_per_show()
    {
        
        $Shedule_info = DB::table('schedules')->distinct('schedules.id')
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->join('bookings','schedules.id','=','bookings.shedule_id')
            ->whereDate('schedules.date', '<=', Carbon::today()->toDateString())
            ->select('schedules.id','schedules.date','schedules.time','schedules.price','schedules.movie_id','movies.title')
            ->get()
            ->toArray();
  
        foreach ($Shedule_info as $key => $show) {
            $show ->seats_sold = $this->booked_tickets_in_specific_show($show->id);
        }

             
       return $Shedule_info;


    }


    public function booked_tickets_in_specific_show($schedule_id)
    {
        
        $seats_booked_for_schedule = DB::table('bookings')
            ->where('bookings.shedule_id', '=',$schedule_id)
            ->sum('bookings.number_of_seats');

            
            //->get();  


                 
           return $seats_booked_for_schedule;


    }










    

    public static function show_schedule_of_movies()
    {
        
        $sheduledmovies = DB::table('schedules')
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->select('movies.title','schedules.movie_id','schedules.date', 'schedules.time','schedules.price','schedules.id')
            ->whereDate('schedules.date', '>=', Carbon::today()->toDateString())
            ->where('movies.deleted', '=', 'no')
            ->where('schedules.deleted', '=', 'no')
            ->orderBy('schedules.date','desc','schedules.time','desc')
            ->get()->toArray();
        $shedule_to_edit = null;
        $available_movies_to_add = DB::table('movies')
            ->select('movies.id','movies.title')
            ->where('movies.deleted', '=', 'no')
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
           ->whereDate('schedules.date', '>=', Carbon::today()->toDateString())
           ->orderBy('schedules.date','asc','schedules.time','desc')
           ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price','bookings.first_seat_option','bookings.number_of_seats','bookings.id','bookings.status')
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

        if($request->has('movie_id1'))
        {  //form two has been submitted

            $request['movie_id'] = $request->movie_id;

        }
       
              
       $request->validate(
            ['time_hrs' => 'required', 
             'time_min' => 'required',
             'time_am_pm' => 'required',
             'price' => 'required',
             'movie_id' => 'required',
             'date'=>'required',
                                    ]);  

        $request["time"] = ScheduleEditer::process_time($request->time_hrs,$request->time_min,$request->time_am_pm);
        $schedule_data = $request->only(
               ['date', 'time', 'price','movie_id']);
        $new_shedule = Schedules::create($schedule_data);

        return ['success' => 'success'];


    }







    public static function process_time($time_hrs,$time_min,$time_am_pm)
    {  if(($time_am_pm)=="PM")
        $time_hrs = $time_hrs + 12;
        $time = $time_hrs.":".$time_min;
        return $time;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }


    

    public static function check_ticket(Request $request)
    {
        $number_booked = 0;
        $ticket_being_check = null;
        $status = 'Ticket does not exist';
        $ticket = Bookings::find($request->id);
        

        if($ticket)
        {
        $status = 'Ticket is exists';
        $number_booked = $ticket->number_of_seats; 
        $ticket_number = $ticket->ticket_number;
        
        //check if tcket is used
        $ticket_being_check = Bookings::where('bookings.id','=',$request->id)
                  ->join('schedules','bookings.shedule_id','=','schedules.id')
                  ->where('bookings.status','=','activated')
                  ->select('bookings.id','bookings.number_of_seats')
                  ->get()->toArray();
        $status = $ticket->status;
        }
        
    

        //ticket exixts and is not used
        if($ticket&&$ticket_being_check){
        $ticket->status = 'used';
        $ticket->save();}

       
        
        return ['status' => $status,
                 'number' => $number_booked,
                   ];
        
    }


    public static function update_shedules($request,$id)
    {
      $request->validate(
            ['time_hrs' => 'required', 
             'time_min' => 'required',
             'time_am_pm' => 'required',
             'price' => 'required',
             'movie_id' => 'required',
             'date'=>'required',
                                    ]);  

        $request["time"] = ScheduleEditer::process_time($request->time_hrs,$request->time_min,$request->time_am_pm); 


        $new_schedule_data = $request->only(
               ['date', 'time', 'price','movie_id','file']);
        $new_shedule = Schedules::where('id', $id)
            ->update( $new_schedule_data);



        return ['success' => 'schedule updated succesfully'];

    

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
        dd("update in ScheduleEditer");
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
        $schedule = schedules::find($id);
        $schedule->deleted = "yes";
        $schedule ->save();
        return redirect()->route('add_movies.index')->with('success','Schedule Deleted sucessfully');
    }
}
