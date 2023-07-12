<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Organization;
use App\Models\Donation;
 
class HomeController extends Controller
{
    public function index(Request $request){
        return view('admin/index',[
            'campaignsCount' => Campaign::count() ,
            'organizationsCount' => Organization::count(),
            'donationsCount' => Donation::sum('amount')
        ]);
    }
}
