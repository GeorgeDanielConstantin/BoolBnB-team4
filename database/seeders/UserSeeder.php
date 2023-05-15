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
        $user->name = 'Paolo';
        $user->surname = 'Cardinale';
        $user->email = 'alfio09@hotmail.com';
        $user->password = 'admin';
        $user->date_of_birth = '1981-01-01';
        $user->save();
        
        $user = new User;
        $user->name = 'Daniele';
        $user->surname = 'Marino';
        $user->email = 'daniele.noneporno@sesso.com';
        $user->password = 'admin';
        $user->date_of_birth = '1998-01-01';
        $user->save();
        
        $user = new User;
        $user->name = 'Simone';
        $user->surname = 'Lombardi';
        $user->email = 'samuraikkonen@ludopatia.com';
        $user->password = 'admin';
        $user->date_of_birth = '2002-01-01';
        $user->save();
        
        $user = new User;
        $user->name = 'Riccardo';
        $user->surname = 'Pietrobon';
        $user->email = 'riccardospiller@nikolai.ru';
        $user->password = 'admin';
        $user->date_of_birth = '1996-01-01';
        $user->save();
        
        $user = new User;
        $user->name = 'Daniel';
        $user->surname = 'Constantin';
        $user->email = 'danielgconstantin@gmail.com';
        $user->password = 'admin';
        $user->date_of_birth = '1997-01-01';
        $user->save();
        
        $user = new User;
        $user->name = 'admin';
        $user->surname = 'admin';
        $user->email = 'admin@mail.it';
        $user->password = 'admin';
        $user->date_of_birth = '2000-01-01';
        $user->save();
    }
}