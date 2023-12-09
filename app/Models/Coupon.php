<?php

namespace App\Models;

use App\Models\BaseModel;

class Coupon extends BaseModel
{
    protected $fillable = [
        'name',
        'code',
        'categories',
        'valid_from',
        'valid_to',
        'fixed_amount',
        'percent_amount',
        'minimum_order',
        'use_limit',
        'status',
    ];
}
