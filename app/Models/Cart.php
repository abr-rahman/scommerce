<?php

namespace App\Models;

use App\Models\BaseModel;

class Cart extends BaseModel
{
    protected $fillable = [
        'user_id',
        'color_id',
        'size_id',
        'product_id',
        'quantity',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
