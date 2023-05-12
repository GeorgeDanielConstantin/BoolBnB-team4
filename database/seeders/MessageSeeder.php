<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();

        for ($i = 1; $i <= count($apartments); $i++) {

            $message = new Message();

            $message->apartment_id = $i;
            $message->email =  "mario@rossi@mail.com";
            $message->name = "mario";
            $message->surname = "rossi";
            $message->text = "Vorrei ulteriori informazioni sull'appartamento";


            $message->save();
        }

    }
}
