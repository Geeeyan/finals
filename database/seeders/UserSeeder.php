<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'       => 'Geeyan Sanico',
                'email'      => 'geeyan@finals.com',
                'password'   => bcrypt('geeyan123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Geeyan Roger',
                'email'      => 'geeyan@gmail.com',
                'password'   => bcrypt('geeyan123'),
                'role'       => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
