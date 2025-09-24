<?php

namespace Database\Seeders;

use App\Models\ContactUS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $contact = [
        //     'name' => fake()->name(),
        //     'email' => fake()->safeEmail(),
        //     'subject' => fake()->sentence(),
        //     'message' => fake()->paragraph(),
        // ];

        # Delete all Data
        ContactUS::truncate();

        # Create Data

        foreach(range(1, 10) as $index) {

            ContactUS::create([
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'subject' => fake()->sentence(),
                'message' => fake()->paragraph(),
            ]);

          
            
        }
        // ContactUS::create($contact);

        // for ($i = 1; $i <= 10; $i++) {
        //     ContactUS::create([
        //         'name'    => fake()->name(),
        //         'email'   => fake()->safeEmail(),
        //         'subject' => fake()->sentence(),
        //         'message' => fake()->paragraph(),
        //     ]);
        // }


    }
}
