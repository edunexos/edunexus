<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Course;
use App\Models\User;
use App\Models\Resources;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'student') {
            $grades = $user->grades()->with('course')->get();
            return view('grades.index', compact('grades'));
        } else {
            $students = User::where('role', 'student')->get();
            return view('grades.index', compact('students'));
        }
    }

    public function show(User $student)
    {
        $grades = $student->grades()->with(['course', 'resource'])->get();
        return view('grades.show', compact('student', 'grades'));
    }

    public function edit(Grade $grade)
    {
        $courses = Course::all();
        $resources = Resources::all();
        return view('grades.edit', compact('grade', 'courses', 'resources'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'task' => 'required|string|max:255',
            'grade' => 'required|string|max:2',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.student', $grade->student_id)->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.student', $grade->student_id)->with('success', 'Grade deleted successfully.');
    }

    public function create()
    {
        $courses = Course::all();
        $students = User::where('role', 'student')->get();
        $resources = Resources::all();
        return view('grades.create', compact('courses', 'students', 'resources'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:users,id',
            'resource_id' => 'required|exists:resources,id',
            'task' => 'required|string|max:255',
            'grade' => 'required|string|max:2',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.student', $request->student_id)->with('success', 'Grade created successfully.');
    }



}
