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
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Teachers
        $teacherNames = [
            'Roberto Manca',
            'Javier Salvador',
            'Adrià Serrando',
            'Carmen Quintás',
            'Judith Lopez'
        ];
        
        for ($i = 0; $i < count($teacherNames); $i++) {
            DB::table('users')->insert([
                'name' => $teacherNames[$i],
                'role' => 'teacher',
                'email' => strtolower(str_replace(' ', '', $teacherNames[$i])) . '@gmail.com',
                'password' => bcrypt('teacher123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $studentNames = [
            'Juan Pérez',
            'María García',
            'Carlos López',
            'Ana Martínez',
            'Luis Rodríguez',
            'Laura González',
            'David Sánchez',
            'Paula Romero',
            'Javier Fernández',
            'Sofía Díaz',
            'Daniel Pérez',
            'Andrea Ruiz',
            'Pedro Gómez',
            'Lucía Morales',
            'Miguel Castro',
            'Elena Navarro',
            'Antonio Jiménez',
            'Beatriz Torres',
            'Rubén Ramírez',
            'Carmen Vázquez'
        ];

        for ($i = 0; $i < count($studentNames); $i++) {
            DB::table('users')->insert([
                'name' => $studentNames[$i],
                'role' => 'student',
                'email' => strtolower(str_replace(' ', '', $studentNames[$i])) . '@gmail.com',
                'password' => bcrypt('user123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
