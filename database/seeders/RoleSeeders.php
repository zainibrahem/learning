<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','teacher'];

        foreach($roles as $role){
            $role = Role::create(['name' => $role]);
        }

        $user = User::where('email','admin@admin.com')->first();
        $user->assignRole(['admin']);
    }
}
