<?php

namespace App\Http\Middleware;

use App\Enums\UserStatusEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUserActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = auth()->user()->status;
        if ($status !== UserStatusEnum::ACTIVE->value) {
            return to_route('tutor.profile')->with('warning', "Your account is currently $status.");
        }
        return $next($request);
    }
}
