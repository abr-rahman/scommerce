<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;

class StockOut extends BaseModel
{
    protected $guarded = [ ];

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
