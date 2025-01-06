<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // Jika role admin, arahkan ke halaman admin (misalnya dashboard)
                if ($user->role == 'admin') {
                    return redirect()->route('home'); // Ganti dengan route admin Anda
                }

                // Jika role customer, arahkan ke halaman pelanggan
                if ($user->role == 'customer') {
                    return redirect()->route('pelanggan.homecustomer'); // Ganti dengan route customer Anda
                }
            }
        }

        return $next($request);
    }
}
