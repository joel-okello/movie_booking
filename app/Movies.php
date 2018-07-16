<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //
    public $timestamps = false;

 protected $fillable = [
        'title', 'type', 'image_location',
    ];
               
            
 
}
