<?php 

namespace App\Services; 

use App\Enums\StatusEnum;
use App\Models\CustomShipping;
use App\Services\Interfaces\CustomShippingServiceInterface;

Class CustomShippingService implements CustomShippingServiceInterface
{
    public function all()
    {
        $item = CustomShipping::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  CustomShipping::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = CustomShipping::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = CustomShipping::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = CustomShipping::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = CustomShipping::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = CustomShipping::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
