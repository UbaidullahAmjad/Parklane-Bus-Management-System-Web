<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('social_link1')->nullable();
            $table->string('social_link2')->nullable();
            $table->string('social_link3')->nullable();
            $table->string('social_link4')->nullable();
            $table->longText('social_description1')->nullable();
            $table->longText('social_description2')->nullable();
            $table->longText('social_description3')->nullable();
            $table->longText('social_description4')->nullable();
            $table->string('heading');
            $table->string('social_title');
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
        Schema::dropIfExists('social_links');
    }
}
