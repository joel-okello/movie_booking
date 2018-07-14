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
    
     $gr = new ScheduleEditer();
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
        
        $this->validate($request,['date' => 'required', 'time' => 'required','price' => 'required','movie_id' => 'required',]);  

        $schedule_data = $request->only(['date', 'time', 'price','movie_id','file']);
        $new_shedule = Schedules::create($schedule_data);
        return redirect()->route('add_movies.index')->with('success','Movie has been sheduled');
    }



     function test(Request $request)
    {

      $shedule_id = $request->get('id');
      $movie_info = DB::table('schedules')->where('schedules.id', $shedule_id)
           ->join('movies', 'schedules.movie_id', '=', 'movies.id')
           ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price')
            ->get()->first();
           
     
     $movie_info->dates = ['tuesday','wenesday'];

    
     
    // dd( $movie_info );

     return  response()->json($movie_info);   
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
        dd($id);

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
        //
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



        $booked_movies = DB::table('bookings')->where('user_id', Auth::User()->id)
           ->join('schedules','bookings.shedule_id','=','schedules.id')
           ->join('movies', 'schedules.movie_id', '=', 'movies.id')
           ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price')
            ->get()->toArray();


        // $shedule_to_edit = null;
        return view('booked_movies',compact('shedule_to_edit','booked_movies'));
    }


    public function show_movies_on_shedule()
    {
         
      $shedulebmgr =  new ScheduleEditer();
      $shedule_to_edit = null;
    
       $sheduledmovies = $shedulebmgr->show_movies_on_shedule();
        

            
        return view('index',compact('shedule_to_edit','sheduledmovies'));
    }


    public function add_movies()
    {
    }



    public function show_schedule()

    {

      
  

        $sheduledmovies = DB::table('schedules')
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price')
            ->get()->toArray();
        $shedule_to_edit = null;
        $available_movies_to_add = DB::table('movies')
            ->select('movies.id','movies.title')
            ->get()->toArray();
        return view('shedules',compact('shedule_to_edit','sheduledmovies','available_movies_to_add'));
    }



    public function show_selected_movie($id)

    {

      dd("am showing something");
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
}
