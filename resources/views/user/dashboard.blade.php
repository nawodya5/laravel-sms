<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg bg-body-tertiary"">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <div class="col-12">
                            <p class="fs-3 text-black py-3 fw-bolder">Courses</p>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="card mb-4 border-dashed" style="min-height: 250px; max-height: 250px; border-bottom:5px solid blue">
                                <div class="card-body d-flex justify-content-between flex-column">
                                    <h3 class="card-title fs-3">{{ $course->title }}</h3>
                                    <h6 class="card-subtitle fs-5">{{ $course->category }}</h6>
                                    <p class="card-text text-body-tertiary fs-6" style="max-height: 100px; overflow: hidden;">
                                        {{ $course->description }}
                                    </p>

                                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Enroll Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
