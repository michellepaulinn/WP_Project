<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Item;
use App\Models\CartDetail;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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

        //ambil transaksi yg dibuat
        $transaction = Transaction::where('user_id', Auth::user()->id)->first();


        return view('checkout', ['cart' => $cart, 'cartDetail' => $cartDetailUpdatedStatus, 'transaction' => $transaction, 'total' => $total]);
    }

    public function upload_payment(Request $request, $id)
    {
        // cari id transactionnya
        $transaction = Transaction::find($id);
        //show total payment that harus dibayar
        $tot = $request->total;

        return view('upload-payment', ['total' => $tot, 'trx' => $transaction]);
    }

    public function process_upload_payment(Request $request, $id)
    {
        //validasi
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //ambil data dari form
        $file = $request->file('payment_proof');
        $fileName = time();
        $file->move('images/payment', $fileName);

        //ambil data dari transaction
        $transaction = Transaction::where('id', $id)->first();
        $transaction->transaction_status_id = 2;
        $transaction->proof = $fileName;
        $transaction->save();

        //hapus item di cart
        $cart = Cart::where('user_id', $transaction->user_id)->first();
        $cartdetail = CartDetail::where('cart_id', $cart->id)->delete();


        return redirect('/')->with(['successPayment' => 'Success upload payment']);

        // return "success";
    }
}
