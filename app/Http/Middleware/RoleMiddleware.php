<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        $user = Auth::user();

        // If no roles provided, allow (acts as pass-through)
        if (empty($roles)) {
            return $next($request);
        }

        // Support comma-separated roles in a single segment as well
        $normalizedRoles = [];
        foreach ($roles as $segment) {
            foreach (explode(',', $segment) as $r) {
                $trimmed = trim($r);
                if ($trimmed !== '') {
                    $normalizedRoles[] = $trimmed;
                }
            }
        }

        if ($user && in_array($user->role, $normalizedRoles, true)) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
    }
}


