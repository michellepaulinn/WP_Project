<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageSlider;
use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage(){
        $items = Item::where('item_status',true)->latest()->take(8)->get();
        $categories = Category::all();
        $sliders = ImageSlider::all();

        return view('homepage', [
            'categories'=>$categories,
            'items'=>$items,
            'sliders'=>$sliders
        ]);
    }
}
