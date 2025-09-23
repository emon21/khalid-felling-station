<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        About::create([
            'title' => "Why Choose Us?",
            'short_description' => "Convenience: All your fueling and convenience needs in one place. Quality: We provide top-quality fuel and services for your vehicle. Customer-Centric: Our focus is always on you—ensuring you have a positive experience every time you visit. Reliable: Whether it’s fuel, food, or a quick restroom stop, we’re here for you whenever you need us.",
            'about_picture' => "https://placehold.co/600x400/EEE/31343C?font=lora&text=About",
        ]);
    }
}
