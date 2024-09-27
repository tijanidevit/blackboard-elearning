<?php

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsStudentMiddleware;
use App\Http\Middleware\IsTutorMiddleware;
use App\Http\Middleware\IsTutorProfileCreatedMiddleware;
use App\Http\Middleware\IsUserActiveMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => IsAdminMiddleware::class,
            'isTutor' => IsTutorMiddleware::class,
            'isStudent' => IsStudentMiddleware::class,
            'isTutorProfileCreated' => IsTutorProfileCreatedMiddleware::class,
            'isUserActive' => IsUserActiveMiddleware::class,
        ])
        ->redirectGuestsTo(function (Request $request) {
            route('login');
        })
        ->redirectUsersTo(function (Request $request) {
            $user = auth()->user();
            if ($user->isTutor()) {
                return 'tutor/dashboard';
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
