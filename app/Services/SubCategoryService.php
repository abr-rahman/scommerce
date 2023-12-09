<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Services\Interfaces\SubCategoryServiceInterface;
use App\Models\SubCategory;

Class SubCategoryService implements SubCategoryServiceInterface
{
    public function all()
    {
        $item = SubCategory::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  SubCategory::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = SubCategory::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = SubCategory::find($id);
        $updatedTask = $item->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = SubCategory::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = SubCategory::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = SubCategory::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
