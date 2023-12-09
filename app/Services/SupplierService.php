<?php 

namespace App\Services; 

use App\Models\Supplier;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\SupplierServiceInterface;

Class SupplierService implements SupplierServiceInterface{
    public function all()
    {
        $item = Supplier::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Supplier::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Supplier::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Supplier::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Supplier::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Supplier::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Supplier::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
