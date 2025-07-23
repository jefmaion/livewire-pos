<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemsFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::created(function ($orderItem) {
            Product::where('id', $orderItem->product_id)->decrement('quantity', $orderItem->quantity);
        });
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
