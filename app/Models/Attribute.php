<?php

namespace App\Models;

use App\Models\BaseModel;

class Attribute extends BaseModel
{
    protected $fillable = [
        'name',
        'status',
    ];
}
