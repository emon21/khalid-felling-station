<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sliders = [

            [
                'slider_picture' => "https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image",
                'status' => "Enable",
            ],
             [
                'slider_picture' => "https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image",
                'status' => "Enable",
            ],
             [
                'slider_picture' => "https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image",
                'status' => "Enable",
            ],
            [
                'slider_picture' => "https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image",
                'status' => "Enable",
            ], 
            [
                'slider_picture' => "https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image",
                'status' => "Enable",
            ],

        ];

        # Delete All Data 
        Slider::truncate();

        # delete image folder path
        if (File::exists('uploads/sliders')) {
            File::deleteDirectory('uploads/sliders');
        }

        # Insert Data
        foreach ($sliders as $key => $slider) {
            Slider::insert($slider);
        }
    }
}
