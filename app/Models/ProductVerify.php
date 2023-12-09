<?php

namespace App\Models;

use App\Models\BaseModel;

class ProductVerify extends BaseModel
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'product_id',
        'barcode_number',
        'shope_name',
        'invoice_attachment',
        'district',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
