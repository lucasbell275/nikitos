<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminClienteController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('buscar', ''));

        return view('admin.clientes.index', [
            'clientes' => Cliente::query()
                ->when($search !== '', fn ($query) => $query->where(function ($query) use ($search): void {
                    $query->where('nombre', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%")
                        ->orWhere('razon_social', 'like', "%{$search}%")
                        ->orWhere('codigo_cliente', 'like', "%{$search}%");
                }))
                ->withCount('pedidos')
                ->latest()
                ->paginate(15)
                ->withQueryString(),
            'total' => Cliente::count(),
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('admin.clientes.form', ['cliente' => new Cliente]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $validated['password'] = Hash::make($validated['password']);
        $validated['activo'] = $request->boolean('activo');

        Cliente::create($validated);

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente registrado correctamente.');
    }

    public function edit(Cliente $cliente): View
    {
        return view('admin.clientes.form', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $validated = $request->validate($this->rules($cliente));
        if (filled($validated['password'] ?? null)) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $validated['activo'] = $request->boolean('activo');
        $cliente->update($validated);

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    private function rules(?Cliente $cliente = null): array
    {
        return [
            'username' => ['required', 'string', 'max:80', Rule::unique('clientes')->ignore($cliente?->id)],
            'nombre' => ['required', 'string', 'max:255'],
            'razon_social' => ['required', 'string', 'max:255'],
            'codigo_cliente' => ['required', 'string', 'max:80', Rule::unique('clientes')->ignore($cliente?->id)],
            'localidad' => ['required', 'string', 'max:255'],
            'horario' => ['nullable', 'string', 'max:255'],
            'condiciones_pago' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'password' => [$cliente ? 'nullable' : 'required', 'string', 'min:8', 'max:255'],
            'activo' => ['nullable', 'boolean'],
        ];
    }
}
