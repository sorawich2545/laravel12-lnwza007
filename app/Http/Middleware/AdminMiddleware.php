<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Debug: Log the request
        \Log::info('AdminMiddleware: Checking access for ' . $request->url());
        
        if (!Auth::check()) {
            \Log::info('AdminMiddleware: User not authenticated');
            return redirect()->route('login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        $user = Auth::user();
        \Log::info('AdminMiddleware: User role is ' . $user->role);
        
        if (!$user || $user->role !== 'admin') {
            \Log::info('AdminMiddleware: User is not admin');
            return redirect()->route('home')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
        }

        \Log::info('AdminMiddleware: Access granted');
        return $next($request);
    }
}
