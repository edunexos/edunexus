<?php

use App\Livewire\Dashboard;
use App\Http\Controllers\GradeController;
use App\Livewire\Users\UserManagement;
use App\Livewire\Courses\Courses;
use App\Livewire\Courses\CourseDetails;
use App\Livewire\EducationalGames;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Courses
    Route::get('/courses', Courses::class)->name('courses');

    // Course Details
    Route::get('/courses/{courseId}', CourseDetails::class)->name('courses.course-details');

    // Educational Games
    Route::get('/educational-games', EducationalGames::class)->name('educational-games');

    // Calendar
    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');

    // Grades
    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
    Route::get('/grades/{student}', [GradeController::class, 'show'])->name('grades.student');
    Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');
    Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('grades.update');

    // User Management
    Route::get('/user-management', UserManagement::class)->name('user-management');

    // Support
    Route::get('/support', function () {
        return view('support');
    })->name('support');

    //Events
    Route::get('/events', [EventController::class, 'index']);
    Route::post('/events', [EventController::class, 'store']);

    // Piano
    Route::get('/piano', function () {
        return view('piano');
    })->name('piano');

    // physics
    Route::get('/physics-hangman', function () {
        return view('physics-hangman');
    })->name('physics-hangman');

    // history
    Route::get('/history', function () {
        return view('history');
    })->name('history');

    // quiz
    Route::get('/quiz', function () {
        return view('quiz');
    })->name('quiz');
});
