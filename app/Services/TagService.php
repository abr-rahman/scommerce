<?php 

namespace App\Services; 

use App\Models\Tag;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\TagServiceInterface;

Class TagService implements TagServiceInterface{
    public function all()
        {
            $item = Tag::orderBy('id', 'desc')->get();
            return $item;
        }

        public function store(array $attributes)
    {
        $item =  Tag::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Tag::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Tag::find($id);
        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Tag::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Tag::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Tag::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
