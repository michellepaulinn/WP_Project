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
        //->paginate(15);
        return view('searchItem',[
            "items" => $items,
            "name" => $req->account_name
        ]);
    }

    public function itemDetail($id){
        $item = Item::find($id);
        $itemImage = $item->itemImages()->first();
        return view('itemDetail',["item" =>$item, "itemImage" =>$itemImage,"name" ]);
    }

    //CRUD 
    public function view_create(){
        $categories = Category::all();
        return view('create_item',["categories"=> $categories]);
    }
    public function create_item(Request $req){
        $req->validate([
            'item_name' => 'required',
            'item_price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|file|image'
        ]);
        $item = Item::create([
            'item_name' => $req->item_name,
            'item_price' => $req->item_price,
            'description' => $req->description,
            'category_id' => '1',
            'item_status' => true
        ]);
        $item_file_name = $req->image->getClientOriginalName();
        $req->image->move(public_path('photos'), $item_file_name);

        $itemImage = ItemImage::insert([
            'item_id' => $item->id,
           'item_image' => $item_file_name
        ]);
        dd($item);
        if($item){
           return redirect('/');
        }
        return redirect()->back()->with('error','Add Item Failed!');
    }   

    //Update & Delete (UD)
    public function view_update(){
        
    }
    public function update_item(){

    }
    public function delete_item(){

    }
}
