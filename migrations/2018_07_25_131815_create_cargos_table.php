<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
            $table->string('size');
            $table->string('origin');
            $table->string('destination');

            $table->unsignedInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('charge');

            $table->string('track_code');//10 chars

            $table->enum('status', ['pending','approved', 'cancelled', 'staged','completed'])->default('pending');          
            $table->timestamps(); 

            $table->unsignedInteger('worked_on_by');
            $table->foreign('worked_on_by')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
