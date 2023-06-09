<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin1',
            'email' => 'admin1@admin.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin2',
            'email' => 'admin2@admin.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
