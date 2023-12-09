<?php 

namespace App\Services; 

use App\Models\Shipping;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\ShippingServiceInterface;

Class ShippingService implements ShippingServiceInterface
{
    public function all()
    {
        $item = Shipping::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Shipping::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Shipping::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Shipping::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Shipping::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Shipping::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Shipping::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
