<?php 

namespace App\Services; 

use App\Models\Variant;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\VariantServiceInterface;

Class VariantService implements VariantServiceInterface
{
    public function all()
    {
        $item = Variant::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Variant::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Variant::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Variant::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Variant::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Variant::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Variant::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
