<?php 

namespace App\Services; 

use App\Models\Attribute;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\AttributeServiceInterface;

Class AttributeService implements AttributeServiceInterface
{
    public function all()
    {
        $item = Attribute::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Attribute::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Attribute::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Attribute::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Attribute::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Attribute::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Attribute::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
