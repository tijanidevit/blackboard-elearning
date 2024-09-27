<?php

use App\Http\Controllers\Tutor\CourseController;
use App\Http\Controllers\Tutor\ModuleContentController;
use App\Http\Controllers\Tutor\DashboardController;
use App\Http\Controllers\Tutor\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('isTutor')->as('tutor.')->prefix('tutor')->group(function () {

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('update');

    Route::middleware('isTutorProfileCreated')->group(function () {

        Route::middleware('isUserActive')->group(function () {

            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::as('course.')->prefix('courses')->group(function () {
                Route::get('', [CourseController::class, 'index'])->name('index');
                Route::get('new', [CourseController::class, 'create'])->name('create');
                Route::post('', [CourseController::class, 'store'])->name('store');
                Route::get('{course}', [CourseController::class, 'show'])->name('show');
            });

            Route::as('course.module.')->prefix('courses/{courseId}')->group(function () {
                Route::post('', [CourseController::class, 'addModule'])->name('store');
            });

            Route::as('module.content.')->prefix('modules/{moduleId}')->group(function () {
                Route::get('contents/new', [ModuleContentController::class, 'create'])->name('create');
                Route::get('contents/{contentId}', [ModuleContentController::class, 'show'])->name('show');
                Route::post('', [ModuleContentController::class, 'store'])->name('store');
            });

        });
    });
});
