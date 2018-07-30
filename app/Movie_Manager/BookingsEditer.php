<?php

namespace App\Movie_Manager;

use App\Schedules;
use App\Movies;
use App\Bookings;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Contracts\Validation\Validator;

class BookingsEditer 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $validateddata = $request->validate([
        	'shedule_id' => 'required',
        	'first_seat_option' => 'required',
        	'second_seat_option' => 'required',
            'number_of_seats'   =>'required',
            ]);


        $booking_data = $request->only(['shedule_id', 'first_seat_option', 'second_seat_option','number_of_seats',]);
        $booking_data['status'] = 'activated';
        $booking_data['user_id'] = Auth::User()->id;
        $booking_data['ticket_number'] = $random_identifier = str_random(5);
        $schedule = Bookings::create($booking_data);


        return ['success' => 'successfully booked ticket'];

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
      
    }
}
