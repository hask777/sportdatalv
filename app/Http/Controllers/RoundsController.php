<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Round;

class RoundsController extends Controller
{
    public function index()
    {
      
        // $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
        //     ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
        //     ->json();
        // // dd($competitions);

        // foreach($competitions as $comp){
        //     foreach($comp['Seasons'] as $season){
        //         foreach($comp['Seasons'] as $season){
        //             foreach($season['Rounds'] as $round){
        //                 // dump($round);
        //             }
        //         }
        //     }
        // }

        // $rounds = Round::all();

        return view('rounds.index', [
            // 'rounds' => $rounds
        ]);        
    }

    public function show($id)
    {
        return view('rounds.show');
    }

    public function store(Request $request)
    {
        set_time_limit (0);

        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        foreach($competitions as $comp){
            foreach($comp['Seasons'] as $season){
                foreach($comp['Seasons'] as $season){
                    foreach($season['Rounds'] as $round){
                        // dump($round);
                        $round_id = $round['RoundId'];
                        $round_season_id = $round['SeasonId'];
                        $round_season = $round['Season'];
                        $round_season_type = $round['SeasonType'];
                        $round_name = $round['Name'];
                        $round_type = $round['Type'];
                        $round_start = $round['StartDate'];
                        $round_end = $round['EndDate'];
                        $round_current_week = $round['CurrentWeek'];
                        $round_current_round = $round['CurrentRound'];

                            $round = new Round([
                                'RoundId' => !empty($round_id)? $round_id : null,
                                'SeasonId' => !empty($round_season_id)? $round_season_id : null,
                                'Season' => !empty($round_season)? $round_season : null,
                                'SeasonType' => !empty($round_season_type)? $round_season_type : null,
                                'Name' => !empty($round_name)? $round_name : null,
                                'Type' => !empty($round_type)? $round_type : null,
                                'StartDate' => !empty($round_start)? $round_start : null,
                                'EndDate' =>  !empty($round_end)? $round_end : null,
                                'CurrentWeek' => !empty($round_current_week)? $round_current_week : null,
                                'CurrentRound' => !empty($round_current_round)? $round_current_round : false,
                        ]);

                        $round->save();
                    } 
                }
            }
        }

        return view('rounds.store');        
    }
}
