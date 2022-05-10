<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function homepage(){
        return view('homepage');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }
}
