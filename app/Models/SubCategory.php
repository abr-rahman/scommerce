<?php

namespace App\Models;

use App\Models\BaseModel;

class SubCategory extends BaseModel
{
    protected $fillable = [
        'category_id',
        'name',
        'logo',
        'description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
