<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\CartDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    //
    public function viewCheckout()
    {
        $itemImages = ItemImage::all();

        // ambil cart dan id serta detailnya
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartDetail = CartDetail::where('cart_id', $cart->id)->get();


        // kita ubah status tiap item jadi false
        $total = 0;

        foreach ($cartDetail as $cd) {
            $total += $cd->item->item_price;
        }

        //cek ulang 
        $cartDetailUpdatedStatus = CartDetail::where('cart_id', $cart->id)->get();

        //create transaction status, terus masukin data datanya
        $txcheck = Transaction::where('user_id', Auth::user()->id)->first();

        // if ($txcheck) {
        //     echo "<script>console.log('already exist')</script>";
        // } else {
        //     Transaction::insert([
        //         'user_id' => Auth::user()->id,
        //         'transaction_date' => Carbon::now()->format('Y-m-d'),
        //         'created_at' => Carbon::now()->format('Y-m-d'),
        //         'transaction_status_id' => 1,
        //     ]);
        // }



        //ambil transaksi yg dibuat
        // $transaction = Transaction::where('user_id', Auth::user()->id)->first();

        //masukin data ke transaction detail
        // $checktxdetail = TransactionDetail::where('transaction_id', $transaction->id)->get();
        // if ($checktxdetail) {
        // } else {
        //     foreach ($cartDetailUpdatedStatus as $cdUpdate) {
        //         TransactionDetail::insert([
        //             'transaction_id' => $transaction->id,
        //             'item_id' => $cd->item->id,
        //         ]);
        //     }
        // }

        // if ($checktxdetail) {
        //     foreach ($cartDetailUpdatedStatus as $cdUpdate) {
        //         TransactionDetail::insert([
        //             'transaction_id' => $transaction->id,
        //             'item_id' => $cd->item->id,
        //         ]);
        //     }
        // }

        // return dd($transaction->id);
        return view('checkout', ['cart' => $cart, 'cartDetail' => $cartDetailUpdatedStatus,  'total' => $total, 'images' => $itemImages]);
    }

    public function checkOut(Request $req)
    {
        $validator = Validator::make(
            $req->all(),
            [
                'nama' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric'

            ],
            [
                'required' => 'Must be filled!',
                'numeric' => 'Must be numeric!'
            ]
        );

        if ($validator->fails()) {
            return redirect('/checkout')->with('error', 'Please input the right value')->withErrors($validator)->withInput();
        } else {

            //new transaction
            // dd($req);
            $newTrans = new Transaction();
            $newTrans->user_id = Auth::user()->id;
            $newTrans->transaction_status_id = 1;
            $newTrans->transaction_date = now();
            $newTrans->recipient_name = $req->nama;
            $newTrans->shipping_address = $req->address;
            $newTrans->phone_number = $req->phone;
            $newTrans->save();

            // Transaction::insert([
            //     [
            //         'user_id' => Auth::user()->id,
            //         'transaction_status_id' =>1,
            //         'transaction_date' => now(),
            //         'recipient_name' => $req->nama,
            //         'shipping_address' => $req->address,
            //         'phone_number' => $req->phone
            //     ]
            // ])->get();

            // dd($newTrans);
            //into trans det
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cartDetails = $cart->cartDetails;
            // dd($cartDetails);
            $total = 0;

            // dd($cartDetails);
            // dd($newTrans);
            foreach ($cartDetails as $cd) {
                $item = $cd->item;
                $total += $item->item_price;
                TransactionDetail::insert([
                    [
                        'transaction_id' => $newTrans->id,
                        'item_id' => $item->id,
                    ]
                ]);
                $item->item_status = false;
                $item->save();
                $cd->delete();
            }
            // $dets = $newTrans->transactionDetails;

            // dd($dets);
            return view('transaction-detail', ['transaction' => $newTrans, 'dets' => $cartDetails, 'total' => $total]);
        }
    }

    public function upload_payment(Request $request, $id)
    {
        // cari id transactionnya
        $transaction = Transaction::findOrFail($id);
        //show total payment that harus dibayar
        $tot = $request->total;

        //masukin data ke transaction
        // $transaction->recipient_name = $request->nama;
        // $transaction->phone_number = $request->phone;
        // $transaction->shipping_address = $request->address;
        // $transaction->save();

        return view('upload-payment', ['total' => $tot, 'trx' => $transaction]);
    }

    public function process_upload_payment(Request $request, $id)
    {
        //validasi
        // $request->validate([
        //     'payment_proof' => 'required|mimes:jpeg,png,jpg',
        // ]);

        $validator = Validator::make(
            $request->all(),
            [
                'payment_proof' => 'required|mimes:jpeg,png,jpg'
            ],
            [
                'required' => 'Must be filled!',
                'mimes' => 'should be jpeg, png, and jpg'
            ]
        );

        if ($validator->fails()) {
            return back()->with('error', 'Please upload the correct transaction proof')->withErrors($validator)->withInput();
        } else {

            //ambil data dari form
            $extfile = $request->payment_proof->getClientOriginalExtension();
            $file = $request->file('payment_proof');
            $fileName = time() . "." . $extfile;
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
}
