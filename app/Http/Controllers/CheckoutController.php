<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public static function checkout()
    {

        return view('checkout');
    }
}
