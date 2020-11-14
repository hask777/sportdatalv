<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\TeamList;

use Illuminate\Http\Request;

class TeamsListController extends Controller
{
    public function index()
    {
		// $teams = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
			// ->get('https://api.sportsdata.io/v3/soccer/scores/json/Teams')
			// ->json();
        // dump($teams);

        // $teams = Team::all();

    	return view('teams.index', [
            // 'teams' => $teams
        ]);
    }

    public function show($id)
    {
        // $team = Team::find($id);
        // $players = Player::where('TeamId', $team['TeamId'])->get();
        // dump($players);
        
        return view('teams.show', [
            // 'team' => $team,
            // 'players' => $players
        ]);
    }

    public function store()
    {
        // set_time_limit (0);

		$teams = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
			->get('https://api.sportsdata.io/v3/soccer/scores/json/Teams')
			->json();
        // dump($teams);

        foreach ($teams as $team) {
        	// dd($team);
			$team_id = $team['TeamId'];
			if(!empty($team['AreaId'])){
				$team_area_id = $team['AreaId'];
			}
        	
        	$team_venue = $team['VenueId'];
        	$team_key = $team['Key'];
        	$team_name = $team['Name'];
        	$team_fullname = $team['FullName'];
        	$team_active = $team['Active'];
        	$team_area_name = $team['AreaName'];
        	$team_venue_name = $team['VenueName'];
        	$team_gender = $team['Gender'];
        	$team_type = $team['Type'];
        	$team_address = $team['Address'];
        	$team_city = $team['City'];
        	$team_zip = $team['Zip'];
        	$team_phone = $team['Phone'];
        	$team_fax = $team['Fax'];
        	if(!empty($team['WebSite'])){
        		$team_website = $team['WebSite'];
        	}else{
        		$team_website = null;
        	}
        	
        	$team_email = $team['Email'];
        	$team_founded = $team['Founded'];
        	$team_color1 = $team['ClubColor1'];
        	$team_color2 = $team['ClubColor2'];
        	$team_color3 = $team['ClubColor3'];
        	if(!empty($team['NickName1'])){
        		$team_nik1 = $team['NickName1'];
        	}else{
        		$team_nik1 = null;
        	}
        	if(!empty($team['NickName1'])){
        		$team_nik2 = $team['NickName2'];
        	}else{
        		$team_nik2 = null;
        	}
        	if(!empty($team['NickName1'])){
        		$team_nik3 = $team['NickName3'];
        	}else{
        		$team_nik3 = null;
        	}
        	
        	$team_wiki_url = $team['WikipediaLogoUrl'];
        	$team_wiki_mark = $team['WikipediaWordMarkUrl'];
        	$team_global_id = $team['GlobalTeamId'];

        	$new_team_list = new TeamList([
        		'TeamId' => $team_id,
        		'AreaId' => $team_area_id,
        		'VenueId' => $team_venue,
        		'Key' => $team_key,
        		'Name' => $team_name,
        		'FullName' => $team_fullname,
        		'Active' => $team_active,
        		'AreaName' => $team_area_name,
        		'VenueName' => $team_venue_name,
        		'Gender' => $team_gender,
        		'Type' => $team_type,
        		'Address' => $team_address,
        		'City' => $team_city,
        		'Zip' => $team_zip,
        		'Phone' => $team_phone,
        		'Fax' => $team_fax,
        		'WebSite' => $team_website,
        		'Email' => $team_email,
        		'Founded' => $team_founded,
        		'ClubColor1' => $team_color1,
        		'ClubColor2' => $team_color2,
        		'ClubColor3' => $team_color3,
        		'NickName1'  => $team_nik1,
        		'NickName2'  => $team_nik2,
        		'NickName3'  => $team_nik3,
        		'WikipediaLogoUrl' => $team_wiki_url,
        		'WikipediaWordMarkUrl' => $team_wiki_mark,
        		'GlobalTeamId' => $team_global_id	
        	]);

        	$new_team_list->save();

        }

    	return view('teams.store');
    }
}
