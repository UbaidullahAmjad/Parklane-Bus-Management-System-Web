<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_travel', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('heading2')->nullable();
            $table->longText('description')->nullable();
            $table->string('mission')->nullable();
            $table->longText('mission_desc')->nullable();
            $table->string('awards')->nullable();
            $table->longText('awards_desc')->nullable();
            $table->string('principles')->nullable();
            $table->longText('principles_desc')->nullable();
            $table->string('history')->nullable();
            $table->longText('history_desc')->nullable();
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
        Schema::dropIfExists('general_travels');
    }
}
