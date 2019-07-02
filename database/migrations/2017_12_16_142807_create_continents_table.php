<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContinentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image')->unique();
            $table->longText('page_title')->default("N/A")->nullable();
            $table->longText('header_keywords')->default("N/A")->nullable();
            $table->longText('body_keywords')->default("N/A")->nullable();
            $table->longText('body_content')->default("N/A")->nullable();
            $table->longText('meta_title')->default("N/A")->nullable();
            $table->longText('meta_description')->default("N/A")->nullable();
            $table->longText('meta_keywords')->default("N/A")->nullable();
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
        Schema::dropIfExists('continents');
    }
}
