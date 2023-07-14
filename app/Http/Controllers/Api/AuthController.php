<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /** Register a new user */
    public function register(Request $request){
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'device_name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }


    /** Log user in */
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json('Unauthorized', 401);
        } 
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    /** Log user out */
    public function logout (Request $request) {
        $user =  $request->user();
        $user->tokens()->delete();
        return response('You have been successfully logged out!', 200);
    }

}
