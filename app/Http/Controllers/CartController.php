<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart(){
       $cart = Cart::where('user_id', Auth::user()->id)->first();
       $cartDetail = CartDetail::where('cart_id', $cart->id)->get();

       $totalPrice = 0;
       foreach($cartDetail as $cd){ 
        if(! $cd->item->item_status){
            $cd->delete();
        }
        else{
            $totalPrice = $totalPrice + $cd->item->item_price; 
        }
        }

       return view('cart', ["cartDetails" => $cartDetail, "totalPrice" => $totalPrice]);
    }

    public function addToCart(Request $request){
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $item = Item::where('item_slug', $request->item_slug)->first();

        $check = CartDetail::where('cart_id', $cart->id)->where('item_id', $item->id)->first();

        if($check){
            return redirect()->back()->with(['warning' => 'Item has been added']);
        }

        $cartDetail = new CartDetail();
        $cartDetail->cart_id = $cart->id;
        $cartDetail->item_id = $item->id;
        $cartDetail->save();

        return redirect()->back()->with(['alert' => 'Success add Item to cart']);
    }

    public function removeCart(Request $request)
    {
        $currCart = Cart::where('user_id', Auth::user()->id)->first();
        CartDetail::where('item_id', $request->item_id)->where('cart_id', $currCart->id)->delete();
       
        return redirect()->back()->with(['success', 'Success Delete Item from Cart']);
    }
  }
