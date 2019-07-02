<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city')->unsigned();
            $table->integer('from_airport')->unsigned();
            $table->integer('airline_image')->unsigned();
            $table->string('price');
            $table->integer('class_id')->unsigned();
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('from_airport')->references('id')->on('airports');
            $table->foreign('airline_image')->references('id')->on('airlines');
            $table->foreign('class_id')->references('id')->on('class_categories');
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
        Schema::dropIfExists('routes');
    }
}
