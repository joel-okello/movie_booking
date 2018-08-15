<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Schedules;
use DateTime;
use Auth;
use App\Movie_Manager\BookingsEditer;
use App\Movie_Manager\ScheduleEditer;
use CodeItNow\BarcodeBundle\Utils\QrCode;

class BookingController extends Controller
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
        dd("ube");
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


      
        $bookingbmgr =  new BookingsEditer();
        $booked_ticket = $bookingbmgr->store($request);


    
        return redirect()->route('booked_movies')->with('success','Movie Sucessfully booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_ticket($id = null )
    {

        //get all tickets
        //get info about the ticket
        //generate qr codes for each
        //return generates qr codes
        $qrCodes = [];

        $booked_movies = ScheduleEditer::get_user_booked_movies(); 
       
        foreach ($booked_movies as $booked_movie) {
                $qrCode = new QrCode();
                $qrCode
                ->setText($booked_movie->ticket_number .' '.$booked_movie->date. ' '.$booked_movie->time .' '.$booked_movie->status)
                ->setSize(300)
                ->setPadding(10)
                ->setErrorCorrection('high')
                ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                ->setLabel($booked_movie->title)
                ->setLabelFontSize(16)
                ->setImageType(QrCode::IMAGE_TYPE_PNG);      
                array_push($qrCodes, $qrCode);

        }        



        return view('ticket_shower',compact('qrCodes','booked_movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        dd("do somehting here");
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
