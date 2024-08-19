<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ADMIN
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('lessons.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            <option value="">Select a Course</option>
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="contents" class="form-label">Content</label>
                        <textarea name="contents" id="contents" class="form-control"
                                  required>{{ old('contents') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Lesson</button>
                </form>
            </div>
        </div>

        <!-- Lessons List -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Lesson Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                    <tr>
                        <th scope="row">{{ $lesson->id }}</th>
                        <td>{{ $lesson->course->title }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('lessons.delete', $lesson->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this lesson?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
