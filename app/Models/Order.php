<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function items() {
        return $this->hasMany(OrderItems::class);
    }

    public function orderCode() {
        return sprintf('%03d', $this->id);
    }
}
