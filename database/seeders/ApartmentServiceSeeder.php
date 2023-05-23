<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;

// use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();
        $services = Service::all()->pluck('id')->toArray();

        foreach ($apartments as $apartment) {
            $randomNumber = rand(1, 12);
            $randomServices = collect($services)->random($randomNumber);

            $apartment->service()->attach($randomServices);
        }
    }
}
