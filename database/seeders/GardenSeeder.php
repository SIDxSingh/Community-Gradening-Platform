<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GardenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Garden::create([
                'title' => $faker->company() . ' Garden',
                'description' => $faker->paragraph(),
                'size' => $faker->numberBetween(10, 1000) . ' sq meters',
                'location' => $faker->city(),
            ]);
        }
    }
}
