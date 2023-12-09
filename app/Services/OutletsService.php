<?php 

namespace App\Services; 

use App\Models\Outlets;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\OutletsServiceInterface;

Class OutletsService implements OutletsServiceInterface
{
    public function all()
    {
        $item = Outlets::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Outlets::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Outlets::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Outlets::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Outlets::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Outlets::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Outlets::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
