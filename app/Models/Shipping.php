<?php

namespace App\Models;

use App\Models\BaseModel;

class Shipping extends BaseModel
{
    protected $fillable = [
        'division_id',
        'district_id',
        'upazila_id',
        'charge',
        'status',
    ];

    public function division() 
    {
        return $this->belongsTo(Division::class);
    }
    public function district() 
    {
        return $this->belongsTo(District::class);
    }
    public function upazila() 
    {
        return $this->belongsTo(Upazila::class);
    }
}
