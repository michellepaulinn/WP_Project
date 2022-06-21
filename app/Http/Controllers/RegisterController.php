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
        $user = Account::create([
            'account_name' => $request->account_name,
            'account_email' => $request->account_email,
            'account_password' => $request->account_password,
            'role_id' => '2'
        ]);

        if($user){
            return redirect('/login');
        }
        return redirect()->back()->with('error','Registration failed!');
    }
}
