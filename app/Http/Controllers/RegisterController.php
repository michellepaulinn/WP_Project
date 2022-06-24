<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class RegisterController extends Controller

{
     //Register
     public function form(){
        return view('register');
    }
    public function register(Request $request){
        $request->validate([
            'account_name' => 'required',
            'account_email' => 'required | email',
            'account_password' => 'required',
            'account_cPassword' => 'required'
        ]);

        if($request->account_password != $request->account_cPassword){
            return redirect()->back()->with('error','Password and Confirm Password must match');
        }

        $user = Account::insert([
            'account_name' => $request->account_name,
            'account_email' => $request->account_email,
            'account_password' => bcrypt($request->account_password),
            'role_id' => '2'
        ]);

        if($user){
            return redirect('/login');
        }

        return redirect()->back()->with('error','Registration failed!');
    }
}
