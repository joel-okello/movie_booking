<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Schedules;
use DateTime;
use Auth;
use App\Movie_Manager\ScheduleEditer;
use Carbon\Carbon;
use App\Movies;
use App\User;

use Carbon\CarbonPeriod;

class SheduleController extends Controller
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

      
        
        ScheduleEditer::store_shedule($request);
        return redirect()->route('schedule')->with('success','Movie has been sheduled');
    }


    public function verify_ticket(Request $request)
    {
        
        $response = ScheduleEditer::check_ticket($request);
        return $response;
        
    }



   


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



     
        
        $data_of_schedules = ScheduleEditer::show_schedule_of_movies();
        $sheduledmovies = $data_of_schedules['sheduledmovies'];
        $movie_being_edited = Schedules::find($id);
        $available_movies_to_add = $data_of_schedules['available_movies_to_add'];


     
        return view('shedules',compact('sheduledmovies','movie_being_edited','available_movies_to_add'));
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data_of_schedules = ScheduleEditer::update_shedules($request, $id);
      return redirect()->route('schedule')->with('success','Shedule has been updated sucessfully');
 
    }

    public function view_details($id)
    {
        $shedulebmgr =  new ScheduleEditer();
        $selected_movie_details = $shedulebmgr->get_details_for_movie($id);

        $selected_movie_shedules = $selected_movie_details['schedule_info'];
        $selected_movie_data = $selected_movie_details['movie_data'];

        $dates_movie_is_showing = $shedulebmgr->get_dates_for_movies($id);
        $dates_movie_is_showing_obj = [];
        foreach ($dates_movie_is_showing as $key => $value) {
            array_push($dates_movie_is_showing_obj, $shedulebmgr->format_to_date($value));
        }
        

      


        return view('movies_details',compact('dates_movie_is_showing_obj','selected_movie_data','selected_movie_shedules'));

    }




    


    public function adding_to_schedule(Request $request)
    {
        
        ScheduleEditer::store_dates_shedule($request);
        //dd($request->movie_id,$request->first_date,$request->last_date);
        return redirect()->route('redisplay_schedule',['id'=>$request->movie_id,'first_date'=>$request->first_date,'last_date'=>$request->last_date])->with('success','Shedule update sucessfully');

    }

   
   

    public function show_user_booked_movies()

    {



        $booked_movies = ScheduleEditer::get_user_booked_movies(); 
        // $shedule_to_edit = null;
        return view('booked_movies',compact('shedule_to_edit','booked_movies'));
    }

   //image based scheduled for users on index.blade;
    public function show_movies_on_shedule()
    {
         
      $shedulebmgr =  new ScheduleEditer();
      $shedule_to_edit = null;
    
      $sheduledmovies = $shedulebmgr->show_movies_on_shedule();
     
            
      return view('index',compact('shedule_to_edit','sheduledmovies'));
    }




  
   
    


     public function show_bouncer_interface()
    {

 
     $data_of_schedules = ScheduleEditer::show_schedule_of_today();
     $today_schedule = $data_of_schedules['sheduledmoviestoday']; 
     return view('bouncer',compact('today_schedule')); 
    }

    public function receive_bouncer_request(Request $request)
    {

     $schedule = Schedules::find($request->id);
     $schedule->update(['being_verified'=>'1']);

     
    }

    //showing table shedule in shedule.blade
    public function show_schedule()

    {
 
     $data_of_schedules = ScheduleEditer::show_schedule_of_movies();
     $sheduledmovies = $data_of_schedules['sheduledmovies'];         
     $available_movies_to_add = $data_of_schedules['available_movies_to_add'];
     $movie_being_edited = null;
     return view('shedules',compact('sheduledmovies','available_movies_to_add','movie_being_edited'));
    }



    public function summary_schedule()

    {

      
    //$start_date = Carbon::createFromFormat('Y-m-d', '2018-07-18');
    $start_date = Carbon::today();
    $shedulebmgr =  new ScheduleEditer();    
    $summary_data = $shedulebmgr->summarise_movie_shows_in_week($start_date);
    $movies = $summary_data['movies'];
    $schedule_for_dates = $summary_data['showing_status_per_movie'];
    $all_dates_in_range = $summary_data['all_dates_in_range'];

    if(User::is_admin())
      { 
        return view('summary_shedule_admin',compact('schedule_for_dates','movies','all_dates_in_range'));
      }
   
    return view('summary_shedule',compact('schedule_for_dates','movies','all_dates_in_range'));

    }



   


    public function show_check_ticket_interface()

    {

      return view('check_ticket');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = schedules::find($id);
        $schedule->deleted = 'yes';
        $schedule->save();
                
        return redirect()->route('schedule')->with('success','Show Deleted sucessfully');
    }


    public function sales_per_show()
    {
     $shedulebmgr =  new ScheduleEditer();
     $sales_info = $shedulebmgr->sales_per_show();
     return view('sales_summary',compact('sales_info'));

    }

    public function retrieve_schedule_info(Request $request)
    {

       $shedulebmgr =  new ScheduleEditer();
     
    
       $shedule_info = $shedulebmgr->get_schedule_details($request->id);
        return response()->json($shedule_info);
    }


    public function add_shedule($id)
    {

        $shedulebmgr =  new ScheduleEditer();
        $selected_movie_details = $shedulebmgr->get_details_for_movie($id);
        $last_sheduled_date = $this->get_last_sheduled_date($selected_movie_details['schedule_info']);
        $selected_movie_data = $selected_movie_details['movie_data'];
        $last_sheduled_date = $last_sheduled_date->format('Y-m-d');




        $date1 = Carbon::createFromFormat('Y-m-d', '2018-06-14');
        $date2 = Carbon::createFromFormat('Y-m-d', '2018-06-19');
        $all_dates_in_range = null;
         

        if($date1<$date2)
        {
          $shedulebmgr =  new ScheduleEditer();
          $all_dates_in_range = $shedulebmgr->all_dates_btn($date1,$date2);  
        }
             

 


      return View('new_shedules',compact('selected_movie_data','id','last_sheduled_date','all_dates_in_range'));
    }




    public function redisplay_shedule($id)
    {

        $shedulebmgr =  new ScheduleEditer();
        $selected_movie_details = $shedulebmgr->get_details_for_movie($id);
        $last_sheduled_date = $this->get_last_sheduled_date($selected_movie_details['schedule_info']);
        $selected_movie_data = $selected_movie_details['movie_data'];
        $last_sheduled_date = $last_sheduled_date->format('Y-m-d');

        $date1 = Carbon::createFromFormat('Y-m-d', '2018-06-14');
        $date2 = Carbon::createFromFormat('Y-m-d', '2018-06-19');
        $all_dates_in_range = null;
         

        if($date1<$date2)
        {
          $shedulebmgr =  new ScheduleEditer();
          $all_dates_in_range = $shedulebmgr->all_dates_btn($date1,$date2);  
        }


             

 


      return View('new_shedules',compact('selected_movie_data','id','last_sheduled_date','all_dates_in_range','last_sheduled_date'));
    }




    public function start_checking($id)
    {
     $random_identifier = str_random(5);
        dd("Request to start checking",$random_identifier);
        redirect()->route('bouncer');
    }

   



    public function get_last_sheduled_date($shedule_info)
    {

        
      if($shedule_info)
       {
         //pick the las
         $last_schedule_date = end($shedule_info)->date;
       }
       else
       {
           $last_schedule_date = Carbon::today();

       }

       return $last_schedule_date;


    }

}
