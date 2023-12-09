<?php 

namespace App\Services; 

use App\Models\Tax;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\TaxServiceInterface;

Class TaxService implements TaxServiceInterface
{
    public function all()
    {
        $item = Tax::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Tax::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Tax::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Tax::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Tax::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Tax::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Tax::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
