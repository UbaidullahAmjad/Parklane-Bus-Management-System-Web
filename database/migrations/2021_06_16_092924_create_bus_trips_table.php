<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_trips', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_location');
            $table->string('drop_off_location');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->date('drop_off_date');
            $table->time('drop_off_time');
            $table->unsignedBigInteger('bus_id');
            $table->integer('left_seat');
            $table->boolean('active')->default(1);
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
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
        Schema::dropIfExists('bus_trips');
    }
}
