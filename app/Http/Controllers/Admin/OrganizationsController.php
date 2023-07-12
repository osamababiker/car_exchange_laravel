<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationsRequest;
use App\Models\Country;
use App\Models\Organization;
use Illuminate\Http\Request; 

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.organizations.index', [
            'countries' => Country::get(),
            'organizations' => Organization::get()
        ]);
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.organizations.create',[
            'countries' => Country::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationsRequest $request){ 
        $organization = new Organization();

        if($request->has('logo')){
            $image = $request->file('logo');
            $logo_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/organizations'),$logo_name);
        }

        if($request->has('license_image')){
            $image = $request->file('license_image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/organizations'),$image_name);
        }

        do{
            $generated_code = \Str::random(11);
            $check_exist = Organization::where('organization_code', $generated_code)->count();
        }while($check_exist > 0);

        $organization->en_name = $request->en_name;
        $organization->ar_name = $request->ar_name;
        $organization->slug = \Str::slug($request->en_name);
        $organization->organization_code = $generated_code;
        $organization->primary_email = $request->primary_email;
        $organization->secoundary_email = $request->secoundary_email;
        $organization->primary_phone = $request->primary_phone;
        $organization->secoundary_phone = $request->secoundary_phone;
        $organization->logo = $logo_name;
        $organization->license_image = $image_name;
        $organization->en_bio = $request->en_bio;
        $organization->ar_bio = $request->ar_bio;
        $organization->facebook_url = $request->facebook_url;
        $organization->instagram_url = $request->instagram_url;
        $organization->twitter_url = $request->twitter_url;
        $organization->linkedin_url = $request->linkedin_url;
        $organization->country_id = $request->country_id;
        $organization->save();
        return redirect()->back()->with('feedback', 'تمت اضافة المنظمة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationsRequest $request, string $id){
        dd($request->all());
        $organization = Organization::findOrFail($id);

        if($request->has('logo')){
            if(file_exists(public_path('upload/organizations/'.$organization->logo))){
                unlink(public_path('upload/organizations/'.$organization->logo));
            }
            $image = $request->file('logo');
            $logo_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/organizations'),$logo_name);
        }else{
            $logo_name = $organization->logo;
        }

        if($request->has('license_image')){
            if(file_exists(public_path('upload/organizations/'.$organization->license_image))){
                unlink(public_path('upload/organizations/'.$organization->license_image));
            }
            $image = $request->file('license_image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/organizations'),$image_name);
        }else{
            $image_name = $organization->license_image;
        }

        if($request->has('license_image')){
            $image = $request->file('license_image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/organizations'),$image_name);
        }

        $organization->en_name = $request->en_name;
        $organization->ar_name = $request->ar_name;
        $organization->primary_email = $request->primary_email;
        $organization->secoundary_email = $request->secoundary_email;
        $organization->primary_phone = $request->primary_phone;
        $organization->secoundary_phone = $request->secoundary_phone;
        $organization->logo = $logo_name;
        $organization->license_image = $image_name;
        $organization->en_bio = $request->en_bio;
        $organization->ar_bio = $request->ar_bio;
        $organization->facebook_url = $request->facebook_url;
        $organization->instagram_url = $request->instagram_url;
        $organization->twitter_url = $request->twitter_url;
        $organization->linkedin_url = $request->linkedin_url;
        $organization->country_id = $request->country_id;
        $organization->save();
        return redirect()->back()->with('feedback', 'تمت اضافة المنظمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Organization::where('id',$id)->delete();
        return redirect()->back()->with('feedback', 'تم حذف المنظمة بنجاح');
    }
}
