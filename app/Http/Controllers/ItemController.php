<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function searchItem(Request $req){
        $items = Item::where('item_name', 'LIKE', "%$req->keyword%")->paginate(12);
        
        return view('searchItem',[
            "items" => $items
        ]);
    }

    public function itemDetail($id){
        // $item = Item::find($id);
        // $itemImage = $item->itemImage();
        // return view('itemDetail',["item" =>$item, "itemImage" =>$itemImage,"name" ]);
       
        $item = Item::find($id);
        $itemImage = $item->itemImages;
        $category = Category::where('id', $item->category_id)->first();
        return view('itemDetail',["item" =>$item, "itemImage" =>$itemImage,"category"=>$category]);
    }

    public function getCategory($id){
        $items = Item::where('category_id', $id)->get();
        $categories = Category::all();
        $images = ItemImage::all();
        return view('categoryItem', ['categories'=>$categories,'items'=>$items,'images'=>$images]);
    }
}
