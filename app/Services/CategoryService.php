<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use App\Models\SubCategory;

use function is_integer;

Class CategoryService implements CategoryServiceInterface
{
    public function all()
    {
        $item = Category::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Category::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Category::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Category::find($id);
        $updatedTask = $item->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = Category::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Category::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Category::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
