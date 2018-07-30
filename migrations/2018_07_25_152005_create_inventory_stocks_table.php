<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_stocks', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('service_point_id');
            $table->foreign('service_point_id')->references('id')->on('service_points')->onDelete('cascade');
           
            $table->unsignedInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
           
            $table->integer('stock_on_hand');

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
        Schema::dropIfExists('inventory_stocks');
    }
}
