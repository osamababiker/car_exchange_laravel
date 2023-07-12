<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;

class SettingsController extends Controller
{

    public function index(){
        return view('admin.settings.index',[
            'settings' => Setting::first()
        ]);
    }

    public function update(SettingsRequest $request){
        $info = Setting::first();
        $info->ar_name = $request->ar_name;
        $info->en_name = $request->en_name;
        $info->app_version = $request->app_version;
        $info->primary_email = $request->primary_email;
        $info->secoundary_email = $request->secoundary_email;
        $info->primary_phone = $request->primary_phone;
        $info->secoundary_phone = $request->secoundary_phone;
        $info->ar_bio = $request->ar_bio;
        $info->en_bio = $request->en_bio;
        $info->facebook_url = $request->facebook_url;
        $info->instagram_url = $request->instagram_url;
        $info->twitter_url = $request->twitter_url;
        $info->linkedin_url = $request->linkedin_url;
        $info->ar_privacy_policy = $request->ar_privacy_policy;
        $info->en_privacy_policy = $request->en_privacy_policy;
        $info->ar_usage_policy = $request->ar_usage_policy;
        $info->en_usage_policy = $request->en_usage_policy;
        if($request->has('logo')){
            $image = $request->file('logo');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/settings'),$image_name);
        }else $image_name = $info->logo;
        $info->logo = $image_name;
        $info->save();
        session()->flash('feedback', 'تم تحديث بيانات التطبيق');
        return redirect()->back();

    }
}
