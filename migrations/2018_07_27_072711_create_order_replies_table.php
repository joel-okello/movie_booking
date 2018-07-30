<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');

            $table->unsignedInteger('cargo_order_id');
            $table->foreign('cargo_order_id')->references('id')->on('cargo')->onDelete('cascade');
           
            $table->unsignedInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
           
            $table->unsignedInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
           
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
        Schema::dropIfExists('order_replies');
    }
}
