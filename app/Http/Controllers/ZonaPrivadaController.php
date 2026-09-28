<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Pedido;
use App\Models\Productos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ZonaPrivadaController extends Controller
{
    public function productos(): View
    {
        return view('vistas.zona-privada.productos', [
            'categorias' => Categorias::with(['productos' => fn ($query) => $query->orderBy('nombre')])->orderBy('nombre_categoria')->get(),
            'cliente' => auth('cliente')->user(),
        ]);
    }

    public function storePedido(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fecha' => ['required', 'date'],
            'razon_social' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'horario' => ['required', 'string', 'max:255'],
            'condiciones_pago' => ['required', 'string', 'max:255'],
            'observaciones' => ['nullable', 'string', 'max:5000'],
            'archivo' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,xls,xlsx,doc,docx', 'max:5120'],
            'items' => ['required', 'array'],
            'items.*' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $selected = collect($validated['items'])->filter(fn ($quantity) => (int) $quantity > 0);
        if ($selected->isEmpty()) {
            throw ValidationException::withMessages(['items' => 'Seleccioná al menos un producto.']);
        }

        $productos = Productos::whereIn('id', $selected->keys())->get()->keyBy('id');
        if ($productos->count() !== $selected->count()) {
            throw ValidationException::withMessages(['items' => 'Uno de los productos seleccionados ya no está disponible.']);
        }

        $cliente = auth('cliente')->user();
        $pedido = DB::transaction(function () use ($request, $validated, $selected, $productos, $cliente): Pedido {
            $pedido = Pedido::create([
                'cliente_id' => $cliente->id,
                'fecha' => $validated['fecha'],
                'razon_social' => $validated['razon_social'],
                'codigo_cliente' => $cliente->codigo_cliente,
                'localidad' => $validated['localidad'],
                'horario' => $validated['horario'],
                'condiciones_pago' => $validated['condiciones_pago'],
                'observaciones' => $validated['observaciones'] ?? null,
                'archivo_path' => $request->hasFile('archivo') ? $request->file('archivo')->store('pedidos') : null,
            ]);

            foreach ($selected as $productId => $quantity) {
                $producto = $productos->get($productId);
                $pedido->items()->create([
                    'producto_id' => $producto->id,
                    'codigo' => $producto->codigo ?: (string) $producto->id,
                    'nombre' => $producto->nombre,
                    'presentacion' => $producto->cajas.'p x '.$producto->unidades.'u x '.$producto->peso.'g',
                    'cantidad' => $quantity,
                ]);
            }

            return $pedido;
        });

        return redirect()->route('zona.pedidos.show', $pedido)->with('success', 'Tu pedido se registró correctamente.');
    }

    public function historial(): View
    {
        return view('vistas.zona-privada.historial', [
            'pedidos' => auth('cliente')->user()->pedidos()->latest()->paginate(12),
        ]);
    }

    public function showPedido(Pedido $pedido): View
    {
        abort_unless($pedido->cliente_id === auth('cliente')->id(), 404);

        return view('vistas.zona-privada.pedido', ['pedido' => $pedido->load('items')]);
    }

    public function repetirPedido(Pedido $pedido): RedirectResponse
    {
        abort_unless($pedido->cliente_id === auth('cliente')->id(), 404);

        $cliente = auth('cliente')->user();
        $pedido->load('items');

        $nuevoPedido = DB::transaction(function () use ($pedido, $cliente): Pedido {
            $nuevoPedido = Pedido::create([
                'cliente_id' => $cliente->id,
                'fecha' => today()->toDateString(),
                'razon_social' => $pedido->razon_social,
                'codigo_cliente' => $cliente->codigo_cliente,
                'localidad' => $pedido->localidad,
                'horario' => $pedido->horario,
                'condiciones_pago' => $pedido->condiciones_pago,
                'observaciones' => $pedido->observaciones,
            ]);

            foreach ($pedido->items as $item) {
                $nuevoPedido->items()->create([
                    'producto_id' => $item->producto_id,
                    'codigo' => $item->codigo,
                    'nombre' => $item->nombre,
                    'presentacion' => $item->presentacion,
                    'cantidad' => $item->cantidad,
                ]);
            }

            return $nuevoPedido;
        });

        return redirect()->route('zona.pedidos.show', $nuevoPedido)
            ->with('success', 'El pedido se repitió correctamente.');
    }
}
