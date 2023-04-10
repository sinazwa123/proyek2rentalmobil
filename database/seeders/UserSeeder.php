<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        $user = [
        [
        'name'=>'Admin',
        'username'=>'ADMIN',
        'email'=>'admin@gmail.com',
        'role'=>'Admin',
        'password'=> bcrypt('password'),
        // 'remember_token'=>Str::random(10)
        ],
        [
        'name'=>'User',
        'username'=>'USER',
        'email'=>'user@gmail.com',
        'role'=>'User',
        'password'=> bcrypt('password'),
        // 'remember_token'=>Str::random(10)
        ],
        ];

        foreach ($user as $key => $value) {
        User::create($value);
        }
    }
}
