<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->integer('RoundId')->nullable();
            $table->integer('SeasonId')->nullable();
            $table->integer('Season')->nullable();
            $table->integer('SeasonType')->nullable();
            $table->string('Name')->nullable();
            $table->string('Type')->nullable();
            $table->string('StartDate')->nullable();
            $table->string('EndDate')->nullable();
            $table->integer('CurrentWeek')->nullable();
            $table->boolean('CurrentRound');
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
        Schema::dropIfExists('rounds');
    }
}
