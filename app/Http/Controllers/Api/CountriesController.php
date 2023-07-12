<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;

class CountriesController extends Controller
{
    /** get all countries */
    public function getCountries(){
        $countries = Country::where('status',1)->get();
        return response()->json($countries,200);
    }
}
