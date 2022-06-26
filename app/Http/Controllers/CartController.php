<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart()
    {
        $account = 1; //semetara anggep aja id account itu 1
        $crt = Cart::find($account);

        return view('cart', [
            'crt' => $crt,
        ]);
    }
}
