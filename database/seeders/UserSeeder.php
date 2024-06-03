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
        // Main Admin
        DB::table('users')->insert([
            'name' => 'Albert Einstein',
            'role' => 'admin',
            'email' => 'admin@edunexus.edu',
            'password' => bcrypt('admin123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Teachers
        $teacherNames = [
            'Roberto Manca',
            'Isaac Newton',
            'Socrates',
            'Claude Lévi-Strauss',
            'Marie Curie'
        ];

        for ($i = 0; $i < count($teacherNames); $i++) {
            DB::table('users')->insert([
                'name' => $teacherNames[$i],
                'role' => 'teacher',
                'email' => strtolower(str_replace(' ', '', $teacherNames[$i])) . '@edunexus.edu',
                'password' => bcrypt('teacher123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Students
        $studentNames = [
            'Leonardo da Vinci',
            'Galileo Galilei',
            'Cleopatra',
            'Alexander the Great',
            'Joan of Arc',
            'Charles Darwin',
            'Florence Nightingale',
            'Nelson Mandela',
            'Martin Luther King Jr.',
            'Winston Churchill',
            'Mahatma Gandhi',
            'Amelia Earhart',
            'William Shakespeare',
            'Jane Austen',
            'Marco Polo',
            'Christopher Columbus',
            'Marie Antoinette',
            'Wolfgang Amadeus Mozart',
            'Vincent van Gogh',
            'Frida Kahlo'
        ];

        for ($i = 0; $i < count($studentNames); $i++) {
            DB::table('users')->insert([
                'name' => $studentNames[$i],
                'role' => 'student',
                'email' => strtolower(str_replace(' ', '', $studentNames[$i])) . '@edunexus.edu',
                'password' => bcrypt('user123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
