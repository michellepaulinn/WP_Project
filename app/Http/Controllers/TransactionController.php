<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function view_transaction($id){
        $transaction = Transaction::find($id);
        $dets = $transaction->transactionDetails;
        $total = 0;
        foreach($dets as $det){
            $total += $det->item->item_price;
        }
        return view('transaction-detail', ['transaction'=>$transaction,'dets'=>$dets, 'total'=>$total]);
    }

    public function confirm_payment($id, Request $req){
        $transaction = Transaction::find($id);
        $transaction->transaction_status_id = $req->status;
        $transaction->save();
        return redirect()->back();
    }

    public function cust_orders(){
        $transaction = auth()->user()->transactions;
        // dd($transaction);
        // $dets = $transaction->transactionDetails;
        return view('cust_orders', ['transaction' => $transaction]);
    }

    public function admin_orders(){
        $transaction = Transaction::all();
        return view('admin-transaction', ['transaction' => $transaction]);
    }

}
