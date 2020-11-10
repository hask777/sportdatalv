<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
        $competitions = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Competitions')
            ->json();
        // dd($competitions);

        foreach($competitions as $competition){
            $comp_detail = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
                ->get('https://api.sportsdata.io/v3/soccer/scores/json/CompetitionDetails/'.$competition['CompetitionId'])
                ->json();

            dump($comp_detail);
        }

        return view('test');
    }
}
