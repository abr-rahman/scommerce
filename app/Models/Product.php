<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\OrderList;
use App\Models\Inventory;
use App\Models\RegularPrice;
use App\Models\DealerPrice;

class Product extends BaseModel
{
    protected $table = 'products';
    
    protected $fillable = [
        'category_id',
        'tax_id',
        'sub_category_id',
        'brand_id',
        'added_by',
        'product_name',
        'product_code',
        'a_status',
        'numbering',
        'slug',
        'sku',
        'short_description',
        'long_description',
        'weight',
        'dimensions',
        'meterials',
        'other_info',
        'product_image',
        'thumbnail_image',
        'status',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function orderList()
    {
        return $this->belongsTo(OrderList::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function userPrice()
    {
        return $this->hasOne(RegularPrice::class, 'product_id', 'id');
    }

    public function dealerPrice()
    {
        return $this->hasOne(DealerPrice::class, 'product_id', 'id');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'product_id', 'id');
    }
    
    public function regularPrices()
    {
        return $this->hasMany(RegularPrice::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}
