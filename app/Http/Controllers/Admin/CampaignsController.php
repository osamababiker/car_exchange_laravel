<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignsRequest;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\Currancy;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.campaigns.index', [
            'campaigns' => Campaign::get(),
            'countries' => Country::get(),
            'currancies' => Currancy::get(),
            'categories' => Category::get(),
            'organizations' => Organization::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.campaigns.create', [
            'countries' => Country::get(),
            'currancies' => Currancy::get(),
            'categories' => Category::get(),
            'organizations' => Organization::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignsRequest $request){
        $campaign = new Campaign();

        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/campaigns'),$image_name);
        }

        $campaign->en_title = $request->en_title;
        $campaign->ar_title = $request->ar_title;
        $campaign->slug = \Str::slug($request->en_title);
        $campaign->primary_phone = $request->primary_phone;
        $campaign->secoundary_phone = $request->secoundary_phone;
        $campaign->en_content = $request->en_content;
        $campaign->ar_content = $request->ar_content;
        $campaign->image = $image_name;
        $campaign->target = $request->target;
        $campaign->currancy_id = $request->currancy_id;
        $campaign->country_id = $request->country_id;
        $campaign->category_id = $request->category_id;
        $campaign->organization_id = $request->organization_id;
        $campaign->save();
        return redirect()->back()->with('feedback', 'تمت اضافة الحملة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampaignsRequest $request, string $id){
        $campaign = Campaign::findOrFail($id);
        if($request->has('image')){
            if(file_exists(public_path('upload/campaigns/'.$campaign->image))){
                unlink(public_path('upload/campaigns/'.$campaign->image));
            }
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/campaigns'),$image_name);
        }else{
            $image_name = $campaign->image;
        }

        $campaign->en_title = $request->en_title;
        $campaign->ar_title = $request->ar_title;
        $campaign->primary_phone = $request->primary_phone;
        $campaign->secoundary_phone = $request->secoundary_phone;
        $campaign->en_content = $request->en_content;
        $campaign->ar_content = $request->ar_content;
        $campaign->image = $image_name;
        $campaign->target = $request->target;
        $campaign->progress = $request->progress;
        $campaign->status = $request->status;
        $campaign->currancy_id = $request->currancy_id;
        $campaign->country_id = $request->country_id;
        $campaign->category_id = $request->category_id;
        $campaign->organization_id = $request->organization_id;
        $campaign->save();
        return redirect()->back()->with('feedback', 'تم تحديث الحملة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Campaign::where('id', $id)->delete();
        return redirect()->back()->with('feedback', 'تم حذف الحملة بنجاح');
    }
}
