<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function searchItem(Request $req){
        $items = Item::where('item_name', 'LIKE', "%$req->keyword%")->paginate(12);
        
        return view('searchItem', ["items" => $items]);
    }

    public function itemDetail($slug){
        $item = Item::where('item_slug', $slug)->first();
        $itemImage = $item->itemImages;
        $category = Category::where('id', $item->category_id)->first();

        return view('itemDetail', [
            "item" => $item, 
            "itemImage" => $itemImage,
            "category" => $category
        ]);
    }

    public function getCategory($slug){
        $selectedCategory = Category::where('category_slug', $slug)->first();
        $items = Item::where('category_id', $selectedCategory->id)->paginate(12);
        $categories = Category::all();
        
        return view('categoryItem', [
            'categories' => $categories,
            'items'=>$items,
        ]);
    }
}
