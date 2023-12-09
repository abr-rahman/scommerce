<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Services\Interfaces\BrandServiceInterface;
use App\Models\Brand;

use function is_integer;

Class BrandService implements BrandServiceInterface
{
    public function all()
    {
        $item = Brand::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Brand::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Brand::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Brand::find($id);
        $updatedTask = $item->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = Brand::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Brand::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Brand::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
