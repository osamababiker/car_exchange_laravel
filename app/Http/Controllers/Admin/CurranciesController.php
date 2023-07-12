<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CurranciesRequest;
use App\Models\Country;
use App\Models\Currancy;
use Illuminate\Http\Request; 

class CurranciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.currancies.index', [
            'countries' => Country::get(),
            'currancies' => Currancy::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.currancies.create',[
            'countries' => Country::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurranciesRequest $request){
        $currancy = new Currancy();
        $currancy->ar_name = $request->ar_name;
        $currancy->en_name = $request->en_name;
        $currancy->symbol = $request->symbol;
        $currancy->country_id = $request->country_id;
        $currancy->save();
        return redirect()->back()->with('feedback', 'تمت اضافة العملة بنجاح');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CurranciesRequest $request, string $id){
        $currancy = Currancy::findOrFail($id);
        $currancy->ar_name = $request->ar_name;
        $currancy->en_name = $request->en_name;
        $currancy->symbol = $request->symbol;
        $currancy->country_id = $request->country_id;
        $currancy->save();
        return redirect()->back()->with('feedback', 'تم تحديث العملة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Currancy::where('id', $id)->delete();
        return redirect()->back()->with('feedback', 'تم حذف العملة بنجاح');
    }
}
