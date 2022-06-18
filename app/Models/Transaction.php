<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function transactionDetails(){
        return $this->hasmany(TransactionDetail::class);
    }
    public function account(){
        return $this->belongsTo(Account::class);
    }
}
