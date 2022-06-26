<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller

{
     //Register
     public function form(){
        return view('register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'cPassword' => 'required'
        ],[
            'cPassword.required' => 'The confirm password field is required'
        ]);

        if($request->password != $request->cPassword){
            return redirect()->back()->with('error','Password and Confirm Password must match');
        }

        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => '2'
        ]);

        if($user){
            return redirect('/login');
        }

        return redirect()->back()->with('error','Registration failed!');
    }
}
