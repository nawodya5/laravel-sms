<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{

    public function index()
    {
        $enrollments = Enrollment::with(['course', 'student'])->get();
        return view('admin.enrollments', compact('enrollments'));
    }


    public function store(Course $course)
    {
        $user = Auth::user();

        $alreadyEnrolled = Enrollment::where('course_id', $course->id)
            ->where('student_id', $user->id)
            ->exists();
        if ($alreadyEnrolled) {
            return redirect()->route('courses.show', $course->id)
                ->with('error', 'You are already enrolled in this course.');
        }
        Enrollment::create([
            'course_id' => $course->id,
            'student_id' => $user->id,
        ]);

        return redirect()->route('courses.show', $course->id)
            ->with('success', 'Successfully enrolled in the course.');
    }
}
