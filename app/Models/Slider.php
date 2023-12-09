<?php

namespace App\Models;

use App\Models\BaseModel;

class Slider extends BaseModel
{
    protected $fillable = [
        'image',
        'heading',
        'button_type',
        'paragraph',
        'url',
        'numbering',
        'status',
    ];
}
