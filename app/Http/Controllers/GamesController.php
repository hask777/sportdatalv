<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        foreach($competitions as $competition){
            // dump($competition['CompetitionId']);
            
            $comp_detail = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/CompetitionDetails/'.$competition['CompetitionId'])
            ->json();

            $games = [];

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
                        $game = $game['AwayTeamCountryCode'];               
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
                        'TeamId' => $team_id,
                        'AreaId' => $team_area_id,
                        'VenueId' => $team_venue_id,
                        'Key' => $team_key,
                        'Name' => $team_name,
                        'FullName' => $team_full_name,
                        'Active' => $team_active,
                        'AreaName' => $team_area_name,
                        'VenueName'=> $team_venue_name,
                        'Gender' => $team_gender,
                        'Type' => $team_type,
                        'Address' => $team_address,
                        'City' => $team_city,
                        'Zip' => $team_zip,
                        'Phone' => $team_phone,
                        'Fax' => $team_fax,
                        'Website' => $team_website,
                        'Email' => !empty($team_email)? $team_email:'',
                        'Founded' => $team_founded,
                        'ClubColor1' => !empty($team_color1)? $team_color1:'',
                        'ClubColor2' => !empty($team_color2)? $team_color2:'',
                        'ClubColor3' => !empty($team_color3)? $team_color3:'',
                        'Nickname1' => !empty($team_nick1)? $team_nick1:'',
                        'Nickname2' => !empty($team_nick2)? $team_nick2:'',
                        'Nickname3' => !empty($team_nick3)? $team_nick3:'',
                        'WikipediaLogoUrl' => !empty($team_wiki_logo)? $team_wiki_logo:'',
                        'WikipediaWordMarkUrl' => !empty($team_wiki_url)? $team_wiki_url:'',
                        'GlobalTeamId' => !empty($team_global_id)? $team_global_id:'',
                    ];

                    $games[] = $game_array;
                        
                }
                dump($games);
            }

        }
        
        return view('test');
    }
}
