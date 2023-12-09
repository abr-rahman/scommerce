<?php

namespace App\Models;

use App\Models\BaseModel;

class Wishlist extends BaseModel
{
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
