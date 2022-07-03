<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }
}
