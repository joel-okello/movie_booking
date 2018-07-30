<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveUpdatesTable extends Migration
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
           
            $table->unsignedInteger('stopover_id');
            $table->foreign('stopover_id')->references('id')->on('route_stopovers')->onDelete('cascade');
           
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
