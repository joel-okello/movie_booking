<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('service_points') ->onDelete('cascade');
            
            $table->unsignedInteger('destination_id')->nullable();
            $table->foreign('destination_id')->references('id')->on('service_points') ->onDelete('cascade');
            
            $table->enum('type', ['main_route','sub_route','inter_neighbourhood_route'] );
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
        Schema::dropIfExists('routes');
    }
}
