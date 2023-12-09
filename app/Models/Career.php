<?php

namespace App\Models;

use App\Models\BaseModel;

class Career extends BaseModel
{
    protected $fillable = [
        'heading',
        'image',
        'deadline',
        'qualification',
        'description',
        'status',
    ];
}
