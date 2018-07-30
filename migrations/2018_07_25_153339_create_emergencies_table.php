<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            
            $table->text('description');

            $table->unsignedInteger('identified_by');
            $table->foreign('identified_by')->references('id')->on('users')->onDelete('cascade');
           
            $table->unsignedInteger('resolved_by');
            $table->foreign('resolved_by')->references('id')->on('users')->onDelete('cascade');
           
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
        Schema::dropIfExists('emergencies');
    }
}
