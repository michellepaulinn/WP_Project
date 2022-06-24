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
            'category_id' => $req->category,
            'item_status' => true
        ]);
        $extension = $req->image->extension();
        $item_file_name = time().'.'.$extension; 
        $req->image->move(public_path('photos'), $item_file_name);
        $itemImage = ItemImage::insert([
            'item_id' => $item->id,
           'item_image' => $item_file_name
        ]);
        // dd($item);
        if($item&&$itemImage){
           return redirect('/');
        }
        return redirect()->back()->with('error','Add Item Failed!');
    }   

    //Update & Delete (UD)
    public function view_update(){
        //ini gw bingung ntar dashboard admin ama user apakah beda? sementara gw buat view yang kayak item detail ??????????
        //sementara view belom buat ye msh logic ae (g bisa testing g ad view)
    }

    //Belum test bcs gak ada view
    public function update_item(Request $req,$id){
        $req->validate([
            'item_name' => 'required',
            'item_price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|file|image'
        ]);

        $item = Item::findOrFail($id);
        $item->item_name = $req->item_name;
        $item->item_price = $req->item_price;
        $item->description = $req->description;
        $item->category_id = $req->category;
        $item->item_status =  true;
        $item->save();
        //logic item image belom
        return redirect('/');
    }
    public function delete_item(Request $req,$id){
        $item = Item::findOrFail($id);
        $item->delete();
        $itemImage = ItemImage::where('item_id',$id)->first();
        $itemImage->delete();
        return redirect('/');
    }
}
