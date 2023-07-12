<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Donation;
 
class DonationsController extends Controller
{
    /** get all user donations */
    public function getUserDonations(){
        $rules = ['user_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
         
        $donations = Donation::where('user_id',$request->user_id)
            ->with('campaign')->with('organization')
            ->with('country')->with('currancy')->get();
        return response()->json($donations,200);
    }

    /** get all campaign donations */ 
    public function getCampaignDonations(){
        $rules = ['campaign_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
        
        $donations = Donation::where('campaign_id',$request->campaign_id)
                ->with('campaign')->with('organization')
                ->with('country')->with('currancy')->get();
        return response()->json($donations,200);
    }

    /** make new donation */
    public function makeDonation(Request $request){
        $rules = [
            'user_id' => 'required',
            'campaign_id' => 'required',
            'organization_id' => 'required',
            'amount' => 'required|double',
            'currancy_id' => 'required',
            'bill_image' => 'required|file',
            'notes' => 'nullable'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());

        if($request->has('bill_image')){
            $image = $request->file('bill_image');
            $bill_image = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/donations'),$bill_image);
        }

        $donation = new Donation();
        $donation->user_id = $request->user_id;
        $donation->campaign_id = $request->campaign_id;
        $donation->organization_id = $request->organization_id;
        $donation->amount = $request->amount;
        $donation->currancy_id = $request->currancy_id;
        $donation->notes = $request->notes;
        $donation->bill_image = $bill_image;
        $donation->save();
        return response()->json($donation,201);
    }
}
