<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // Fetch all courses for the select dropdown
        $lessons = Lesson::all();
        return view('admin.lessons', compact('courses', 'lessons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
        ]);

        Lesson::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'contents' => $request->contents,
        ]);

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function delete($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->back()->with('success', 'Lesson deleted successfully');
    }
}
