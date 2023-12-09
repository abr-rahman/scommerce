<?php

namespace App\Models;

use App\Models\BaseModel;

class Category extends BaseModel
{
    protected $fillable =
    [
        'name',
        'logo',
        'title',
        'status',
    ];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
