<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Area;

class AreasController extends Controller
{
    public function index()
    {
        return view('areas.index');
    }

    public function store(Request $request)
    {

        $areas = Http::withHeaders(['Ocp-Apim-Subscription-Key'=>config('services.spdb.token')])
            ->get('https://api.sportsdata.io/v3/soccer/scores/json/Areas')
            ->json();
        // dd($areas);

        
        foreach($areas as $area){
            $areaId = $area['AreaId']; 
            $CountryCode = $area['CountryCode'];  
            $Name = $area['Name']; 
            
            $area = new Area([
                'AreaId' => $areaId,
                'CountryCode' => $CountryCode,
                'Name' => $Name,

            ]);

            
            $area->save();
    
        }  
    }
}
