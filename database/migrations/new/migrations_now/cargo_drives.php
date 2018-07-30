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
        Schema::create('cargo_drives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->unsignedInteger('sp_near_origin');
            $table->foreign('sp_near_origin')->references('id')->on('service_points')->onDelete('cascade');
            $table->unsignedInteger('sp_near_destination');
            $table->foreign('sp_near_destination')->references('id')->on('service_points')->onDelete('cascade');
            $table->unsignedInteger('drive_id'); 
            $table->foreign('drive_id')->references('id')->on('drives')->onDelete('cascade');
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
        Schema::dropIfExists('cargo_drives');
    }
}
