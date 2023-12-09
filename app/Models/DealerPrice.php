<?php

namespace App\Models;

use App\Models\BaseModel;

class DealerPrice extends BaseModel
{
    protected $fillable = [
        'product_id',
        'dealer_price',
        'dealer_dis_fixed',
        'dealer_dis_percentage',
    ];
}
