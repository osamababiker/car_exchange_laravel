<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountriesRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.countries.index', [
            'countries' => Country::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountriesRequest $request){
        $country = new Country();
        if($request->has('flag')){
            $image = $request->file('flag');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/countries'),$image_name);
        }
        $country->en_name = $request->en_name;
        $country->ar_name = $request->ar_name;
        $country->flag = $image_name;
        $country->save();
        return redirect()->back()->with('feedback', 'تمت اضافة الدولة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountriesRequest $request, string $id){
        $campaign = Country::findOrFail($id);
        if($request->has('flag')){
            if(file_exists(public_path('upload/countries/'.$campaign->flag))){
                unlink(public_path('upload/countries/'.$campaign->flag));
            }
            $image = $request->file('flag');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/countries'),$image_name);
        }else{
            $image_name = $campaign->flag;
        }
        $campaign->en_name = $request->en_name;
        $campaign->ar_name = $request->ar_name;
        $campaign->flag = $image_name;
        $campaign->save();
        return redirect()->back()->with('feedback', 'تم تحديث بيانات الدولة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Country::where('id', $id)->delete();
        return redirect()->back()->with('feedback', 'تم حذف الدولة بنجاح');
    }
}
