<?php

namespace App\Http\Controllers\Tutsmaker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CountryStateCityController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('tutsmaker.country-state-city',$data);
    }
    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
}
