<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function order_list(){
        //authenticate if admin
        $trans = Transaction::all();
        //if user
        $trans = Transaction::where('user_id', Auth::user()->id);

        return view('transaction-list', ['transaction' => $trans]);
    }

    public function order_detail($id){
        $transaction = Transaction::where('id', $id);

        //if admin
        return view('admin-transactionDetail', ['transaction' => $transaction]);

        //if user
        return view('transaction-detail', ['transaction' => $transaction]);

    }
}
