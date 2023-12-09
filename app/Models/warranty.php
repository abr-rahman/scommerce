<?php

namespace App\Models;

use App\Models\BaseModel;

class Warranty extends BaseModel
{
    protected $table = 'claims';

    protected $fillable = [
        'name',
        'phone',
        'message',
        'attachments',
        'others',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
