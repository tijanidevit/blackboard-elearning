<?php

use App\Http\Controllers\Tutor\CourseController;
use App\Http\Controllers\Tutor\DashboardController;
use App\Http\Controllers\Tutor\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('isTutor')->as('tutor.')->prefix('tutor')->group(function () {

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('update');

    Route::middleware('isTutorProfileCreated')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::middleware('isTutorApproved')->group(function () {
            Route::as('course.')->prefix('courses')->group(function () {
                Route::get('', [CourseController::class, 'index'])->name('index');
                Route::get('new', [CourseController::class, 'create'])->name('create');
            });
        });
    });
});
