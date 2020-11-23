<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SheduleController extends Controller
{
    public function index()
    {
        $shedule = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Schedule/73')
            ->json();
        dd($shedule); 

        return view('shedule.index');
    }
}
