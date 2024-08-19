<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ADMIN
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Enrolled At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($enrollments as $enrollment)
                    <tr>
                        <th scope="row">{{ $enrollment->id }}</th>
                        <td>{{ $enrollment->course->title }}</td>
                        <td>{{ $enrollment->student->name }}</td>
                        <td>{{ $enrollment->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
