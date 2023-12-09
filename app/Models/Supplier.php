<?php

namespace App\Models;

use App\Models\BaseModel;

class Supplier extends BaseModel
{
    protected $fillable = [
        'name',
        'phone',
        'nid_number',
        'email',
        'address',
        'city',
        'country',
        'zip_code',
        'group',
        'land_mark',
        'status',
    ];
} 
