<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Organization;

class OrganizationsController extends Controller
{
 
    /** get all organizations */
    public function getOrganizations(){
        $organizations = Organization::where('status',1)
            ->with('campaigns')->with('country')
            ->with('donations')->get();
        return response()->json($organizations,200); 
    }

    /** get oranization by id */
    public function getOrganization(Request $request){ 
        $rules = ['organization_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
        
        $organization = Organization::where('id',$organization_id)
            ->where('status',1)
            ->with('donations')->with('campaigns')->with('country')->first();
        if($organization) 
            return response()->json($organization,200);
        else  
            return response()->json('not found',404);
    }

    /** get organizations bu name */
    public function getOrganizationsByName(Request $request){
        $rules = ['name' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
        $organizations = Organization::where('en_name','like', '%' . $request->name . '%')
            ->orWhere('ar_name','like', '%' . $request->name . '%')
            ->where('status', 1)
            ->with('campaigns')->with('country')
            ->with('donations')->get();
        return response()->json($organizations,200);
    }
}
