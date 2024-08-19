<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
             <a href="{{route('admin.dashboard')}}">Home</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Create Lesson Form -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('courses.save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="instructor_id">Instructor ID:</label>
                        <select id="dynamicDropdown" name="instructor_id" class="form-control" required>
                            <option value="">Select an option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" id="category" name="category" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Course</button>
                </form>
            </div>
        </div>

        <!-- Course List -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Instructor ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $course->id }}</th>
                        <td>{{ $course->instructor_id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->category }}</td>
                        <td>{{ $course->description }}</td>


                        
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                            <!-- Delete Form -->
                            <form action="{{ route('courses.delete', $course->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this course?')"><i class="fa fa-trash"></i></button>
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



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('get-instructors') }}", 
            type: "GET",
            success: function(data) {
                
                // Clear existing options in the dropdown
                $('#dynamicDropdown').empty();
                $('#dynamicDropdown').append('<option value="">Select an option</option>');

                
                $.each(data, function(key, value) {
                    $('#dynamicDropdown').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    });
</script>

