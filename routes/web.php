<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    include __DIR__.'/tutor.php';
});
