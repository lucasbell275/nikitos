<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminPedidoController extends Controller
{
    public function index(): View
    {
        return view('admin.pedidos.index', [
            'pedidos' => Pedido::with('cliente')->withCount('items')->latest()->paginate(20),
        ]);
    }

    public function show(Pedido $pedido): View
    {
        return view('admin.pedidos.show', ['pedido' => $pedido->load(['cliente', 'items'])]);
    }

    public function update(Request $request, Pedido $pedido): RedirectResponse
    {
        $validated = $request->validate(['estado' => ['required', Rule::in(['recibido', 'en preparación', 'completado', 'cancelado'])]]);
        $pedido->update($validated);

        return back()->with('success', 'Estado actualizado.');
    }

    public function archivo(Pedido $pedido): StreamedResponse
    {
        abort_unless($pedido->archivo_path && Storage::exists($pedido->archivo_path), 404);

        return Storage::download($pedido->archivo_path);
    }
}
