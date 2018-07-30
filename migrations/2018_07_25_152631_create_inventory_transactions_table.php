<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('service_point_id');
            $table->foreign('service_point_id')->references('id')->on('service_points')->onDelete('cascade');
           
            $table->unsignedInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
                       
            $table->integer('qty_change');//-ve or positive

            $table->integer('new_qty');
            
            $table->timestamps();

            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_transactions');
    }
}
