<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_updates', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('drive_id'); 
            $table->foreign('drive_id')->references('id')->on('drives')->onDelete('cascade');
            $table->unsignedInteger('stop_over_id');
            $table->foreign('stop_over_id')->references('id')->on('stop_overs')->onDelete('cascade');
            $table->unsignedInteger('stop_over_id');
            $table->string('time');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drive_updates');
    }
}
