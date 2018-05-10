<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('scheduled_time')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('location')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('person_in_charce')->nullable(true);
            $table->integer('event_id')->unsigned();
            $table->integer('status')->nullable(true);
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
        Schema::dropIfExists('itineraries');
    }
}
