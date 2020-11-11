<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('CompetiitonId');
            $table->integer('TeamId');
            $table->integer('AreaId');
            $table->integer('VenueId');
            $table->string('Key');
            $table->string('Name');
            $table->string('FullName');
            $table->boolean('Active')->default(false);
            $table->string('AreaName');
            $table->string('VenueName');
            $table->string('Gender');
            $table->string('Type');
            $table->string('Address')->nullabel();
            $table->string('City')->nullable();
            $table->string('Zip')->nullabl();
            $table->string('Phone')->nullable();
            $table->string('Fax')->nullable();
            $table->string('Website')->nullable();
            $table->string('Email')->nullable();
            $table->string('Founded')->nullable();
            $table->string('ClubColor1')->nullable();
            $table->string('ClubColor2')->nullable();
            $table->string('ClubColor3')->nullable();
            $table->string('Nickname1')->nullable();
            $table->string('Nickname2')->nullable();
            $table->string('Nickname3')->nullable();
            $table->string('WikipediaLogoUrl')->nullable();
            $table->string('WikipediaWordMarkUrl')->nullable();
            $table->string('GlobalTeamId')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
