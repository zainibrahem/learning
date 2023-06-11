<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::query()->create(
            [
                "name"=>"math",
                "stage_id"=>1,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );

        Subject::query()->create(
            [
                "name"=>"English",
                "stage_id"=>1,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );


        Subject::query()->create(
            [
                "name"=>"math",
                "stage_id"=>2,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );

        Subject::query()->create(
            [
                "name"=>"English",
                "stage_id"=>2,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );

        Subject::query()->create(
            [
                "name"=>"French",
                "stage_id"=>1,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );


        Subject::query()->create(
            [
                "name"=>"C++",
                "stage_id"=>1,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );


        Subject::query()->create(
            [
                "name"=>"C++",
                "stage_id"=>3,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );
        Subject::query()->create(
            [
                "name"=>"C++",
                "stage_id"=>2,
                "image"=>"/public",
                "created_by"=>1,
            ]
        );

    }
}
