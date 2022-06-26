<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function view_transaction($id){
        $transaction = Transaction::find($id);
        return view('transaction-detail', ['transaction'=>$transaction]);
    }
}
