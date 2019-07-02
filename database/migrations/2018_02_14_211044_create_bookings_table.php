<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('departure_date');
            $table->date('return_date');
            $table->string('departure_airport');
            $table->string('destination_airport');
            $table->string('fare_type');
            $table->integer('ticket_class')->unsigned();
            $table->integer('preffered_airline')->unsigned()->nullable();
            $table->string('flight_route');
            $table->string('customer_name');
            $table->string('email_address');
            $table->bigInteger('contact_number')->unsigned();
            $table->integer('adult');
            $table->integer('teenagers');
            $table->integer('child');
            $table->integer('infant');
            $table->longText('comments_or_questions')->nullable();
            $table->integer('promo_code')->nullable();
            $table->foreign('ticket_class')->references('id')->on('class_categories');
            $table->foreign('preffered_airline')->references('id')->on('airlines');
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
        Schema::dropIfExists('bookings');
    }
}
