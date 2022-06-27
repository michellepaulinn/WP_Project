<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class TransactionDetail extends Model
{
    use HasFactory;

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
    public function item(){{
        return $this->hasOne(Item::class, 'id', 'item_id');
    }}
}
