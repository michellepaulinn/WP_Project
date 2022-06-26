<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }
}
