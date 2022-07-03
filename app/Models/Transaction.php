<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function transactionStatus(){
        return $this->belongsTo(TransactionStatus::class);
    }

    // public function getTotalItem(){
    //     return $this->hasMany(TransactionDetail::class)->where
    // }
}
