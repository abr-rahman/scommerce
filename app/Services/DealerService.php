<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Services\Interfaces\DealerServiceInterface;
use App\Models\Dealership;
use App\Models\User;
use App\Utils\FileUploader;
use Illuminate\Http\UploadedFile;

Class DealerService implements DealerServiceInterface
{
    protected $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function all()
    {
        $item = Dealership::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        if (isset($attributes['photo']) && $attributes['photo'] instanceof UploadedFile) {
            $photo = $this->uploader->upload($attributes['photo'], 'uploads/dealership/');
            $attributes['photo'] = $photo;
        }
        $item =  Dealership::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Dealership::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $customer = Dealership::find($id);

        if (isset($attributes['photo']) && $attributes['photo'] instanceof UploadedFile) {
            $oldFile = \public_path('uploads/dealership/' . $customer->photo);
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
            $photo = $this->uploader->upload($attributes['photo'], 'uploads/dealership/');
            $attributes['photo'] = $photo;
        }
        $updatedItem = $customer->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = Dealership::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Dealership::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Dealership::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }

    public function dillerApprove(int $id)
    {
        $item = Dealership::find($id);
        $user = User::where('role', 'user')->where('id', $item->user_id)->first();
        $user->role = 'dealer';
        $user->save();
        if ($item->status == StatusEnum::Active->value || $item->status == StatusEnum::Pending->value || $item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Approved->value;
        }
        $item->save();
        return $item;
    }
}
