<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

// User Dashboard Route
Route::get('/user/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('user.dashboard');

Route::get('/admin/add', [AdminController::class, 'edit'])->name('admin.add');
Route::post('/admin/courses-save', [CourseController::class, 'saveCourses'])->name('courses.save');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/get-instructors', [AdminController::class, 'getInstructors'])->name('get-instructors');


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
Route::delete('/courses/delete/{id}', [CourseController::class, 'delete'])->name('courses.delete');

Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');



Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');


Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');

Route::delete('/lessons/delete/{id}', [LessonController::class, 'delete'])->name('lessons.delete');



require __DIR__ . '/auth.php';
