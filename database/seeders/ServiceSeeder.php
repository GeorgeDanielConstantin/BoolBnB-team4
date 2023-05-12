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
            ),
            1 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Kitchen',
            ),
            2 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Hair Dryer',
            ),
            3 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Heating',
            ),
            4 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Iron',
            ),
            5 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'TV',
            ),
            6 => 
            array (
                'id' => 0,
                'type' => 'essentials',
                'name' => 'Air conditioning',
            ),
            7 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Pool',
            ),
            8 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Gym',
            ),
            9 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Free Parking',
            ),
            10 => 
            array (
                'id' => 0,
                'type' => 'features',
                'name' => 'Smoking allowed',
            ),
            11 => 
            array (
                'id' => 0,
                'type' => 'safety',
                'name' => 'Smoke alarm',
            ),
            12 => 
            array (
                'id' => 0,
                'type' => 'safety',
                'name' => 'Carbon monoxide alarm',
            ),
        ));
    }
}