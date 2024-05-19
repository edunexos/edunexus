<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationalGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('educational_games')->insert([
            'title' => 'Music Game',
            'description' => 'A game to learn music notes',
            'url' => 'http://localhost:5174/',
            'subject_area' => 'Music',
        ]);
    }
}
