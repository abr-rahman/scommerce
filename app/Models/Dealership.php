<?php

namespace App\Models;

use App\Models\BaseModel;

class Dealership extends BaseModel
{
    public $table = 'dealer_ships';

    protected $fillable = [
        'user_id',
        'business_name',
        'business_address',
        'trade_license_number',
        'trade_license_photo',
        'attachment',
        'bin_number',
        'tin_number',
        'tin_photo',
        'nid_number',
        'nid_photo',
        'others',
        'p_address',
        'status',
    ];
}
