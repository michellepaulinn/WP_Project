<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function view_transaction($id){
        $transaction = Transaction::find($id);
        $dets = $transaction->transactionDetails();
        return view('transaction-detail', ['transaction'=>$transaction,'dets'=>$dets]);
    }
}
