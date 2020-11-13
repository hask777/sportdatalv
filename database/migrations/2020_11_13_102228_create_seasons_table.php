<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('SeasonId');
            $table->integer('Season');
            $table->string('Name')->nullable();
            $table->string('StartDate')->nullable();
            $table->string('EndDate')->nullable();
            $table->boolean('CurrentSeason');
            $table->integer('CompetitionId')->nullable();
            $table->string('CompetitionName')->nullable();
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
        Schema::dropIfExists('seasons');
    }
}
