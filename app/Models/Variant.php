<?php

namespace App\Models;

use App\Models\BaseModel;

class Variant extends BaseModel
{
    protected $fillable = [
        'variant_name',
        'variant_value',
        'status',
    ];
}
