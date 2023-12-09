<?php

namespace App\Models;

use App\Models\BaseModel;

class Brand extends BaseModel
{
    protected $fillable = ['name', 'status'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
