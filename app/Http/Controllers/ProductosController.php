<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Productos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductosController extends Controller
{
    public function index(Request $request): View
    {
        $categoriaId = $request->input('categoria');
        $categoriaSeleccionada = $categoriaId ? Categorias::find($categoriaId) : null;
        $productos = Productos::with('categorias')
            ->when($categoriaId, fn ($query) => $query->where('categoria_id', $categoriaId))
            ->get();
        $categoria = Categorias::all();

        return view('vistas.productos.index', compact('productos', 'categoria', 'categoriaSeleccionada'));
    }

    public function AdminIndex(): View
    {
        $productos = Productos::with('categorias')->get();

        return view('admin.productos.index', compact('productos'));
    }

    public function create(): View
    {
        $categoria = Categorias::all();

        return view('admin.productos.create', compact('categoria'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->validationMessages(), $this->validationAttributes());
        $path = $request->file('imagen')->store('images/productos', 'public');

        if ($path === false) {
            return back()->withErrors(['imagen' => 'No se pudo guardar la imagen. Intentá nuevamente.'])->withInput();
        }

        $validated['imagen'] = $path;
        Productos::create($validated);

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Productos $producto): View
    {
        $categoria = Categorias::all();
        $productosRelacionados = Productos::where('categoria_id', $producto->categoria_id)
            ->whereKeyNot($producto->id)->take(3)->get();

        return view('vistas.productos.show', compact('producto', 'productosRelacionados', 'categoria'));
    }

    public function edit(Productos $producto): View
    {
        $categorias = Categorias::all();

        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Productos $producto): RedirectResponse
    {
        $validated = $request->validate($this->rules($producto), $this->validationMessages(), $this->validationAttributes());

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('images/productos', 'public');
            if ($producto->imagen && Storage::disk('public')->exists(str_replace('\\', '/', $producto->imagen))) {
                Storage::disk('public')->delete(str_replace('\\', '/', $producto->imagen));
            }
        }

        $producto->update($validated);

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Productos $producto): RedirectResponse
    {
        if ($producto->imagen && Storage::disk('public')->exists(str_replace('\\', '/', $producto->imagen))) {
            Storage::disk('public')->delete(str_replace('\\', '/', $producto->imagen));
        }
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'Registro eliminado correctamente.');
    }

    private function validationMessages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'min' => 'El campo :attribute debe ser mayor que cero.',
            'imagen.required' => 'La imagen del producto es obligatoria.',
            'imagen.image' => 'Seleccioná una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser JPG, PNG o WebP.',
            'imagen.max' => 'La imagen no puede superar los 2 MB.',
            'codigo.unique' => 'El código comercial ya está en uso.',
            'categoria_id.exists' => 'Seleccioná una categoría válida.',
        ];
    }

    private function validationAttributes(): array
    {
        return [
            'nombre' => 'nombre',
            'imagen' => 'imagen',
            'cajas' => 'cajas',
            'unidades' => 'unidades',
            'peso' => 'peso',
            'vida_util' => 'vida útil',
            'categoria_id' => 'categoría',
            'codigo' => 'código comercial',
        ];
    }

    private function rules(?Productos $producto = null): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'imagen' => [$producto ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'cajas' => ['required', 'integer', 'min:1'],
            'unidades' => ['required', 'integer', 'min:1'],
            'peso' => ['required', 'integer', 'min:1'],
            'vida_util' => ['required', 'integer', 'min:1'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'codigo' => ['nullable', 'string', 'max:80', Rule::unique('productos')->ignore($producto?->id)],
        ];
    }
}
