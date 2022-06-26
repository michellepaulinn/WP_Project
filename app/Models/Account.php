<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Role;
use App\Models\Checkout;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
