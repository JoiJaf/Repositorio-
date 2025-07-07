<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserSpecific;

class UserSpecificSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Users
        UserSpecific::create(['id'=> 1, 'email' => 'user@example.com', 'user_name' => 'user', 'password' => bcrypt('user'), 'user_level_id' => 1]);
        UserSpecific::create(['id'=> 2, 'email' => 'maria@example.com', 'user_name' => 'María', 'password' => bcrypt('user'), 'user_level_id' => 1]);
        UserSpecific::create(['id'=> 3, 'email' => 'jose@example.com', 'user_name' => 'José', 'password' => bcrypt('user'), 'user_level_id' => 1]);
        UserSpecific::create(['id'=> 4, 'email' => 'sofia@example.com', 'user_name' => 'Sofía', 'password' => bcrypt('user'), 'user_level_id' => 1]);
        UserSpecific::create(['id'=> 5, 'email' => 'gabriel@example.com', 'user_name' => 'Gabriel', 'password' => bcrypt('user'), 'user_level_id' => 1]);
        
        //Admin
        UserSpecific::create(['id'=> 6, 'email' => 'admin@example.com', 'user_name' => 'admin', 'password' => bcrypt('admin'), 'user_level_id' => 2]);
        UserSpecific::create(['id'=> 7, 'email' => 'asuncion@example.com', 'user_name' => 'Asuncion', 'password' => bcrypt('admin'), 'user_level_id' => 2]);
        UserSpecific::create(['id'=> 8, 'email' => 'joiner@example.com', 'user_name' => 'Joiner', 'password' => bcrypt('admin'), 'user_level_id' => 2]);
        UserSpecific::create(['id'=> 9, 'email' => 'keyler@example.com', 'user_name' => 'Keyler', 'password' => bcrypt('admin'), 'user_level_id' => 2]);
        UserSpecific::create(['id'=> 10, 'email' => 'andres@example.com', 'user_name' => 'Andres', 'password' => bcrypt('admin'), 'user_level_id' => 2]);

    }
}
