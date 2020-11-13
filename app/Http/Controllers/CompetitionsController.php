<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Competition;

class CompetitionsController extends Controller
{
    public function index()
    {

        // $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            // ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            // ->json();
        // // dd($competitions);

        // foreach($competitions as $comp){
        //     // dump($comp);
        // }

        //$competitions = Competition::all();

        return view('competitions.index', [
            //'competitions' => $competitions
        ]);
    }

    public function show($id)
    {
        //$competition = Competition::find($id);
        //$seasons = Season::where('CompetitionName', $competition['Name'])->get();
        // dd($seasons);

        return view('competitions.show', [
            //'seasons' => $seasons,
            //'competition' => $competition
        ]);
    }

    public function store()
    {

        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        foreach($competitions as $comp){
            // dd($comp);
            $comp_id = $comp['CompetitionId'];
            $comp_area_id = $comp['AreaId'];
            $comp_name = $comp['Name'];
            $comp_gender = $comp['Gender'];
            $comp_type = $comp['Type'];
            $comp_format = $comp['Format'];
            $comp_key = $comp['Key'];
            // dump($compid);

            $comp = new Competition([
                'CompetitionId' => $comp_id,
                'AreaId' => $comp_area_id,
                'Name' => $comp_name,
                'Gender' => $comp_gender,
                'Type' => $comp_type,
                'Format' => $comp_format,
                'Key' => $comp_key,
            ]);
            $comp->save(); 
        }
                    
        return view('competitions.store');
    }
}
