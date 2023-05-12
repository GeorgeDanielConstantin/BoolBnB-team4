<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sponsors')->delete();
        
        DB::table('sponsors')->insert(array (
            0 => 
            array (
                'id' => 10,
                'name' => 'Low Boost',
                'price' => '2.99',
                'duration' => 24,
            ),
            1 => 
            array (
                'id' => 11,
                'name' => 'Medium Boost',
                'price' => '5.99',
                'duration' => 72,
            ),
            2 => 
            array (
                'id' => 12,
                'name' => 'Super Boost',
                'price' => '9.99',
                'duration' => 144,
            ),
        ));

        // $sponsor_low_boost = new Sponsor;
        // $sponsor_low_boost->name = "Low Boost";
        // $sponsor_low_boost->price = '2.99';
        // $sponsor_low_boost->duration = '24';
        // $sponsor_low_boost->save();

        // $sponsor_medium_boost = new Sponsor;
        // $sponsor_medium_boost->name = "Medium Boost";
        // $sponsor_medium_boost->price = '5.99';
        // $sponsor_medium_boost->duration = '72';
        // $sponsor_medium_boost->save();

        // $sponsor_super_boost = new Sponsor;
        // $sponsor_super_boost->name = "Super Boost";
        // $sponsor_super_boost->price = '9.99';
        // $sponsor_super_boost->duration = '144';
        // $sponsor_super_boost->save();
    }
}
