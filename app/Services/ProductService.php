<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;

use function is_integer;

Class ProductService implements ProductServiceInterface
{
    public function all()
    {
        $item = Product::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Product::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Product::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Product::find($id);
        $updatedTask = $item->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = Product::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Product::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Product::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
