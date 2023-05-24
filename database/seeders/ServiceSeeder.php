<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();
        
        DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Wi-Fi',
                'icon' => '<i class="fa-solid fa-wifi"></i>'
            ),
            1 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Kitchen',
                'icon' => '<i class="fa-solid fa-kitchen-set"></i>'
            ),
            2 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Hair Dryer',
                'icon' => '<i class="fa-solid fa-wind"></i>'
            ),
            3 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Heating',
                'icon' => '<i class="fa-solid fa-temperature-full"></i>'
            ),
            4 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Iron',
                'icon' => '<i class="fa-solid fa-weight-hanging"></i>'
            ),
            5 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'TV',
                'icon' => '<i class="fa-solid fa-tv"></i>'
            ),
            6 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Air conditioning',
                'icon' => '<i class="fa-solid fa-fan"></i>'
            ),
            7 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Pool',
                'icon' => '<i class="fa-solid fa-person-swimming"></i>'
            ),
            8 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Gym',
                'icon' => '<i class="fa-solid fa-dumbbell"></i>'
            ),
            9 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Free Parking',
                'icon' => '<i class="fa-solid fa-square-parking"></i>'
            ),
            10 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Smoking allowed',
                'icon' => '<i class="fa-solid fa-smoking"></i>'
                
            ),
            11 => 
            array (
                'id' => 0,
                'type' => 'safety',
                'name' => 'Smoke alarm',
                'icon' => '<i class="fa-solid fa-ban-smoking"></i>'
            ),
            12 => 
            array (
                'id' => 0,
                'type' => 'safety',
                'name' => 'Carbon monoxide alarm',
                'icon' => '<i class="fa-solid fa-mask-ventilator"></i>'
            ),
        ));
    }
}