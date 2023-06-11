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
            ['key' => 'MIRO_TOKEN','value'=>'eyJtaXJvLm9yaWdpbiI6ImV1MDEifQ_yzHEC_vFSq7N5y2HjGbOOTLQMl0'],
            ['key' => 'MIRO_REFRESHTOKEN','value'=>'eyJtaXJvLm9yaWdpbiI6ImV1MDEifQ_QAwWtj8947eqPpA9NF9qXB-ecwU'],
            ['key' => 'MIRO_CLIENTID','value'=>'3458764556746169991'],
            ['key' => 'MIRO_CLIENTSECRET','value'=>'gehYIlSjGhGdJEnNQWaWYrAcYgtQ125O'],
            ['key' => 'MIRO_TEAMID','value'=>'3458764556746169967'],
        ];
        DB::table('settings')->insert($settings);
    }
}
