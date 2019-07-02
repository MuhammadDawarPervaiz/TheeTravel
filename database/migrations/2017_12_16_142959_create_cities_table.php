<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->longText('page_title')->default("N/A")->nullable();
            $table->longText('header_keywords')->default("N/A")->nullable();
            $table->longText('body_keywords')->default("N/A")->nullable();
            $table->longText('body_content')->default("N/A")->nullable();
            $table->longText('meta_title')->default("N/A")->nullable();
            $table->longText('meta_description')->default("N/A")->nullable();
            $table->longText('meta_keywords')->default("N/A")->nullable();
            $table->integer('continent_id')->unsigned();
            $table->foreign('continent_id')->references('id')->on('continents');
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
        Schema::dropIfExists('cities');
    }
}
