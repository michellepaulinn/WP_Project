<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage(Request $request){
        $category = Category::all();
        return view('homepage', ['category'=>$category]);
    }
}
