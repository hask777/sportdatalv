<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Area;
use App\Competition;
use App\Game;
use App\Player;
use App\Players;
use App\PlayersByTeam;
use App\Round;
use App\Season;
use App\Team;
use App\TeamList;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('areas', function(){
    $areas = Area::all();
    //dump($areas);
    return $areas;
});

Route::get('competitions', function(){
    $competitions = Competition::all();
    //dump($areas);
    return $competitions;
});

Route::get('games', function(){
    $games = Game::all();
    //dump($areas);
    return $games;
});

Route::get('playersbyteam', function(){
    $playersByTeam = PlayersByTeam::all();
    //dump($areas);
    return $playersByTeam;
});

Route::get('rounds', function(){
    $rounds = Round::all();
    //dump($areas);
    return $rounds;
});

Route::get('seasons', function(){
    $seasons = Season::all();
    //dump($areas);
    return $seasons;
});

Route::get('teamslist', function(){
    $teamslist = TeamList::all();
    //dump($areas);
    return $teamslist;
});
