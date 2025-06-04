<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //add user
        $user = new User();
        $user->name = "User1";
        $user->email = "user1@gmail.com";
        $user->password = bcrypt("123");
        $user->save();
    }
}
