<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Schedules;
use DateTime;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        $this->validate($request,['date' => 'required', 'time' => 'required','price' => 'required','movie_id' => 'required',]);    
        $schedule_data = $request->only(['date', 'time', 'price','movie_id']);
        $new_shedule = Schedules::create($schedule_data);
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


    public function show_user_booked_movies()

    {


        $sheduledmovies = DB::table('schedules')
            ->join('movies', 'schedules.movie_id', '=', 'movies.id')
            ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price')
            ->get()->toArray();
        $shedule_to_edit = null;
        return view('index',compact('shedule_to_edit','sheduledmovies'));
    }


    public function show_movies_on_shedule()
    {


        $sheduledmovies = DB::table('movies')
            ->join('schedules', 'schedules.movie_id', '=', 'movies.id')
            ->select('movies.title', 'schedules.date', 'schedules.time','schedules.price')
            ->orderBy('schedules.date', 'asc')
            ->get()->toArray();
            
        $shedule_to_edit = null;
        
           foreach($sheduledmovies as $row)
           {
            $row->date = DateTime::createFromFormat("Y-m-d", $row->date)->format('l');
           }
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
