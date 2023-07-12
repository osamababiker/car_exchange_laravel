<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonationsRequest;
use App\Models\Donation;
use Illuminate\Http\Request; 
 
class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.donations.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DonationsRequest $request, string $id){
        $donation = Donation::findOrFail($id);
        $donation->status = $request->status;
        $donation->save();
        return redirect()->back()->with('feedback', 'تم تحديث حالة التبرع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Donation::where('id',$id)->delete();
        return redirect()->back()->with('feedback', 'تم حذف التبرع بنجاح');
    }
}
