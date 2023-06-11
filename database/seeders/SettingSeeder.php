<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'MIRO_TOKEN','value'=>env('MIRO_TOKEN')],
            ['key' => 'MIRO_REFRESHTOKEN','value'=>env('MIRO_REFRESHTOKEN')],
            ['key' => 'MIRO_CLIENTID','value'=>env('MIRO_CLIENTID')],
            ['key' => 'MIRO_CLIENTSECRET','value'=>env('MIRO_CLIENTSECRET')],
            ['key' => 'MIRO_TEAMID','value'=>env('MIRO_TEAMID')],
        ];
        DB::table('settings')->insert($settings);
    }
}
