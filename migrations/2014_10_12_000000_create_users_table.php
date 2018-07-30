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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();;
            $table->string('phone_number')->nullable();
            $table->boolean('has_extra_contacts')->default(false);
            $table->boolean('can_log_in')->default(true);
            $table->unsignedInteger('comapany_id')->nullable();
            $table->foreign('comapany_id')->references('id')->on('company') ->onDelete('cascade');
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
