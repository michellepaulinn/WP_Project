<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homepage(){
        $category = Category::all();
        $clothes = Item::all();

        return view('homepage', ['category'=>$category, 'clothes'=>$clothes]);
        // return view('homepage')->with('category', $category)->with('clothes',$clothes);
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }
}
