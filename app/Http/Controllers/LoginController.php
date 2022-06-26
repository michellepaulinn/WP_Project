<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller{
    //Login 
    public function form(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        
        return redirect('/login')->with('error','Username and Password not match!');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
