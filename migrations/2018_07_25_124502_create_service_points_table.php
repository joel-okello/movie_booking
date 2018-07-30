<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_points', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations') ->onDelete('cascade');
            $table->enum('type',['RDC','warehouse','outlet']);
            $table->unsignedInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('service_points') ->onDelete('cascade');
            $table->boolean('is_pickup_point');
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
        Schema::dropIfExists('service_points');
    }
}
