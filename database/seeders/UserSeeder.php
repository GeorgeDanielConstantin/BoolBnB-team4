<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->surname = 'admin';
        $user->email = 'admin@mail.it';
        $user->password = 'admin';
        $user->date_of_birth = '2000-01-01';
        $user->save();
    }
}
