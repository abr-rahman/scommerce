<?php 

namespace App\Services; 

use App\Models\Coupon;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\CouponServiceInterface;

Class CouponService implements CouponServiceInterface{
    public function all()
    {
        $item = Coupon::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Coupon::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Coupon::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Coupon::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Coupon::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Coupon::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Coupon::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
