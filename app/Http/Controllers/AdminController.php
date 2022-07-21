<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //CRUD 
    //Form untuk Create
    public function view_create()
    {
        $categories = Category::all();
        return view('create_item', ["categories" => $categories]);
    }
    //Logic Create (C)
    public function create_item(Request $req)
    {
        $req->validate([
            'item_name' => 'required',
            'item_price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
            'image.*' => 'image'
        ]);
        // $item = Item::insert([
        //     'item_name' => $req->item_name,
        //     'item_slug' => Str::slug($req->item_name),
        //     'item_price' => $req->item_price,
        //     'description' => $req->description,
        //     'category_id' => $req->category,
        //     'item_status' => true
        // ]);

        $item = new Item();
        $item->item_name = $req->item_name;
        $item->item_slug = Str::slug($req->item_name);
        $item->item_price = $req->item_price;
        $item->description = $req->description;
        $item->category_id = $req->category;
        $item->item_status = true;
        $item->save();

        //add images 
        $i = 0;
        foreach($req->file('image') as $image){
            $extension = $image->extension();
            $item_file_name = $i . time() . '.' . $extension;
            $image->move(public_path('photos'), $item_file_name);

            $itemImage = ItemImage::insert([
                'item_id' => $item->id,
                'item_image' => $item_file_name
            ]);
            $i++;
        }
        // dd($item);
        if ($item && $itemImage) {
            return redirect('/')->with('successItem', 'Success Add Item');
        }
        return redirect()->back()->with('error', 'Add Item Failed!');
    }

    //Update & Delete (UD)
    //Form Update
    public function view_update($slug)
    {
        $categories = Category::all();
        $item = Item::where('item_slug', $slug)->first();
        return view('update_item', ["categories"=> $categories,"item"=>$item]);
    }

    //Logic Update
    public function update_item(Request $req, $id)
    {
        $req->validate([
            'item_name' => 'required',
            'item_price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
            'image.*' => 'image'
        ]);

        $item = Item::findOrFail($id);
        $item->item_name = $req->item_name;
        $item->item_slug = Str::slug($req->item_name);
        $item->item_price = $req->item_price;
        $item->description = $req->description;
        $item->category_id = $req->category;
        $item->item_status = true;
        $item->save();

        //logic item image belom
        //Delete Item Image lama
        $itemImage = ItemImage::where('item_id', $id)->get();
        foreach ($itemImage as $image) {
            File::delete(public_path('photos/' . $image->item_image));
            $image->delete();
        }

        //Simpan Item Image baru
        $i = 0;
        foreach($req->file('image') as $image){
            $extension = $image->extension();
            $item_file_name = $i . time() . '.' . $extension;
            $image->move(public_path('photos'), $item_file_name);

            $itemImage = ItemImage::insert([
                'item_id' => $item->id,
                'item_image' => $item_file_name
            ]);
            $i++;
        }

        return redirect('/')->with('successItem', 'Success Update Item');
    }

    public function delete_item($slug)
    {
        $item = Item::where('item_slug', $slug)->first();
        $itemImage = ItemImage::where('item_id', $item->id)->get();
        foreach ($itemImage as $image) {
            File::delete(public_path('photos/' . $image->item_image));
            $image->delete();
        }

        $item->delete();
        return redirect('/')->with('successItem', 'Success Delete Item');
    }
}
