<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesByDateController extends Controller
{
    public function index()
    {
        $gamesByDate = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/GamesByDate/2020-10-25')
            ->json();
        dd($gamesByDate); 

        return view('games.by_date');
    }
}
