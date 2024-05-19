<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Course;
use App\Models\User;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener los cursos y los estudiantes de la base de datos
        $courses = Course::all();
        $students = User::where('role', 'student')->get();

        // Datos de ejemplo para las tareas
        $tasks = [
            'Homework 1',
            'Homework 2',
            'Midterm Exam',
            'Project',
            'Final Exam'
        ];

        // Crear registros de calificaciones
        foreach ($students as $student) {
            foreach ($courses as $course) {
                foreach ($tasks as $task) {
                    Grade::create([
                        'course_id' => $course->id,
                        'student_id' => $student->id,
                        'task' => $task,
                        'grade' => rand(1, 10) // Generar una calificación aleatoria entre 1 y 10
                    ]);
                }
            }
        }
    }
}
