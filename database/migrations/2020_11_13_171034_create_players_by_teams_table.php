<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersByTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_by_teams', function (Blueprint $table) {
            $table->id();
            $table->integer('TeamId')->nullable();
            $table->integer('PlayerId');
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('CommonName')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Position')->nullable();
            $table->string('PositionCategory')->nullable();
            $table->integer('Jersey')->nullable();
            $table->string('Foot')->nullable();
            $table->integer('Height')->nullable();
            $table->integer('Weight')->nullable();
            $table->string('Gender')->nullable();
            $table->string('BirthDate')->nullable();
            $table->string('BirthCity')->nullable();
            $table->string('BirthCountry')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('InjuryStatus')->nullable();
            $table->string('InjuryBodyPart')->nullable();
            $table->string('InjuryNotes')->nullable();
            $table->string('InjuryStartDate')->nullable();
            $table->string('Updated')->nullable();
            $table->string('PhotoUrl')->nullable();
            $table->integer('RotoWirePlayerID')->nullable();
            $table->string('DraftKingsPosition')->nullable();
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
        Schema::dropIfExists('players_by_teams');
    }
}
