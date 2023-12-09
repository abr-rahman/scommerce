<?php

namespace App\Models;

use App\Models\BaseModel;

class News extends BaseModel
{
    protected $fillable = [
        'heading',
        'image',
        'description',
        'status',
    ];
}
