<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartDetail extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
