<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoDrivesTable extends Migration
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
               
            $table->unsignedInteger('drive_id');
            $table->foreign('drive_id')->references('id')->on('drives')->onDelete('cascade');
           
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            
           // $table->enum('status', ['activated','reached'] ); 
            
            $table->unsignedInteger('dropped_off_by');
            $table->foreign('dropped_off_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedInteger('drop_off_point');
            $table->foreign('drop_off_point')->references('id')->on('service_points')->onDelete('cascade');
           
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
