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
            $table->unsignedInteger('stop_over_id');
            $table->foreign('stop_over_id')->references('id')->on('stop_overs')->onDelete('cascade');
            $table->unsignedInteger('dropped_off_by');
            $table->foreign('dropped_off_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('drive_id');         
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
        Schema::dropIfExists('cargos_drives');
    }
}
