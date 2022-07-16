<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\ItemImages;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function searchItem(Request $req){
        $items = Item::where('item_name', 'LIKE', "%$req->keyword%")->get();
        $images = ItemImage::all();
        //->paginate(15);
        return view('searchItem',[
            "items" => $items,
            "name" => $req->account_name,
            "images" => $images
        ]);
    }

    public function itemDetail($id){
        // $item = Item::find($id);
        // $itemImage = $item->itemImage();
        // return view('itemDetail',["item" =>$item, "itemImage" =>$itemImage,"name" ]);
       
        $item = Item::find($id);
        $itemImage = ItemImage::where('item_id', $id)->first();
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
