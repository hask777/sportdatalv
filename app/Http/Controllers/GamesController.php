<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Game;

class GamesController extends Controller
{
    public function index()
    {
        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        $games = Game::all();

        foreach($games as $game)
        {
            dd($game);
        }

        return view('games.index');
    }

    public function store(Request $request)
    {
        set_time_limit (3000);
        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        foreach($competitions as $competition){
            // dump($competition['CompetitionId']);
            
            $comp_detail = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/CompetitionDetails/'.$competition['CompetitionId'])
            ->json();

            //dd($comp_detail);
            if(!empty($comp_detail['CompetitionId'])){
                $comp_id = $comp_detail['CompetitionId'];
            }

            if(!empty($comp_detail['Games'])){
                foreach($comp_detail['Games'] as $game)
                {
                    //dd($team);
                    if(!empty($comp_id)){
                        $comp_id = $comp_id;  
                    }
                    if(!empty($game['GameId'])){
                        $game_id = $game['GameId'];  
                    }
                    if(!empty($game['RoundId'])){
                        $game_round_id = $game['RoundId'];  
                    }
                    if(!empty($game['Season'])){
                        $game_season = $game['Season'];  
                    }
                    if(!empty($game['SeasonType'])){
                        $game_season_type = $game['SeasonType'];  
                    }
                    if(!empty($game['Group'])){
                        $game_group = $game['Group'];  
                    }
                    if(!empty($game['AwayTeamId'])){
                        $game_away_team_id = $game['AwayTeamId'];  
                    }
                    if(!empty($game['HomeTeamId'])){
                        $game_home_team_id = $game['HomeTeamId'];  
                    }
                    if(!empty($game['VenueId'])){
                        $game_venue_id = $game['VenueId'];                
                    }
                    if(!empty($game['Day'])){
                        $game_day = $game['Day'];                
                    }
                    if(!empty($game['Datetime'])){
                        $game_date_time = $game['Datetime'];                
                    }
                    if(!empty($game['Status'])){
                        $game_status = $game['Status'];                
                    }
                    if(!empty($game['Week'])){
                        $game_week = $game['Week'];                
                    }
                    if(!empty($game['Period'])){
                        $game_period = $game['Period'];                
                    }
                    if(!empty($game['Clock'])){
                        $game_clock = $game['Clock'];                
                    }
                    if(!empty($game['Winner'])){
                        $game_winner = $game['Winner'];           
                    }
                    if(!empty($game['VenueType'])){
                        $game_venue_type = $game['VenueType'];                
                    }
                    if(!empty($game['AwayTeamKey'])){
                        $game_away_team_key = $game['AwayTeamKey'];               
                    }
                    if(!empty($game['AwayTeamName'])){
                        $game_team_name = $game['AwayTeamName'];               
                    }
                    if(!empty($game['AwayTeamCountryCode'])){
                        $game_away_team_country_code = $game['AwayTeamCountryCode'];               
                    }
                    if(!empty($game['AwayTeamScore'])){
                        $game_team_score = $game['AwayTeamScore'];               
                    }
                    if(!empty($game['AwayTeamScorePeriod1'])){
                        $game_away_team_period_1 = $game['AwayTeamScorePeriod1'];               
                    }
                    if(!empty($game['AwayTeamScorePeriod2'])){
                        $game_away_team_period_2 = $game['AwayTeamScorePeriod2'];               
                    }
                    if(!empty($game['AwayTeamScoreExtraTime'])){
                        $game_away_team_score_extra_time = $game['AwayTeamScoreExtraTime'];               
                    }
                    if(!empty($game['AwayTeamScorePenalty'])){
                        $game_away_team_score_penalty = $game['AwayTeamScorePenalty'];               
                    }
                    if(!empty($game['HomeTeamKey'])){
                        $game_home_team_key = $game['HomeTeamKey'];               
                    }
                    if(!empty($game['HomeTeamName'])){
                        $game_home_team_name = $game['HomeTeamName'];               
                    }
                    if(!empty($game['HomeTeamCountryCode'])){
                        $game_team_country_code = $game['HomeTeamCountryCode'];               
                    }
                    if(!empty($game['HomeTeamScore'])){
                        $game_team_score = $game['HomeTeamScore'];               
                    }
                    if(!empty($game['HomeTeamScorePeriod1'])){
                        $game_team_score_period_1 = $game['HomeTeamScorePeriod1'];              
                    } 
                    if(!empty($game['HomeTeamScorePeriod2'])){
                        $game_team_score_period_2 = $game['HomeTeamScorePeriod2'];              
                    }
                    if(!empty($game['HomeTeamScoreExtraTime'])){
                        $game_team_score_extra_time = $game['HomeTeamScoreExtraTime'];              
                    }
                    if(!empty($game['HomeTeamScorePenalty'])){
                        $game_team_score_penalty = $game['HomeTeamScorePenalty'];              
                    }
                    if(!empty($game['HomeTeamMoneyLine'])){
                        $game_home_team_money_line = $game['HomeTeamMoneyLine'];              
                    }
                    if(!empty($game['AwayTeamMoneyLine'])){
                        $game_away_team_money_line = $game['AwayTeamMoneyLine'];              
                    }
                    if(!empty($game['DrawMoneyLine'])){
                        $game_draw_money_line = $game['DrawMoneyLine'];              
                    }
                    if(!empty($game['PointSpread'])){
                        $game_point_spread = $game['PointSpread'];              
                    }
                    if(!empty($game['HomeTeamPointSpreadPayout'])){
                        $game_home_team_point_spread_payout = $game['HomeTeamPointSpreadPayout'];              
                    }
                    if(!empty($game['AwayTeamPointSpreadPayout'])){
                        $game_away_team_point_spread_payout = $game['AwayTeamPointSpreadPayout'];              
                    }
                    if(!empty($game['OverUnder'])){
                        $game_over_under = $game['OverUnder'];              
                    }
                    if(!empty($game['OverPayout'])){
                        $game_over_payout = $game['OverPayout'];              
                    }
                    if(!empty($game['UnderPayout'])){
                        $game_under_payout = $game['UnderPayout'];              
                    }
                    if(!empty($game['Attendance'])){
                        $game_attendance = $game['Attendance'];              
                    }
                    if(!empty($game['Updated'])){
                        $game_updated = $game['Updated'];              
                    }
                    if(!empty($game['UpdatedUtc'])){
                        $game_updated_utc = $game['UpdatedUtc'];              
                    }
                    if(!empty($game['GlobalGameId'])){
                        $game_global_id = $game['GlobalGameId'];              
                    }
                    if(!empty($game['GlobalAwayTeamId'])){
                        $game_global_away_team_id = $game['GlobalAwayTeamId'];              
                    }
                    if(!empty($game['GlobalHomeTeamId'])){
                        $game_global_home_team_id = $game['GlobalHomeTeamId'];              
                    }
                    if(!empty($game['ClockExtra'])){
                        $game_clock_extra = $game['ClockExtra'];              
                    }
                    if(!empty($game['ClockDisplay'])){
                        $game_clock_display = $game['ClockDisplay'];              
                    }
                    if(!empty($game['IsClosed'])){
                        $game_is_closed = $game['IsClosed'];              
                    }
                    if(!empty($game['HomeTeamFormation'])){
                        $game_home_team_formation= $game['HomeTeamFormation'];              
                    }
                    if(!empty($game['AwayTeamFormation'])){
                        $game_away_team_formation = $game['AwayTeamFormation'];              
                    }
                    if(!empty($game['PlayoffAggregateScore'])){
                        $game_playoff_aggregate_score = $game['PlayoffAggregateScore'];              
                    }
                    
                    $game_array = [
                        'CompetiitonId' => $comp_id,
                        'GameId' => $game_id,
                        'RoundId' => $game_round_id,
                        'Season' => $game_season,
                        'SeasonType' => $game_season_type,
                        'Group' => !empty($game_group)? $game_group:'',
                        'AwayTeamId' => $game_away_team_id,
                        'HomeTeamId' => $game_home_team_id,
                        'VenueId'=> $game_venue_id,
                        'Day' => $game_day,
                        'Datetime' => !empty($game_date_time)? $game_date_time:'',
                        'Status' => $game_status,
                        'Week' => $game_week,
                        'Period' => $game_period,
                        'Clock' => !empty($game_clock)? $game_clock:'',
                        'Winner' => $game_winner,
                        'VenueType' => $game_venue_type,
                        'AwayTeamKey' => $game_away_team_key,
                        'AwayTeamName' => $game_team_name,
                        'AwayTeamCountryCode' => $game_away_team_country_code,
                        'AwayTeamScorePeriod1' => !empty($game_away_team_period_1)? $game_away_team_period_1:'',
                        'AwayTeamScoreExtraTime' => !empty($game_away_team_score_extra_time)? $game_away_team_score_extra_time:'',
                        'HomeTeamKey' => !empty($game_home_team_key)? $game_home_team_key:'',
                        'HomeTeamName' => $game_home_team_name,
                        'HomeTeamCountryCode' => $game_team_country_code,
                        'HomeTeamScore' => !empty($game_team_score)? $game_team_score:'',
                        'HomeTeamScorePeriod1' => !empty($game_team_score_period_1)? $game_team_score_period_1:'',
                        'HomeTeamScorePeriod2' => !empty($game_team_score_period_2)? $game_team_score_period_2:'',
                        'HomeTeamScoreExtraTime' => !empty($game_team_score_extra_time)? $game_team_score_extra_time:'',
                        'HomeTeamScorePenalty' => !empty($game_team_score_penalty)? $game_team_score_penalty:'',
                        'HomeTeamMoneyLine' => !empty($game_home_team_money_line)? $game_home_team_money_line:'',
                        'AwayTeamMoneyLine' => !empty($game_away_team_money_line)? $game_away_team_money_line:'',
                        'DrawMoneyLine' => !empty($game_draw_money_line)? $game_draw_money_line:'',
                        'PointSpread' => !empty($game_point_spread)? $game_point_spread:'',
                        'HomeTeamPointSpreadPayout' => !empty($game_home_team_point_spread_payout)? $game_home_team_point_spread_payout:'',
                        'AwayTeamPointSpreadPayout' => !empty($game_away_team_point_spread_payout)? $game_away_team_point_spread_payout:'',
                        'OverUnder' => !empty($game_over_under)? $game_over_under:'',
                        'OverPayout' => !empty($game_over_payout)? $game_over_payout:'',
                        'UnderPayout' => !empty($game_attendance)? $game_attendance:'',
                        'Updated' => !empty($game_updated)? $game_updated:'',
                        'UpdatedUtc' => !empty($game_updated_utc)? $game_updated_utc:'',
                        'GlobalGameId' => !empty($game_global_id)? $game_global_id:'',
                        'GlobalAwayTeamId' => !empty($game_global_away_team_id)? $game_global_away_team_id:'',
                        'GlobalHomeTeamId' => !empty($game_global_home_team_id)? $game_global_home_team_id:'',
                        'ClockExtra' => !empty($game_clock_extra)? $game_clock_extra:'',
                        'ClockDisplay' => !empty($game_clock_display)? $game_clock_display:'',
                        'IsClosed' => !empty($game_is_closed)? $game_is_closed:'',
                        'HomeTeamFormation' => !empty($game_home_team_formation)? $game_home_team_formation:'',
                        'AwayTeamFormation' => !empty($game_away_team_formation)? $game_away_team_formation:'',
                        'PlayoffAggregateScore' => !empty($game_playoff_aggregate_score)? $game_playoff_aggregate_score:'',
                    ];

                    $comp_games[] = $game_array; 
                    //dump($comp_games); 
                    //dd($game_array);            
                }
                
            }

        }
        //dump($comp_games);
        foreach($comp_games as $comp_game)
        {
            //dd($comp_team);
            $db_game = new Game($comp_game);
            $db_game->save();
        }

        
        return view('games.store');
    }
}
