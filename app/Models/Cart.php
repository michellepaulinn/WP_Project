<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Checkout;
use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function account()
    {
        return $this->hasOne(Account::class);
    }
    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class);
    }
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
    public function item()
    {
        return $this->hasMany(Item::class);
    }
    //banyak --> tambahin s
    //kalo cmn 1 --> gausah tambahin s 
}
