<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShedulestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
        
        
    }
}
