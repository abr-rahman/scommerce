<?php

namespace App\Models;

use App\Models\BaseModel;

class GeneralSettings extends BaseModel
{
    protected $fillable = [
        'business_name',
        'email',
        'support_email',
        'address_one',
        'address_two',
        'phone_one',
        'phone_two',
        'fb_link',
        'tw_link',
        'youtube_link',
        'linkedin_link',
        'insta_link',
        'status',
    ];
}
