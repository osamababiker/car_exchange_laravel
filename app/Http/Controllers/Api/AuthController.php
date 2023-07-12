<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, DB, Auth, Mail, App;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request){
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'lat' => 'required',
            'lng' => 'required',
            'password' => 'required|confirmed',
            'device_name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        

        $digits = mt_rand(1000,9999);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->lat = $request->lat;
        $user->lng = $request->lng;
        $user->password = Hash::make($request->password);
        $user->verification_code = $digits;
        $user->save();

        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }


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

    public function update(Request $request){
        $rules = [
            'name' => "required|string",
            'phone' => 'required',
            'userId' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = User::find($request->userId);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }


    public function updatePassword(Request $request){
        $rules = [
            'password' => "required",
            'userId' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        $user = User::find($request->userId);
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user, 200);
    }


    public function user(Request $request){
        return auth()->user();
    }


    public function ForgetPasswordForm(Request $request){
        $rules = [
            'email' => "required|email|exists:users",
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        try {
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('dashboard.emails.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password'); 
            });
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),500);
        }

        return response()->json('Email sended successfully',200);
    }


    public function ResetPasswordForm(Request $request){
        $rules = [
            'email' => "required|email|exists:users",
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token 
            ])->first();

        if(!$updatePassword){
            return response()->json('Invalid Token', 400);
        }
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return response()->json('Password updated successfully',200);
    }


    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        return response('You have been successfully logged out!', 200);
    }

}
