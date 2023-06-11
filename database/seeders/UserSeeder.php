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

        for ($i=1 ; $i<500; $i++){
            DB::table('users')->insert([
                'name' => 'Admin'.$i,
                'email' => 'admin'.$i.'@admin.com',
                'password' => bcrypt('123456'),
            ]);
        }
        }

}
