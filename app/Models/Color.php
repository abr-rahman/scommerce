<?php

namespace App\Models;

use App\Models\BaseModel;

class Color extends BaseModel
{
    protected $fillable = [
        'color_name',
        'color_code',
        'status',
    ];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
