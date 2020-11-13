<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('TeamId');
            $table->integer('AreaId')->nullable();
            $table->integer('VenueId')->nullable();
            $table->string('Key')->nullable();
            $table->string('Name')->nullable();
            $table->string('FullName')->nullable();
            $table->boolean('Active')->nullable();
            $table->string('AreaName')->nullable();
            $table->string('VenueName')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Type')->nullable();
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('Zip')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Fax')->nullable();
            $table->string('Website')->nullable();
            $table->string('Email')->nullable();
            $table->integer('Founded')->nullable();
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
        Schema::dropIfExists('team_lists');
    }
}
