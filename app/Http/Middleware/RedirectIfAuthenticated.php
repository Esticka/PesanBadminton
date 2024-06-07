<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna belum terautentikasi
        if (!Auth::check()) {
            // Jika tidak, kembalikan pengguna ke halaman sebelumnya atau ke halaman tertentu
            return redirect()->back()->with('error', 'Silakan login terlebih dahulu.');
        }

        // Lanjutkan ke halaman yang diminta
        return $next($request);
    }
}
