<?php

namespace App\Services;

use App\Models\Customer;
use App\Enums\StatusEnum;
use App\Utils\FileUploader;
use Illuminate\Http\UploadedFile;

Class CustomerService
{
    protected $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function store(array $attributes)
    {
        if (isset($attributes['image']) && $attributes['image'] instanceof UploadedFile) {
            $image = $this->uploader->upload($attributes['image'], 'uploads/customer/');
            $attributes['image'] = $image;
        }

        $customer = ModelName::create($attributes);
        return $customer;
    }

    public function update(array $attributes, int $id)
    {
        $customer = ModelName::find($id);

        if (isset($attributes['image']) && $attributes['image'] instanceof UploadedFile) {
            $oldFile = \public_path('uploads/customer/' . $customer->image);
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
            $image = $this->uploader->upload($attributes['image'], 'uploads/customer/');
            $attributes['image'] = $image;
        }

        $customer->update($attributes);
        return $customer;
    }
}
