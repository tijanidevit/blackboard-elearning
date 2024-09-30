<?php

use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('isStudent')->as('student.')->prefix('student')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::as('course.')->prefix('courses')->group(function () {
        Route::get('', [CourseController::class, 'index'])->name('index');

        Route::get('enrolled', [CourseController::class, 'enrolled'])->name('enrolled');
        Route::get('completed', [CourseController::class, 'completed'])->name('completed');

        Route::get('new', [CourseController::class, 'create'])->name('create');
        Route::post('', [CourseController::class, 'store'])->name('store');
        Route::post('{courseId}/enroll', [CourseController::class, 'enroll'])->name('enroll');
        Route::post('{courseId}/complete', [CourseController::class, 'complete'])->name('complete');
        Route::get('{course}', [CourseController::class, 'show'])->name('show');

        Route::get('{course}/class/{contentId}', [CourseController::class, 'class'])->name('class');
    });

});
