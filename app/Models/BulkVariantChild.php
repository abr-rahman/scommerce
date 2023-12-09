<?php

namespace App\Models;

use App\Models\BaseModel;

class BulkVariantChild extends BaseModel
{
    protected $fillable = [
        'bulk_variant_id',
        'child_name',
        'status',
    ];

    public function bulk_variant()
    {
        return $this->belongsTo(BulkVariant::class, 'bulk_variant_id');
    }
}
