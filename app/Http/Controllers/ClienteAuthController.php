<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ClienteAuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::guard('cliente')->check()) {
            return redirect()->route('zona.productos');
        }

        return view('vistas.zona-privada.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('cliente')->attempt($credentials + ['activo' => true])) {
            $request->session()->regenerate();

            return redirect()->intended(route('zona.productos'));
        }

        return back()->withErrors(['username' => 'Usuario o contraseña incorrectos, o cuenta desactivada.'])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('cliente')->logout();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
