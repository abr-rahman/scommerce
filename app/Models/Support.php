<?php

namespace App\Models;

use App\Models\BaseModel;

class Support extends BaseModel
{
    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'attachment',
        'status',
    ];
}
