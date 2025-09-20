<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // website Setting

        WebsiteSetting::create([
            'site_name'         => 'East West Felling Station',
            'site_logo'         => 'https://placehold.co/600x400/EEE/31343C?font=lora&text=Lora',
            'site_favicon'      => 'favicon.ico',
            'site_phone'        => '+880 1777 787 027',
            'site_email'        => 'info@eastwestfillingstation.com',
            'site_address'      => "Dhour Barebad Turag,Dhaka, Dhaka, Bangladesh",
            'meta_title'        => 'My Company - Quality Products & Services',
            'meta_description'  => 'My Company Ltd. provides top-notch products and services in Bangladesh.',
            'meta_keywords'     => 'company, services, products, Bangladesh',
            'facebook_url'      => 'https://facebook.com/mycompany',
            'twitter_url'       => 'https://twitter.com/mycompany',
            'instagram_url'     => 'https://instagram.com/mycompany',
            'linkedin_url'      => 'https://linkedin.com/company/mycompany',
            'copy_right'        => '© 2025 Copyright East West Felling Station All Rights Reserved.',
        ]);
    }
}
