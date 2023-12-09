<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsUpdateRequest;
use App\Models\GeneralSettings;
use App\Services\Interfaces\SettingsServiceInterface;
use App\Services\SettingsService;
use App\Utils\FileUploader;

class SettingsController extends Controller
{
    protected $uploader;

    public function __construct(FileUploader $uploader) 
    {
        $this->uploader = $uploader;
    }

    public function index()
    {
        $settings = GeneralSettings::where('status', StatusEnum::Active->value)->first();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(SettingsUpdateRequest $request, $id)
    {
        $settings = GeneralSettings::find($id);
        if ($request->hasFile('logo')) {
            $oldFile = \public_path('uploads/logo/' . $settings->logo);
            if (isset($settings->logo)) {
                if (file_exists($oldFile)) {
                    if($settings->logo != 'default-logo.png') {
                        unlink($oldFile);
                    }
                }
            }
            $logo = $this->uploader->upload($request->file('logo'), 'uploads/logo/');
            $settings['logo'] = $logo;
            $settings->logo = $logo;
            $settings->save();
        }

        $settings->business_name = $request->business_name;
        $settings->email = $request->email;
        $settings->support_email = $request->support_email;
        $settings->address_one = $request->address_one;
        $settings->address_two = $request->address_two;
        $settings->phone_one = $request->phone_one;
        $settings->phone_two = $request->phone_two;
        $settings->fb_link = $request->fb_link;
        $settings->tw_link = $request->tw_link;
        $settings->youtube_link = $request->youtube_link;
        $settings->linkedin_link = $request->linkedin_link;
        $settings->insta_link = $request->insta_link;
        $settings->tiktok_link = $request->tiktok_link;
        $settings->location_link = $request->location_link;
        $settings->save();

        return back()->with('success', 'Seetings updated successfully!');
    }
}
