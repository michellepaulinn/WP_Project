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
       foreach($cartDetail as $cd){ $totalPrice = $totalPrice + $cd->item->item_price; }

       return view('cart', ["cartDetails" => $cartDetail, "totalPrice" => $totalPrice]);
    }

    public function addToCart(Request $request){
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        $cartDetails = CartDetail::where('cart_id', $cart->id)->get();
        foreach($cartDetails as $cd){
            if($cd->item_id == $request->item_id){
                return redirect()->back()->with(['warning' => 'Item has been added']);
            }
        }

        $cartDetail = new CartDetail();
        $cartDetail->cart_id = $cart->id;
        $cartDetail->item_id = $request->item_id;
        $cartDetail->save();


        return redirect()->back()->with(['alert' => 'Success add Item to cart']);
    }

    public function removeCart(Request $request)
    {
        $cartDetail = CartDetail::where('item_id', $request->item_id)->delete();
       
        return $this->viewCart();
    }
  }
