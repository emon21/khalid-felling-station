<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $page_title = 'Our Services';
        $page_subtitle = 'Welcome to Our Filling Station – Your One-Stop Stop for Convenience and Quality Service At our filling station, we aim to offer much more than just fuel. Whether you’re passing through or need to stock up on essentials, we provide a range of services designed to make your visit quick, easy, and enjoyable. Our goal is to ensure that your journey is smooth and that you always leave with a smile. Here’s what we offer';

        // $service = Service::create([
        //     'title' => 'Our diesel,patrol,octal',
        //     'service_picture' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQMC15CJIPwrl7mCLqREsmSpLqPyiVFItzJqHq-fAkjLoYjS12yTELgHngNXGV936OxiQ&usqp=CAU',
        //     'page_title' => '',
        //     'page_subtitle' => ''
           
        // ]);

        # Service 

        $services = [
            [
                'title' => 'Our diesel',
                'service_picture' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQMC15CJIPwrl7mCLqREsmSpLqPyiVFItzJqHq-fAkjLoYjS12yTELgHngNXGV936OxiQ&usqp=CAU',
            ],
            [
                'title' => 'Our patrol',
                'service_picture' => 'https://cstoredecisions.com/wp-content/uploads/2020/03/unbranded-c-store-exterior.jpg',
            ],
            [
                'title' => 'Our octal',
                'service_picture' => 'https://www.lumina-intelligence.com/wp-content/uploads/2020/06/forecourt-retail-trends-growth-statistics-thegem-blog-default.png',
            ],
        ];

        // Insert multiple rows at once
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
