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
        Schema::create('stock_on_hand', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_pt_id');
            $table->foreign('service_pt_id')->references('id')->on('service_points')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('new_quantity_in_stock');
            $table->unsignedInteger('old_quantity_in_stock');
            


            $table->string('truck');
            $table->string('route_id')
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
        Schema::dropIfExists('drives');
    }
}
