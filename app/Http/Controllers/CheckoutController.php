<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Item;
use App\Models\CartDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function viewCheckout()
    {
        // ambil cart dan id serta detailnya
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartDetail = CartDetail::where('cart_id', $cart->id)->get();

        // kita ubah status tiap item jadi false
        $total = 0;

        foreach ($cartDetail as $cd) {
            $itemStatus = Item::where('id', $cd->item->id)->first();
            $itemStatus->item_status = false;
            $total += $cd->item->item_price;
            $itemStatus->save();
        }

        //cek ulang
        $cartDetailUpdatedStatus = CartDetail::where('cart_id', $cart->id)->get();

        //create transaction status, terus masukin data datanya
        Transaction::insert([
            'user_id' => Auth::user()->id,
            'transaction_date' => Carbon::now()->format('Y-m-d'),
            'transaction_status_id' => 1,
        ]);

        $transaction = Transaction::where('user_id', Auth::user()->id)->first();


        return view('checkout', ['cart' => $cart, 'cartDetail' => $cartDetailUpdatedStatus, 'transaction' => $transaction, 'total' => $total]);
    }
}
