<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123321'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('321123'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}