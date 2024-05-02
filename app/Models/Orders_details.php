<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_details extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class)->where('status', 1);
    }

    public function deliveredOrder()
    {
        return $this->hasOne(OrderStatus::class, 'order_id', 'id')->where('name', 'delivered');
    }
}
