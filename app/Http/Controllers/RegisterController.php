<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
            'cPassword' => 'required'
        ],[
            'cPassword.required' => 'The confirm password field is required'
        ]);

        if($request->password != $request->cPassword){
            return redirect()->back()->with('error','Password and Confirm Password must match');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->save();
        $user_id = $user->id;

        if($user_id != null){
            //create user own cart
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->save();
            //go to login page
            return redirect('/login');
        }

        return redirect()->back()->with('error','Registration failed!');
    }
}
