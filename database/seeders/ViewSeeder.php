<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\View;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all()->pluck('id');


        for ($i = 1; $i <= 3000; $i++) {

            $view = new View();

            $view->apartment_id = $faker->randomElement($apartments);
            $view->ipAddress = $faker->ip();
            $view->date = $faker->dateTimeBetween('-4 month', '-2 days');

            $view->save();

       }
    }
}