<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
	public $timestamps = false;
   protected $fillable = ['date', 'time', 'price','movie_id'];
}
