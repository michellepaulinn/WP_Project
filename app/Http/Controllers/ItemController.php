<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImages;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function searchItem(Request $req){
        $items = Item::where('item_name', 'LIKE', "%$req->keyword%")->get();
        //->paginate(15);
        return view('searchItem',[
            "items" => $items
        ]);
    }

    public function itemDetail($id){
        $item = Item::find($id);
        $itemImage = $item->itemImages()->first();
        return view('itemDetail',["item" =>$item, "itemImage" =>$itemImage]);
    }
}
