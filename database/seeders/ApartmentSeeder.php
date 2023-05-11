<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++) {
            $apartment = new Apartment;
            $apartment->title = $faker->firstNameFemale();
            $apartment->number = $faker->unique()->numberBetween(1, 100);
            $apartment->type = $faker->randomElement(['lunga', 'corta', 'cortissima']);
            $apartment->cooking_time = $faker->numberBetween(8, 14);
            $apartment->weight = $faker->randomElement([500, 1000]);
            $apartment->description = $faker->paragraph(8);
            $apartment->img = "https://picsum.photos/300/200";
            $apartment->save();
        }
    }
}
