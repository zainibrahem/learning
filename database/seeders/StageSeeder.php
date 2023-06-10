<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Stage::query()->create(
            [
                "name"=>"Primary",
                "created_by"=>1
            ]
        );
        Stage::query()->create(

            [
                "name"=>'Secondary',
                "created_by"=>1
            ],

        );
        Stage::query()->create(

            [
                "name"=>'High school',
                "created_by"=>1
            ]
        );
    }
}
