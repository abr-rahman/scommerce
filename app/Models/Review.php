<?php

namespace App\Models;

use App\Models\BaseModel;

class Review extends BaseModel
{
    protected $fillable = [
        'name',
        'product_id',
        'email',
        'rating',
        'comment',
        'status',
    ];

    // public function product() {
    //     return $this->hasOne(Product::class, 'id', 'product_id');
    // }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
