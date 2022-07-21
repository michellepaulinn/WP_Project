<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    public function view_transaction($id)
    {
        $transaction = Transaction::find($id);
        $dets = $transaction->transactionDetails;
        $total = 0;
        foreach ($dets as $det) {
            $total += $det->item->item_price;
        }
        return view('transaction-detail', ['transaction' => $transaction, 'dets' => $dets, 'total' => $total]);
    }

    // public function confirm_payment($id, Request $req)
    // {
    //     // dd($req->total);
    //     $transaction = Transaction::find($id);
    //     $transaction->transaction_status_id = $req->total;
    //     $transaction->save();
    //     return redirect()->back()->with('success', 'Transaction has been confirmed');
    // }

    public function update_trans($id, Request $req)
    {
        // dd($req);
        $transaction = Transaction::find($id);
        $transaction->transaction_status_id = $req->stat;
        if ($req->stat == 6) {
            foreach ($transaction->transactionDetails as $det) {
                $det->item->item_status = true;
                $det->item->save();
            }
        }
        $transaction->save();

        return back();
    }

    public function cancel_trans($id)
    {
        // dd($id);
        $transaction = Transaction::find($id);
        $transaction->transaction_status_id = 6;
        foreach ($transaction->transactionDetails as $det) {
            $det->item->item_status = true;
            $det->item->save();
        }
        $transaction->save();

        return redirect('/transaction/' . $id);
    }

    public function order_list()
    {
        if (Gate::inspect('isAdmin', Auth::user())->allowed()) {
            $trans = Transaction::all();
        } else {
            $trans = Auth::user()->transactions;
            // dd($trans);
        }

        return view('transaction-list', ['transaction' => $trans]);
    }

    public function order_detail($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        // dd($transaction);
        $dets = $transaction->transactionDetails;
        $total = 0;
        foreach ($dets as $det) {
            $total += $det->item->item_price;
        }

        if (Gate::inspect('isAdmin', Auth::user())->allowed()) {
            return view('admin-transactionDetail', ['transaction' => $transaction, 'dets' => $dets, 'total' => $total]);
        } else {
            return view('transaction-detail', ['transaction' => $transaction, 'dets' => $dets, 'total' => $total]);
        }
    }

}
