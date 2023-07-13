<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $cars = Car::with('user')->with('bids')->withMax('bids','price')->get();
        return response()->json($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'userId' => 'required',
            'name' => 'required|string',
            'model' => 'required|string',
            'price' => 'required',
            'description' => 'required|string',
            'picture' => 'required|file',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        if($request->picture != null && $request->picture != ''){
            $uploadedFile = time().'_'. rand(1000, 9999).$_FILES['picture']['name'];
            $file_tmp =$_FILES['picture']['tmp_name'];
            move_uploaded_file($file_tmp,public_path('upload/cars/').$uploadedFile);
        }else $uploadedFile = '';

        $car = new Car();
        $car->userId = $request->userId;
        $car->name = $request->name;
        $car->model = $request->model;
        $car->openingPrice = $request->price;
        $car->description = $request->description;
        $car->picture = $uploadedFile;
        $car->save();

        return response()->json($car, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $car = Car::where('id',$id)->with('user')->with('bids')->first();
        return response()->json($car, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
