<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\District;
use App\Models\Upazila;

class Outlets extends BaseModel
{
    protected $fillable = [
        'org_name',
        'phone',
        'email',
        'address',
        'location',
        'district_id',
        'upazila_id',
        'social_link',
        'status',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }

}
