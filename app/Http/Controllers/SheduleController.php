<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Schedules;
use DateTime;
use Auth;
use App\Movie_Manager\ScheduleEditer;

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
        return redirect()->route('add_movies.index')->with('success','Movie has been sheduled');
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
 
    }

    public function view_details($id)
    {
        $shedulebmgr =  new ScheduleEditer();
        $selected_movie_details = $shedulebmgr->get_details_for_movie($id);
         $selected_movie_shedules = $selected_movie_details['schedule_info'];
         $selected_movie_data = $selected_movie_details['movie_data'];

        return view('movies_details',compact('selected_movie_data','selected_movie_shedules'));

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




    //image based scheduled for users on index.blade return after searc;
    public function show_serched_movies_on_shedule()
    {
         dd("now showing");
      $shedulebmgr =  new ScheduleEditer();
      $shedule_to_edit = null;
    
      $sheduledmovies = $shedulebmgr->show_movies_on_shedule();
        
            
        return view('index',compact('shedule_to_edit','sheduledmovies'));
    }

    public function add_movies()
    {
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



    public function show_selected_movie($id)

    {

      
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function retrieve_schedule_info(Request $request)
    {

       $shedulebmgr =  new ScheduleEditer();
     
    
       $shedule_info = $shedulebmgr->get_schedule_details($request->id);
        return response()->json($shedule_info);
    }

}
