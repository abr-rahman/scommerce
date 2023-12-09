<?php

namespace App\Models;

use App\Models\BaseModel;

class OfflineOrderList extends BaseModel
{
    protected $fillable = [
        'offline_order_id',
        'product_id',
        'color_id',
        'size_id',
        'product_price',
        'quantity',
        'status',
    ];

    public function offlineOrder()
    {
        return $this->hasMany(OfflineOrder::class, 'id', 'offline_order_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
