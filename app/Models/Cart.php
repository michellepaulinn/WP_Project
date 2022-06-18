<?php

namespace App\Models;

use App\Models\Account;
use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function cartDetails(){
        return $this->hasMany(CartDetail::class);
    }
    //banyak --> tambahin s
    //kalo cmn 1 --> gausah tambahin s 
}
