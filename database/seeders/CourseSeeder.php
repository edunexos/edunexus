<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['title' => 'Physics', 'description' => 'Study of matter, energy, and the fundamental forces of nature'],
            ['title' => 'Chemistry', 'description' => 'Study of substances and their interactions'],
            ['title' => 'Mathematics', 'description' => 'Abstract study of numbers, quantities, and shapes'],
            ['title' => 'Literature', 'description' => 'Study of written works, including prose, poetry, and drama'],
            ['title' => 'Biology', 'description' => 'Study of living organisms and their processes'],
        ];


        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
