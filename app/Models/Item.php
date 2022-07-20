<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartDetails()
    {
        return $this->hasMany(cartDetail::class);
    }

    public function itemImages()
    {
        return $this->hasMany(itemImage::class);
    }

    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class, 'item_id');
    }
}
