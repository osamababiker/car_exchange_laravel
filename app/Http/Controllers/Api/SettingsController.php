<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    /** get app settings and info */
    public function getSettings(){
        $settings = Setting::first();
        return response()->json($settings, 200); 
    }
}
