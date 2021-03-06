<?php

namespace App;
use Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Movie_Manager\ScheduleEditer;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function is_admin()
    {
        if(Auth::User()->email =="admin@gmail.com" )
        {
         return true;   
        }
    }

    public static function is_bouncer()
    {
        if(Auth::User()->email =="bouncer@gmail.com" )
        {
         return true;   
        }
        
    }

    public static function has_booked_movies()
    {

 
       
     return ScheduleEditer::number_of_booked_movies();


    }

    
}
