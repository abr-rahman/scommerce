<?php 

namespace App\Services;

use App\Http\Requests\SettingsUpdateRequest;
use App\Models\Customer;
use App\Models\GeneralSettings;
use App\Services\Interfaces\SettingsServiceInterface;
use App\Utils\FileUploader;
use Illuminate\Http\UploadedFile;

Class SettingsService implements SettingsServiceInterface
{
   
    public function update(array $attributes, int $id) 
    {
        $settings = GeneralSettings::find($id);
        if (isset($attributes['logo']) && $attributes['logo'] instanceof UploadedFile) {
            $oldFile = \public_path('uploads/logo/' . $settings->logo);
            if (file_exists($oldFile)) {
                if($settings->logo != 'default-logo.png') {
                    unlink($oldFile);
                }
            }
            $logo = $this->uploader->upload($attributes['logo'], 'uploads/logo/');
            $attributes['logo'] = $logo;
            // dd($attributes);
        }
        $settings->update($attributes);
        return $settings;
    }

    public function settingsUpdate(SettingsUpdateRequest $request, $id) 
    {
        $settings = GeneralSettings::find($id);
        dd($settings);
        if (isset($request['logo'])) {
            $oldFile = \public_path('uploads/product/' . $settings->logo);
            if (isset($settings->logo)) {
                if (file_exists($oldFile)) {
                    if($settings->logo != 'default-product-image.png') {
                        unlink($oldFile);
                    }
                }
            }
            $logo = $this->uploader->upload($request->file('logo'), 'uploads/product/');
            $request['logo'] = $logo;
        }

        if ($request->hasFile('logo')) {
            $logo = $this->uploader->upload($request->file('logo'), 'uploads/product/');
            $product['logo'] = $logo;
        }
        // $settings = GeneralSettings::find($id);
        // if (isset($attributes['logo']) && $attributes['logo'] instanceof UploadedFile) {
        //     $oldFile = \public_path('uploads/logo/' . $settings->logo);
        //     if (file_exists($oldFile)) {
        //         if($settings->logo != 'default-logo.png') {
        //             unlink($oldFile);
        //         }
        //     }
        //     $logo = $this->uploader->upload($attributes['logo'], 'uploads/logo/');
        //     $attributes['logo'] = $logo;
        //     // dd($attributes);
        // }
        $settings->update($attributes);
        return $settings;
    }
 
}
