<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $speciesList = ['Fern', 'Succulent', 'Orchid', 'Cactus', 'Bamboo', 'Bonsai'];
        $sunlight = ['Low', 'Medium', 'High'];
        $water = ['Daily', 'Weekly', 'Bi-weekly'];

        for ($i = 0; $i < 20; $i++) {
            \App\Models\Plant::create([
                'name' => $faker->colorName() . ' ' . $faker->randomElement($speciesList),
                'species' => $faker->randomElement($speciesList),
                'sunlight_requirement' => $faker->randomElement($sunlight),
                'water_frequency' => $faker->randomElement($water),
            ]);
        }
    }
}
