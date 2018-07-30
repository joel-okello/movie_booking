<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('carrier_id');
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');

            $table->unsignedInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
             
            $table->string('departure_time');
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
        Schema::dropIfExists('drive');
    }
}
