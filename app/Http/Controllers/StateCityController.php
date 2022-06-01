<?php

namespace App\Http\Controllers;

use App\Models\L_city;
use App\Models\l_country;
use App\Models\L_state;
use Illuminate\Http\Request;

class StateCityController extends Controller
{
    public function index()
    {
        $data['countries'] = l_country::get(["name","id"]);
        return view('country-state-city',$data);
    }
    public function getState(Request $request)
    {
        $data['states'] = L_state::where("country_id",$request->country_id)
            ->get(["name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = L_city::where("state_id",$request->state_id)
            ->get(["name","id"]);
        return response()->json($data);
    }
}
