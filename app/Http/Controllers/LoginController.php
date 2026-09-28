<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Contacto;
use App\Models\Distribuidor;
use App\Models\Productos;
use App\Models\Recetas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function AdminLogin(): View|RedirectResponse
    {
        if (Auth::guard('web')->check() && Auth::guard('web')->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function dashboard(): View
    {
        $adminName = auth()->user()->name ?? 'Administrador';
        $stats = [
            'categorias' => Categorias::count(),
            'productos' => Productos::count(),
            'recetas' => Recetas::count(),
            'distribuidores' => Distribuidor::count(),
            'contactos' => Contacto::count(),
        ];

        return view('admin.dashboard', compact('adminName', 'stats'));
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('web')->attempt($credentials + ['is_admin' => true])) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['email' => 'Las credenciales de administrador no son correctas.'])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
