<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteStopoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_stopovers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes') ->onDelete('cascade');
            
            $table->unsignedInteger('service_point_id');
            $table->foreign('service_point_id')->references('id')->on('service_points') ->onDelete('cascade');
           
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
        Schema::dropIfExists('route_stopovers');
    }
}
