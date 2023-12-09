<?php 

namespace App\Services; 

use App\Models\OfflineCustomer;
use App\Enums\StatusEnum;
use App\Services\Interfaces\OfflineServiceInterface;

Class OfflineService implements OfflineServiceInterface
{
    public function all()
    {
        $item = OfflineCustomer::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  OfflineCustomer::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = OfflineCustomer::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = OfflineCustomer::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = OfflineCustomer::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = OfflineCustomer::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = OfflineCustomer::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
