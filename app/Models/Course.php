<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];


    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teachers', 'course_id', 'user_id');
    }

    public static function allTeachers()
    {
        return User::where('role', 'teacher')->get();
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_enrollments', 'course_id', 'user_id');
    }

    public function resources()
    {
        return $this->hasMany(Resources::class);
    }

    public function show($id)
    {
        $course = self::with(['resources.grades.student'])->findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
