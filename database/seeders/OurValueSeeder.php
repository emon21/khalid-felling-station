<?php

namespace Database\Seeders;

use App\Models\OurValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OurValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $our_values = [
            [
                'title' => 'Diesel',
                'description' => "At our filling station, we understand that diesel-powered vehicles have unique needs, and we're proud to offer high-quality diesel fuel to keep your engine running smoothly. Whether you're driving a truck, van, or other diesel-powered vehicle, our diesel fuel is designed to meet the demands of both performance and efficiency. Our premium diesel is treated to ensure better fuel economy, cleaner engine performance, and reduced emissions. It's the perfect choice for long-haul drivers, fleet owners, and anyone looking to get the most out of their diesel vehicle. For everyday diesel users, our standard diesel fuel provides the right balance of power and reliability, ensuring your engine runs at peak performance while delivering excellent fuel efficiency. .",
                // 'picture' => 'uploads/our-value/our-value.png'
                'picture' => 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Diesel'
            ],
            [
                'title' => 'Octane',
                'description' => "Our Premium Octane Fuel (typically 91-93 octane) is designed for vehicles that require higher compression in their engines. This premium fuel helps prevent knocking and ensures smoother acceleration, better fuel efficiency, and overall improved engine longevity. For most vehicles that operate on Regular Octane Fuel (usually 87 octane), we provide the best value without sacrificing quality. This fuel meets the needs of everyday drivers, providing reliable performance and excellent fuel economy.",
                'picture' => 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Octane'
            ],
            [
                'title' => 'Petrol',
                'description' => "Our premium petrol (often 91 octane or higher) is perfect for vehicles that require higher compression, providing smoother acceleration, better overall engine health, and improved fuel economy. For everyday driving, our regular petrol (typically 87 octane) provides excellent value, delivering reliable performance for all kinds of vehicles.",
                'picture' => 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Petrol'
            ]
        ];

        # Delete all data
        OurValue::truncate();

        # delete image folder path
        if (File::exists('uploads/values')) {
            File::deleteDirectory('uploads/values');
        }

        # Insert data
        foreach ($our_values as $our_value) {
            OurValue::insert($our_value);
        }
    }
}
