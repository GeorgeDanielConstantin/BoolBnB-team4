<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsor;
use App\Models\ApartmentSponsor;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('apartment_sponsor')->delete();
        
        DB::table('apartment_sponsor')->insert(array (
            0 => 
            array (
                'id' => 10,
                "sponsor_id" => "12",
                "apartment_id" => "1",
                "starting_date" => date("Y-m-d H:i:s"),
                "ending_date" => "2023-05-17",
            ),
            1 => 
            array (
                'id' => 11,
                "sponsor_id" => "12",
                "apartment_id" => "1",
                "starting_date" => date("Y-m-d H:i:s"),
                "ending_date" => "2023-05-17",
            ),
            2 => 
            array (
                'id' => 12,
                "sponsor_id" => "12",
                "apartment_id" => "1",
                "starting_date" => date("Y-m-d H:i:s"),
                "ending_date" => "2023-05-17",
            ),
        ));
        }
}
