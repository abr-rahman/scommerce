<?php

namespace App\Models;

use App\Models\BaseModel;

class ReplySupport extends BaseModel
{
    protected $fillable = [
        'support_id',
        'subject',
        'description',
        'attachment',
        'status',
    ];
}
