<?php

namespace Database\Seeders;

use App\Models\GeneralSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSettings::insert([
            [
                'business_name' => 'Salamat eCommerce',
                'email' => 'salamatinnovation@gmail.com',
                'support_email' => 'support@salamatinnovation.com',
                'address_one' => '2nd Floor, Ka/32/5/A (Palash Tower), Pragati Sarani (Shahjadpur), Gulshan, Dhaka-1212, Bangladesh.',
                'address_two' => '2nd Floor, Ka/32/5/A (Palash Tower), Pragati Sarani (Shahjadpur), Gulshan, Dhaka-1212, Bangladesh.',
                'phone_one' => '+880 1897-715225',
                'phone_two' => '+880 1897-715225',
                'fb_link' => 'facebook.com',
                'tw_link' => 'twitter.com',
                'youtube_link' => 'youtube.com',
                'linkedin_link' => 'linkedin.com',
                'insta_link' => 'instagram.com',
                'tiktok_link' => 'tiktok.com',
                'location_link' => 'location.com',
                'logo' => 'default-logo.png',
                'status' => '1',
            ],
        ]);
    }
}
