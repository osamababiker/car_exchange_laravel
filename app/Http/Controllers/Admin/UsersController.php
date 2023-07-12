<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Validator;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index(){
        $users = User::get();
        return view('dashboard.users.index', compact(['users']));
    }

    public function update(Request $request){
        $user = User::findOrFail($request->userId);
        $user->role = $request->role;
        $user->save();
        session()->flash('feedback', 'User role has been updated successfully');
        return redirect()->back();
    }

}
