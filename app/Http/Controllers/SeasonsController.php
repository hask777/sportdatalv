<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Season;

class SeasonsController extends Controller
{
    public function index()
    {
 
        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

         foreach($competitions as $comp){
                // dump($comp['Seasons']);
            foreach($comp['Seasons'] as $season){
                    dump($season);
            }
        }

        // $seasons = Season::all();

        return view('seasons.index', [
            // 'seasons' => $seasons
        ]);
    }

    public function show($id)
    {
        // $season = Season::find($id);
        // $rounds = Round::where('SeasonId', $season['SeasonId'])->get();
        // dd($rounds);

        return view('seasons.show', [
            // 'rounds' => $rounds,
            // 'season' => $season
        ]);
    }

    // Seasons store

    public function store(Request $request)
    {

        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        foreach($competitions as $comp){
                // dump($comp['Seasons']);
            foreach($comp['Seasons'] as $season){
                // dump($season);

                $season_id = $season['SeasonId'];
                $season_time = $season['Season'];
                    if(!empty($season['Name'])){
                        $season_name = $season['Name'];
                        // dump($season_name);
                    }
                    if(!empty($season['StartDate'])){
                        $season_start = $season['StartDate'];
                    }
                    if(!empty($season['EndDate'])){
                        $season_end = $season['EndDate'];
                    }
                    if(!empty($season['CurrentSeason'])){
                        $current_season = $season['CurrentSeason'];
                    }
                    if(!empty($season['CompetitionId'])){
                        $season_compID = $season['CompetitionId'];
                    }
                    if(!empty($season['CompetitionName'])){
                        $season_compNAME = $season['CompetitionName'];
                    }
                    

                    $season = new Season([
                        'SeasonId' => $season_id,
                        'Season' => $season_time,
                        'Name' => !empty($season_name)? $season_name : null,
                        'StartDate' => !empty($season_start)? $season_start : null,
                        'EndDate' => !empty($season_end)? $season_end : null,
                        'CurrentSeason' => !empty($current_season)? $current_season : false,
                        'CompetitionId' => !empty($season_compID)? $season_compID : null,
                        'CompetitionName' => !empty($season_compNAME)? $season_compNAME : null,
                    ]);

                $season->save(); 
            }
        }

        return view('seasons.store');           
    }
}