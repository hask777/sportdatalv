<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('CompetiitonId');
            $table->integer('GameId');
            $table->integer('RoundId');
            $table->integer('Season');
            $table->integer('SeasonType');
            $table->string('Group')->nullable();
            $table->integer('AwayTeamId');
            $table->integer('HomeTeamId');
            $table->integer('VenueId');
            $table->string('Day');
            $table->string('Datetime')->nullable();
            $table->string('Status');
            $table->integer('Week');
            $table->string('Period');
            $table->string('Clock')->nullable();
            $table->string('Winner');
            $table->string('VenueType');
            $table->string('AwayTeamKey');
            $table->string('AwayTeamName');
            $table->string('AwayTeamCountryCode');
            $table->string('AwayTeamScorePeriod1')->nullable();
            $table->string('AwayTeamScoreExtraTime')->nullable();
            $table->string('HomeTeamKey')->nullable();
            $table->string('HomeTeamName')->nullable();
            $table->string('HomeTeamCountryCode')->nullable();
            $table->string('HomeTeamScore')->nullable();
            $table->string('HomeTeamScorePeriod1')->nullable();
            $table->string('HomeTeamScorePeriod2')->nullable();
            $table->string('HomeTeamScoreExtraTime')->nullable();
            $table->string('HomeTeamScorePenalty')->nullable();
            $table->string('HomeTeamMoneyLine')->nullable();
            $table->string('AwayTeamMoneyLine')->nullable();
            $table->string('DrawMoneyLine')->nullable();
            $table->string('PointSpread')->nullable();
            $table->string('HomeTeamPointSpreadPayout')->nullable();
            $table->string('AwayTeamPointSpreadPayout')->nullable();
            $table->string('OverUnder')->nullable();
            $table->string('OverPayout')->nullable();
            $table->string('UnderPayout')->nullable();
            $table->string('Updated')->nullable();
            $table->string('UpdatedUtc')->nullable();
            $table->integer('GlobalGameId')->nullable();
            $table->integer('GlobalHomeTeamId')->nullable();
            $table->integer('GlobalAwayTeamId')->nullable();
            $table->string('ClockExtra')->nullable();
            $table->string('ClockDisplay')->nullable();
            $table->string('IsClosed')->nullable();
            $table->string('HomeTeamFormation')->nullable();
            $table->string('AwayTeamFormation')->nullable();
            $table->string('PlayoffAggregateScore')->nullable();
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
        Schema::dropIfExists('games');
    }
}
