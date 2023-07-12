<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Validator;

class CategoriesController extends Controller
{
    /** get all categories */
    public function getCategories(){
        $categories = Category::with('parent')->get();
        return response()->json($categories,200);
    }

    // get all sub categories
    public function getSubCategory(Request $request){
        $rules = ['category_id' => 'required'];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors());
        $categories = Category::where('sub_of',$request->category_id)
                ->with('parent')->get();
        return response()->json($categories,200);
    }

}
