<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserAuthController extends Controller
{
    public function login(){
        return view("auth.Login");
    }
    
    public function registration(){
        return view("auth.Registration");
    }
    public function registerUser(Request $request){
        $user = new User();
        $user->User_Name = $request->user;
        $user->First_Name = $request->firstname;
        $user->Last_Name = $request->lastname;
        $user->Email = $request->email;
        $user->Password = sha1($request->password);
        $res = $user -> save();
        if($res){
            back()->with('success', 'You have registered successfully!');
            return redirect('login');
        }
        else{
            return back()->with('fail', 'Something Worng!');
        }
    }
}
