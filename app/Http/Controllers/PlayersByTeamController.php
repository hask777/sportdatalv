<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\PlayersByTeam;


class PlayersByTeamController extends Controller
{
    public function index()
    {       
    	// $last_key = '79746e7a800c40518287a30fe7deb38a';

        // $teams = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>$last_key])->get('https://api.sportsdata.io/v3/soccer/scores/json/Teams')->json();
        // // dump($teams);
       
        // $players = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>$last_key])->get('https://api.sportsdata.io/v3/soccer/scores/json/Players')->json();
        // dump($players);

        // foreach($teams as $team){

		// 	$players = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>$last_key])->get('https://api.sportsdata.io/v3/soccer/scores/json/PlayersByTeam/'. $team['TeamId'])->json();
        // 	dump($players);
        // }

        // $players = Player::all();

    	return view('players.index', [
    		// 'players' => $players
    	]);
    }

    public function show($id)
    {
        // $player = Player::find($id);
        // dump($player);
        return view('players.show', [
            // 'player' =>$player
        ]);
    }

    public function store()
    {
		// set_time_limit (0);

        $teams = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Teams')
            ->json();
        dump($teams);

        
        foreach($teams as $team){

            if(!empty($team['TeamId']))
            {       

                $players = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
                    ->get('https://api.sportsdata.io/v3/soccer/scores/json/PlayersByTeam/'. $team['TeamId'])
                    ->json();
                // dump($players);
    
                foreach ($players as $player) {
                
                    $team_id = $team['TeamId'];
                    if(!empty($player['PlayerId'])){
                        $player_id = $player['PlayerId'];
                    }
                    if(!empty($player['FirstName'])){
                        $player_first_name = $player['FirstName'];
                    }
                    
                    $player_last_name = $player['LastName'];
                    $player_common_name = $player['CommonName'];
                    $player_short_name = $player['ShortName'];
                    $player_position = $player['Position'];
                    $player_pos_category = $player['PositionCategory'];
                    $player_jersey = $player['Jersey'];
                    $player_foot = $player['Foot'];
                    $player_height =  $player['Height'];
                    $player_weight = $player['Weight'];
                    $player_gender = $player['Gender'];
                    $player_birth_day = $player['BirthDate'];
                    $player_birth_city = $player['BirthCity'];
                    $player_birth_country = $player['BirthCountry'];
                    $player_nationality = $player['Nationality'];
                    $player_injury_status = $player['InjuryStatus'];
                    $player_injury_body_part = $player['InjuryBodyPart'];
                    $player_injury_notes = $player['InjuryNotes'];
                    $player_injury_start_date = $player['InjuryStartDate'];
                    $player_update = $player['Updated'];
                    $player_photo = $player['PhotoUrl'];
                    $player_roto_wire_id = $player['RotoWirePlayerID'];
                    $player_draft_king_position = $player['DraftKingsPosition'];
    
                    $team_player = [
                        'TeamId' => $team_id,
                        'PlayerId' => $player_id,
                        'FirstName' => $player_first_name,
                        'LastName' => $player_last_name,
                        'CommonName' => $player_common_name,
                        'ShortName' => $player_short_name,
                        'Position' => $player_position,
                        'PositionCategory' => $player_pos_category,
                        'Jersey' => $player_jersey,
                        'Foot' => $player_foot,
                        'Height' => $player_height,
                        'Weight' => $player_weight,
                        'Gender' => $player_gender,
                        'BirthDate' => $player_birth_day,
                        'BirthCity' => $player_birth_city,
                        'Nationality' => $player_nationality,
                        'InjuryStatus' => $player_injury_status,
                        'InjuryBodyPart' => $player_injury_body_part,
                        'InjuryNotes' => $player_injury_notes,
                        'InjuryStartdate' => $player_injury_start_date,
                        'Updated' => $player_update,
                        'PhotoUrl' => $player_photo,
                        'RotoWirePlayerID' => $player_roto_wire_id,
                        'DraftKingsPosition' => $player_draft_king_position,
    
                    ];
                    
                    $new_player = new PlayersByTeam($team_player);
                    //$players_array[] = $team_player;
                    $new_player->save();
                    
                }
            }
        }
        //dump($players_array);
        

    	return view('players.store');
    }
}
