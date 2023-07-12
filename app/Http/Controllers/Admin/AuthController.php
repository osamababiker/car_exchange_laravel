<?php

namespace App\Http\Controllers\Admin;
use App;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    // to load register view
    public function showRegister(){
        return view('auth/register');
    } 
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->lat = 123;
        $user->lng = 123;
        $user->password = Hash::make($request->password);
        $user->save();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        $message = "Please check your data and try again";
        session()->flash('feedback',$message);
        return redirect('register');
    }



    // login section
    public function showLogin(){
        return view('auth/login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        $message = "Please check your data and try again";
        session()->flash('feedback',$message);
        return redirect('login');
    }


    public function logout (Request $request) {
        Auth::logout();
        return redirect('login');
    }


}
