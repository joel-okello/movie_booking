<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['shedule_id']);
            //
        });
            
            Schema::dropIfExists('bookings');
            Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_number');
            $table->string('first_seat_option');
            $table->string('second_seat_option');
            $table->unsignedInteger('shedule_id');
            $table->foreign('shedule_id')->references('id')->on('schedules');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['activated', 'cancelled','used']);

        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('bookings', function (Blueprint $table) {
    $table->dropColumn('status');
});
    }
}
