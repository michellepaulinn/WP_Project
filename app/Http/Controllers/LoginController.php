<?php

namespace App\Http\Controllers;

use App\Models\Account;
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

        $user = Account::where('account_email', '=', $request->email)->first();

        if($user && Hash::check($request->password, $user['account_password'])){
            $request->session()->regenerate(); 
            return redirect('/');
        }
        
        return redirect('/login')->with('error','Username and Password not match!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
