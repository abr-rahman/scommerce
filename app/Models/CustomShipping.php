<?php

namespace App\Models;

use App\Models\BaseModel;

class CustomShipping extends BaseModel
{
    protected $fillable = [
        'area_name',
        'charge',
        'status',
    ];
}
