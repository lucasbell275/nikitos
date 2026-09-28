<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{
    public function index()
    {
        $categoria = Categorias::all();
        return view('vistas.categorias.index', compact('categoria'));
    }

    public function AdminIndex()
    {
        $categorias = Categorias::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function edit(Categorias $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function store(Request $request, Categorias $categoria)
    {
        $request->validate([
            'nombre_categoria' => 'required',
            'color' => 'required',
            'imagen' => 'nullable|image',
        ]);

        $pathImagen = $request->file('imagen')->store('images/categorias', 'public');
        Categorias::create([
            'nombre_categoria' => $request->nombre_categoria,
            'color' => $request->color,
            'imagen' => $pathImagen,
        ]);
        return redirect()->route('categorias.index')->with('success', 'Categoria creada correctamente');
    }

    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'nombre_categoria' => 'nullable',
            'color' => 'nullable',
            'imagen' => 'nullable|image',
        ]);

        if ($request->hasFile('imagen')) {
            if ($categoria->imagen) {
                Storage::disk('public')->delete($categoria->imagen);
            }

            $imagen = $request->file('imagen')->store('images/categorias', 'public');
            $categoria->imagen = $imagen;
        }

        $categoria->nombre_categoria = $request->nombre_categoria;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria editada correctamente');
    }

    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        if ($categoria->imagen) {

            if (Storage::disk('public')->exists($categoria->imagen)) {
                Storage::disk('public')->delete($categoria->imagen);
            }
        }
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('success', 'Registro eliminado correctamente.');
    }
}
