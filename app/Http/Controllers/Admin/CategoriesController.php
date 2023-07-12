<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.categories.index', [
            'categories' => Category::get()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.categories.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request){
        $category = new Category();

        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/categories'),$image_name);
        }

        $category->en_name = $request->en_name;
        $category->ar_name = $request->ar_name;
        $category->sub_of = $request->sub_of;
        $category->image = $image_name;
        $category->save();

        session()->flash('feedback', 'category has been saved');
        return redirect()->back();
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, String $categoryId){
        $category = Category::findOrFail($categoryId);

        if($request->has('image')){
            if(file_exists(public_path('upload/categories/'.$category->image))){
                unlink(public_path('upload/categories/'.$category->image));
            }
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/categories'),$image_name);
        }else{
            $image_name = $category->image;
        }

        $category->en_name = $request->en_name;
        $category->ar_name = $request->ar_name;
        $category->sub_of = $request->sub_of;
        $category->image = $image_name;
        $category->save();

        session()->flash('feedback', 'category has been updated');
        return redirect()->back();
    }


     /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId){
        $category = Category::findOrFail($categoryId);
        $category->delete();
        session()->flash('feedback', 'category has been deleted');
        return redirect()->back();
    }

}
