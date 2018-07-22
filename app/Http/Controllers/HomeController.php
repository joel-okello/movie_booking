<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
       

        if(User::is_bouncer())
        {
           
         return redirect()->route('bouncer');  
        }
        if(User::is_admin())
        {
         return redirect()->route('show_schedule');   
        }

        return redirect()->route('show_movies_on_shedule');
    }



   
}
