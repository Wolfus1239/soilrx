<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailIsVerifiedOverride
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Authorization') == null) {
            return response()->json(['error' => 'Missing token'], 401);
        }

        if (!$request->user()
            || ($request->user() instanceof MustVerifyEmail
                && !$request->user()->hasVerifiedEmail())) {
            return response()->json(['error' => 'Your email address is not verified!.'], 403);
        }

        return $next($request);
    }
}
