<?php

namespace App\Models;

use App\Models\BaseModel;

class Size extends BaseModel
{
    protected $fillable = [
        'size',
        'status',
    ];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
