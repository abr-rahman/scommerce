<?php

namespace App\Models;

use App\Models\BaseModel;

class Tax extends BaseModel
{
    protected $fillable = [
        'name',
        'type',
        'status',
    ];
}
