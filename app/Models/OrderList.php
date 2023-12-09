<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Notifications\Notifiable;

class OrderList extends BaseModel
{
    use Notifiable;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'product_price',
        'quantity',
        'status',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
