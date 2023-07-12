<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage; 

class ImagesController extends Controller
{


    public function store(Request $request){
        $files = $request->file('images');
        foreach ($files as $file) {
            $image = new ProductImage();
            $fileName = time().'_'. rand(1000, 9999). '.' .$file->extension();
            $file->move(public_path('upload/products'),$fileName);
            $image->url = $fileName;
            $image->productId = $_GET['productId'];
            $image->save();
        }

        session()->flash('feedback', 'product images has been uploaded successfully');
        return response()->json(['success'=>'true']);
    }


    public function destroy(Request $request){
        $checkImagesCount = ProductImage::where('productId', $request->productId)->count();
        if($checkImagesCount <= 1){
            session()->flash('feedback', 'product shuld have at least one image');
            return redirect()->back();
        }
        $image = ProductImage::findOrFail($request->imageId); 
        if(file_exists(public_path('upload/products/'.$image->url))){
            unlink(public_path('upload/products/'.$image->url));
        }
        $image->delete();

        session()->flash('feedback', 'product images has been deleted successfully');
        return redirect()->back();
    }
}
