<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            <a href="{{ route('admin.dashboard') }}">Home</a> &gt;
            <a href="{{ route('courses.index') }}">Courses</a> &gt;
            Edit Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="instructor_id">Instructor ID:</label>
                        <input type="number" id="instructor_id" name="instructor_id" class="form-control" value="{{ $course->instructor_id }}" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $course->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" id="category" name="category" class="form-control" value="{{ $course->category }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" required>{{ $course->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
