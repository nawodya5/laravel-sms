<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function enroll(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $user = Auth::user();

        if (Enrollment::where('course_id', $course->id)->where('student_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }
        Enrollment::create([
            'course_id' => $course->id,
            'student_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
    }


    public function search(Request $request)
    {
        $query = $request->get('search');
        $courses = Course::where('title', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        if($request->ajax()) {
            return view('courses.list', compact('courses'))->render();
        }

        return view('courses', compact('courses'));
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully.');
    }

    public function saveCourses(Request $request){
        // Validate the incoming request
        $validatedData = $request->validate([
            'instructor_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create and save the new course
        $course = Course::create([
            'instructor_id' => $validatedData['instructor_id'],
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'description' => $validatedData['description'],
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Course created successfully');
    }


    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.edit-course', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'instructor_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'instructor_id' => $validatedData['instructor_id'],
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }


}
