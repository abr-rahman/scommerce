<?php

namespace App\Models;

use App\Models\BaseModel;

class OfflineCustomer extends BaseModel
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_name',
        'business_address',
        'trade_license_number',
        'bin_number',
        'tin_number',
        'nid_number',
        'p_address',
        'status',
    ];
}
