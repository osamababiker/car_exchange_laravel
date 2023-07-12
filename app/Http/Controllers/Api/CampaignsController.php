<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Campaign;
use Validator;

class CampaignsController extends Controller
{
    /** get all campaigns */
    public function getCampaigns(){
        $campaigns = Campaign::where('status',1) 
            ->with('country')
            ->with('donations')  
            ->with('category')
            ->with('currancy')->with('currancy.country')
            ->with('organization')->with('organization.country')->get();
        return response()->json($campaigns,200);
    }
 
    /** get campaign by id */
    public function getCampaign(Request $request){
        $rules = ['campaign_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
        
        $campaign = Campaign::where('id',$request->campaign_id)
            ->where('status',1)
            ->with('country')
            ->with('donations')  
            ->with('category')
            ->with('currancy')->with('currancy.country')
            ->with('organization')->with('organization.country')->first();
        if($campaign) 
            return response()->json($campaign,200);
        else 
            return response()->json('not found',404);
    }

    // get campaigns by category id
    public function getCampaignsByCategory(Request $request){
        $rules = ['category_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors()); 

        $campaigns = Campaign::where('status',1)
            ->where('category_id',$request->category_id)
            ->with('country')
            ->with('donations')  
            ->with('category')
            ->with('currancy')->with('currancy.country')
            ->with('organization')->with('organization.country')->get();
        return response()->json($campaigns,200);
    }

    // get campaigns by organization id
    public function getCampaignsByOrganization(Request $request){
        $rules = ['organization_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors()); 

        $campaigns = Campaign::where('status',1) 
            ->where('organization_id',$request->organization_id)
            ->with('country')
            ->with('donations')  
            ->with('category')
            ->with('currancy')->with('currancy.country')
            ->with('organization')->with('organization.country')->get();
        return response()->json($campaigns,200);
    }

    /** get campaigns by name */
    public function getCampaignsByTitle(Request $request){
        $rules = ['title' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
        $campaigns = Campaign::where('en_title','like', '%' . $request->title . '%')
            ->orWhere('ar_title','like', '%' . $request->title . '%')
            ->where('status', 1)
            ->with('country')
            ->with('donations')  
            ->with('category')
            ->with('currancy')->with('currancy.country')
            ->with('organization')->with('organization.country')->get();
        return response()->json($campaigns,200);
    }

    /** make new campaign */
    public function makeCampaign(Request $request){
        $rules = [
            'en_title' => 'required|string',
            'ar_title' => 'required|string',
            'primary_phone' => 'required',
            'secoundary_phone' => 'nullable',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'image' => 'required|file',
            'target' => 'required|double',
            'currancy_id' => 'required',
            'country_id' => 'required',
            'category_id' => 'required',
            'organization_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());

        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/campaigns'),$image_name);
        }

        $campaign = new Campaign();
        $campaign->en_title = $request->en_title;
        $campaign->ar_title = $request->ar_title;
        $campaign->primary_phone = $request->primary_phone;
        $campaign->secoundary_phone = $request->secoundary_phone;
        $campaign->en_content = $request->en_content;
        $campaign->ar_content = $ar_content;
        $campaign->image = $image_name;
        $campaign->target = $request->target;
        $campaign->currancy_id = $request->currancy_id;
        $campaign->country_id = $request->country_id;
        $campaign->category_id = $request->category_id;
        $campaign->organization_id = $request->organization_id;
        $campaign->save();
        return response()->json($campaign,201);
    }
}
