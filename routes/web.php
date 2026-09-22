<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/courses', CourseController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'teacher']);
Route::resource('/courses', CourseController::class)
    ->only(['index', 'show']);

    

Route::resource('/lessons', LessonController::class)
    ->only(['store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'teacher']);
Route::resource('/lessons', LessonController::class)
    ->only(['index', 'show']);

    
Route::resource('/users', UserController::class)->middleware(['auth','admin']);


Route::get('/enrolments/create', [EnrolmentController::class, 'create'])
    ->middleware(['auth','student'])
    ->name('enrolments.create');

Route::post('/enrolments', [EnrolmentController::class, 'store'])
    ->middleware(['auth','student'])
    ->name('enrolments.store');

Route::get('/enrolments', [EnrolmentController::class, 'index'])
    ->middleware(['auth','student'])
    ->name('enrolments.index');

Route::delete('/enrolments/{course}/{student}', [EnrolmentController::class, 'destroy'])
    ->middleware(['auth','student'])
    ->name('enrolments.delete');
    

  Route::get('/courses/{course}/lessons/create', [LessonController::class, 'create'])
      ->middleware(['auth', 'teacher'])
      ->name('lessons.create');

     

require __DIR__.'/auth.php';
