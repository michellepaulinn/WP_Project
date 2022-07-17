<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageSlider;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage(Request $request){
        // if(request('category')){
        //     $categories = Category::firstWhere('slug',request('category'));
        // }
        $items = Item::where('item_status',true)->latest()->paginate(8);
        $categories = Category::all();
        $images = ItemImage::all();
        $sliders = ImageSlider::all();

        return view('homepage', ['categories'=>$categories,'items'=>$items,'images'=>$images, 'sliders'=>$sliders]);
    }
}
