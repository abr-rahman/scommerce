<?php

namespace App\Models;

use App\Models\BaseModel;

class RegularPrice extends BaseModel
{
    protected $fillable = [
        'product_id',
        'regular_price',
        'discount_fixed',
        'discount_percentage',
    ];
}
