<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Team;

class TeamsController extends Controller
{
    public function index()
    {
        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        $teams = Team::all();

        foreach($teams as $teams)
        {
            dd($teams);
        }

        return view('teams.index');
    }

    public function show($id)
    {
        return view('teams.show');
    }

    public function store(Request $request)
    {
        set_time_limit (0);
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
            if(!empty($comp_detail['Teams'])){
                foreach($comp_detail['Teams'] as $team)
                {
                    //dd($team);
                    if(!empty($comp_id)){
                        $comp_id = $comp_id;  
                    }
                    if(!empty($team['TeamId'])){
                        $team_id = $team['TeamId'];  
                    }
                    if(!empty($team['AreaId'])){
                        $team_area_id = $team['AreaId'];  
                    }
                    if(!empty($team['VenueId'])){
                        $team_venue_id = $team['VenueId'];                
                    }
                    if(!empty($team['Key'])){
                        $team_key = $team['Key'];                
                    }
                    if(!empty($team['Name'])){
                        $team_name = $team['Name'];                
                    }
                    if(!empty($team['FullName'])){
                        $team_full_name = $team['FullName'];                
                    }
                    if(!empty($team['FullName'])){
                        $team_full_name = $team['FullName'];                
                    }
                    if(!empty($team['Active'])){
                        $team_active = $team['Active'];                
                    }
                    if(!empty($team['AreaName'])){
                        $team_area_name = $team['AreaName'];                
                    }
                    if(!empty($team['VenueName'])){
                        $team_venue_name = $team['VenueName'];           
                    }
                    if(!empty($team['Gender'])){
                        $team_gender = $team['Gender'];                
                    }
                    if(!empty($team['Type'])){
                        $team_type = $team['Type'];               
                    }
                    if(!empty($team['Address'])){
                        $team_address = $team['Address'];               
                    }
                    if(!empty($team['City'])){
                        $team_city = $team['City'];               
                    }
                    if(!empty($team['Zip'])){
                        $team_zip = $team['Zip'];               
                    }
                    if(!empty($team['Phone'])){
                        $team_phone = $team['Phone'];               
                    }
                    if(!empty($team['Fax'])){
                        $team_fax = $team['Fax'];               
                    }
                    if(!empty($team['Website'])){
                        $team_website = $team['Website'];               
                    }
                    if(!empty($team['Email'])){
                        $team_email = $team['Email'];               
                    }
                    if(!empty($team['Founded'])){
                        $team_founded = $team['Founded'];               
                    }
                    if(!empty($team['ClubColor1'])){
                        $team_color1 = $team['ClubColor1'];               
                    }
                    if(!empty($team['ClubCulor2'])){
                        $team_color2 = $team['ClubCulor2'];               
                    }
                    if(!empty($team['ClubColor3'])){
                        $team_color3 = $team['ClubColor3'];               
                    }
                    if(!empty($team['Nickname1'])){
                        $team_nick1 = $team['Nickname1'];              
                    } 
                    if(!empty($team['Nickname2'])){
                        $team_nick2 = $team['Nickname2'];              
                    }
                    if(!empty($team['Nickname3'])){
                        $team_nick3 = $team['Nickname3'];              
                    }
                    if(!empty($team['WikipediaLogoUrl'])){
                        $team_wiki_logo = $team['WikipediaLogoUrl'];              
                    }
                    if(!empty($team['WikipediaWordMarkUrl'])){
                        $team_wiki_url = $team['WikipediaWordMarkUrl'];              
                    }
                    if(!empty($team['GlobalTeamId'])){
                        $team_global_id = $team['GlobalTeamId'];              
                    }
  
                    $team_info = [
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

                    $comp_teams[] = $team_info;
                    
                }
              
            }

        }

        //dump($comp_teams); 

        foreach($comp_teams as $comp_team)
        {
            //dd($comp_team);
            $db_team = new Team($comp_team);
            $db_team->save();
        }

        return view('teams.store');
    }
}
