<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('booking_no');
            $table->string('seat_no');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('bustrip_id');
            $table->integer('confirmation_code');
            $table->date('booking_date');
            $table->boolean('status')->defualt(0);
            $table->boolean('active')->defualt(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bustrip_id')->references('id')->on('bus_trips')->onDelete('cascade');
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
