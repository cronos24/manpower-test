<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        User::create([
            'name' => Str::random(20),
            'email' => Str::random(20).'@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
