<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    

public $timestamps = false;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}
