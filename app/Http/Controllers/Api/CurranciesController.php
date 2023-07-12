<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Currancy;

class CurranciesController extends Controller
{
    /** get all currancies */
    public function getCurrancies(){
        $currancies = Currancy::where('status',1)->with('country')->get();
        return response()->json($currancies,200);
    } 
}
