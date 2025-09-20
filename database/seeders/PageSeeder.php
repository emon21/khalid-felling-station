<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $pages = [
            [
                'page_title' => 'About Us',
                'page_name' => 'about',
                'slug' => 'about-us',
                'page_description' => 'This is the about us page description.',
            ],
            [
                'page_title' => 'Services',
                'page_name' => 'services',
                'slug' => 'our-services',
                'page_description' => 'This is the services page description.',
            ],
            [
                'page_title' => 'Contact Us',
                'page_name' => 'contact',
                'slug' => 'contact-us',
                'page_description' => 'This is the contact us page description.',
            ],
        ];

        # insert into foreach
        foreach($pages AS $page){
            DB::table('pages')->insert($page);
        }
    }
}
