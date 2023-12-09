<?php

namespace App\Models;

use App\Models\BaseModel;

class BulkVariant extends BaseModel
{
    protected $fillable = [
        'bulk_variant_name',
    ];

    public function bulk_variant_child()
    {
        return $this->hasMany(BulkVariantChild::class, 'bulk_variant_id');
    }
}
