<?php

namespace App\Models;

use App\Models\BaseModel;

class ContactUs extends BaseModel
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];
}
