<?php

namespace App\Models;

use App\Models\BaseModel;

class CareerApply extends BaseModel
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'deparment',
        'photo',
        'gender',
        'age',
        'skills',
        'reason_of_join',
        'choos_reason',
        'cv',
        'status',
    ];
}
