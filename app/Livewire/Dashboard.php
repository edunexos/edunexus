<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $allCourses;
    public $allTeachers;
    public $enrolledCourses;
    public $notEnrolledCourses;
    public $courseId;
    public $title;
    public $description;
    public $teachers = [];
    public $students = [];
    public $isModalOpen = false;
    public $isUpdating = false;

    public function mount()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $this->allCourses = Course::all();
        $this->allTeachers = User::where('role', 'teacher')->get();
        $this->students = User::where('role', 'student')->get();
        $enrolledCourseIds = $user->enrollments->pluck('course_id');
        $this->enrolledCourses = Course::whereIn('id', $enrolledCourseIds)->get();
        $this->notEnrolledCourses = Course::whereNotIn('id', $enrolledCourseIds)->get();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset(['courseId', 'title', 'description', 'teachers', 'isUpdating']);
    }

    public function create()
    {
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'teachers' => 'required'
        ]);

        $course = Course::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $course->teachers()->attach($this->teachers);

        session()->flash('message', 'Course created successfully.');

        $this->closeModal();
        $this->mount();
    }

    public function edit($courseId)
    {
        $course = Course::findOrFail($courseId);
        $this->courseId = $courseId;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->teachers = $course->teachers->pluck('id')->toArray();
        $this->isUpdating = true;
        $this->openModal();
    }

    public function update()
    {
        $course = Course::findOrFail($this->courseId);

        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'teachers' => 'required'
        ]);

        $course->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $course->teachers()->sync($this->teachers);

        session()->flash('message', 'Course updated successfully.');

        $this->closeModal();
        $this->mount();
    }

    public function destroy($courseId)
    {
        Course::destroy($courseId);

        session()->flash('message', 'Course deleted successfully.');
        $this->mount();
    }

    public function enroll($courseId)
    {
        auth()->user()->enrollments()->create([
            'course_id' => $courseId,
            'status' => 'enrolled'
        ]);

        session()->flash('message', 'Enrolled successfully.');
        $this->mount();
    }

    public function unenroll($courseId)
    {
        auth()->user()->enrollments()->where('course_id', $courseId)->delete();

        session()->flash('message', 'Unenrolled successfully.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
