<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            ADMIN
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Courses</h5>
                                    <a href="{{route('courses.index')}}" class="card-link btn btn-sm btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Enrollments</h5>
                                    <a href="{{route('enrollments.index')}}" class="card-link btn btn-sm btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Lessons</h5>
                                    <a href="{{route('lessons.index')}}" class="card-link btn btn-sm btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Progress</h5>
                                    <a href="#" class="card-link btn btn-sm btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
