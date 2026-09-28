<?php

namespace App\Http\Controllers;

use App\Models\ListaPrecio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminListaPrecioController extends Controller
{
    public function index(): View
    {
        return view('admin.listas-precios.index', [
            'listas' => ListaPrecio::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'archivo' => ['required', 'file', 'mimes:pdf', 'max:7168'],
        ]);

        $archivo = $request->file('archivo');
        $path = $archivo->store('listas-precios', 'local');

        if ($path === false) {
            return back()->withErrors(['archivo' => 'No se pudo guardar el PDF. Intentá nuevamente.'])->withInput();
        }

        ListaPrecio::create([
            'titulo' => $validated['titulo'],
            'archivo_path' => $path,
            'tamano_bytes' => $archivo->getSize(),
        ]);

        return redirect()->route('admin.listas-precios.index')->with('success', 'La lista de precios se publicó correctamente.');
    }

    public function destroy(ListaPrecio $listaPrecio): RedirectResponse
    {
        $path = $listaPrecio->archivo_path;
        $listaPrecio->delete();
        Storage::disk('local')->delete($path);

        return redirect()->route('admin.listas-precios.index')->with('success', 'La lista de precios se eliminó.');
    }
}
