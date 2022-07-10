<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $rememberMe = $request->has('remember_me') ? true : false;
        
        Auth::setRememberDuration(1440);
        if(Auth::attempt($credentials, $rememberMe)){
            $request->session()->regenerate();

            return redirect('/');
        }
        
        return redirect('/login')->with('error','Email and Password not match!');
    }

    public function logout(Request $request){
        if(Auth::check()){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::logout();
        }
        return redirect('/');
    }
}
