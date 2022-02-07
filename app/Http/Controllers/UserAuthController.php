<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $user->Password = Hash::make($request->password);
        $res = $user -> save();
        if($res){
            back()->with('success', 'You have registered successfully!');
            return redirect('login');
        }
        else{
            return back()->with('fail', 'Something Worng!');
        }
    }
    public function loginUser(Request $request){
        $user = User::where('User_Name', '=', $request->user)->first();
        if($user){
            if(Hash::check($request->password, $user->Password)){
                $request -> session() -> put('loginId', $user->id);
                return redirect('index');
            }
            else{
                return back()->with('fail', 'Something Worng!');
            }
        }
        else{
            return back()->with('fail', 'Something Worng!');
        }
    }
    public function index(){
        return view('auth.index');
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
