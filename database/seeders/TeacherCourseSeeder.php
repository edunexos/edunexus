<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            ['user_id' => 2, 'course_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'course_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'course_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'course_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'course_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'course_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'course_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'course_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
