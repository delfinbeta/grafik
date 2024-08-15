<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surveys')->insert([
            'title' => 'Encuesta 1',
            'start' => '2024-08-01',
            'end' => '2024-08-15'
        ]);

        DB::table('surveys')->insert([
            'title' => 'Encuesta 2',
            'start' => '2024-09-01',
            'end' => '2024-09-30'
        ]);

        DB::table('surveys')->insert([
            'title' => 'Encuesta 3',
            'start' => '2024-12-10',
            'end' => '2024-12-20'
        ]);
    }
}
