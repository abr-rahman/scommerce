<?php 

namespace App\Services; 

use App\Models\News;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\NewsServiceInterface;
use App\Utils\FileUploader;
use Illuminate\Http\UploadedFile;

Class NewsService implements NewsServiceInterface
{
    protected $uploader;
    
    public function __construct(FileUploader $uploader) 
    {
        $this->uploader = $uploader;
    }
    
    public function all()
    {
        $item = News::orderBy('id', 'desc')->get();
        return $item;
    }
    
    public function store(array $attributes)
    {
        if (isset($attributes['image']) && $attributes['image'] instanceof UploadedFile) {
            $image = $this->uploader->upload($attributes['image'], 'uploads/news/');
            $attributes['image'] = $image;
        }

        $item =  News::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = News::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = News::find($id);

        if (isset($attributes['image']) && $attributes['image'] instanceof UploadedFile) {
            $oldFile = \public_path('uploads/news/' . $item->image);
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
            $image = $this->uploader->upload($attributes['image'], 'uploads/news/');
            $attributes['image'] = $image;
        }

        $updatedItem = $item->update($attributes);
        return $updatedItem;
    }

    public function delete(int $id)
    {
        $item = News::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = News::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = News::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
