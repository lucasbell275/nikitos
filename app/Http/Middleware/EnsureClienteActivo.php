<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureClienteActivo
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user('cliente')?->activo) {
            Auth::guard('cliente')->logout();
            $request->session()->regenerateToken();

            return redirect()->route('clientes.login')->withErrors(['username' => 'Tu cuenta está desactivada.']);
        }

        return $next($request);
    }
}
