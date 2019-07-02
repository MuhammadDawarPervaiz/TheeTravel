<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineHasClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_has_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airline_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->foreign('airline_id')->references('id')->on('airlines');
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
        Schema::dropIfExists('airline_has_classes');
    }
}
