<?php

namespace App\Models;

use App\Models\BaseModel;

class Tag extends BaseModel
{
    protected $fillable = [
        'name',
        'status',
    ];
}
