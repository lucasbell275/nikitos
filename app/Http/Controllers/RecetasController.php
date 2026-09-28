<?php

namespace App\Http\Controllers;

use App\Models\Ingredientes;
use App\Models\Preparacion;
use App\Models\Recetas;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecetasController extends Controller
{
    public function index(Preparacion $preparacion, Ingredientes $ingrediente, Recetas $receta)
    {
        $receta = Recetas::all();
        return view('vistas.recetas.index', compact('receta'));
    }

    public function AdminIndex(Recetas $receta)
    {
        $receta = Recetas::all();
        return view('admin.recetas.index', compact('receta'));
    }

    public function edit(Preparacion $preparacion, Ingredientes $ingrediente, Recetas $receta)
    {
        return view('admin.recetas.edit', compact('receta', 'preparacion', 'ingrediente'));
    }

    public function show(Recetas $receta)
    {
        $receta->load(['ingredientes', 'preparacion']);
        $recetaRelacionada = Recetas::take(3)->get();
        return view('vistas.recetas.show', compact('receta', 'recetaRelacionada'));
    }

    public function create()
    {
        return view('admin.recetas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_receta' => 'required',
            'imagen' => 'required|image',
            'tiempo_preparacion' => 'required|integer',
            'tiempo_coccion' => 'required|integer',
            'porciones' => 'required|integer',
            'ingredientes' => 'required|array|min:1',
            'ingredientes.*.ingrediente' => 'required|string',
            'numero_paso' => 'required|array|min:1',
            'numero_paso.*.descripcion' => 'required|string',
        ]);

        $pathImagen = $request->file('imagen')->store('images/recetas', 'public');
        $receta = Recetas::create([
            'titulo_receta' => $request->titulo_receta,
            'imagen' => $pathImagen,
            'tiempo_preparacion' => $request->tiempo_preparacion,
            'tiempo_coccion' => $request->tiempo_coccion,
            'porciones' => $request->porciones,
        ]);

        foreach ($request->ingredientes as $item) {
            $receta->ingredientes()->create([
                'ingrediente' => $item['ingrediente']
            ]);
        }

        foreach ($request->numero_paso as $index => $item) {
            $receta->preparacion()->create([
                'numero_paso' => $index + 1,
                'descripcion' => $item['descripcion']
            ]);
        }

        return redirect()->route('recetas.index')->with('success', 'Receta creada exitosamente.');
    }

    public function update(Request $request, Recetas $receta)
    {
        $request->validate([
            'titulo_receta' => 'nullable',
            'imagen' => 'nullable|image',
            'tiempo_preparacion' => 'nullable|integer',
            'tiempo_coccion' => 'nullable|integer',
            'porciones' => 'nullable|integer',
            'ingredientes' => 'nullable|array|min:1',
            'ingredientes.*.ingrediente' => 'nullable|string',
            'numero_paso' => 'nullable|array|min:1',
            'numero_paso.*.descripcion' => 'nullable|string',
        ]);

        $pathImagen = $receta->imagen;
        if ($request->hasFile('imagen')) {
            if ($receta->imagen) {
                Storage::disk('public')->delete($receta->imagen);
            }
            $pathImagen = $request->file('imagen')->store('images/recetas', 'public');
        }

        $receta->update([
            'titulo_receta' => $request->titulo_receta,
            'imagen' => $pathImagen,
            'tiempo_preparacion' => $request->tiempo_preparacion,
            'tiempo_coccion' => $request->tiempo_coccion,
            'porciones' => $request->porciones,
        ]);

        $receta->ingredientes()->delete();
        foreach ($request->ingredientes as $item) {
            $receta->ingredientes()->create([
                'ingrediente' => $item['ingrediente']
            ]);
        }

        $receta->preparacion()->delete();
        foreach ($request->numero_paso as $index => $item) {
            $receta->preparacion()->create([
                'numero_paso' => $index + 1,
                'descripcion' => $item['descripcion']
            ]);
        }

        return redirect()->route('recetas.index')->with('success', 'Receta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $receta = Recetas::findOrFail($id);
        if ($receta->imagen) {

            if (Storage::disk('public')->exists($receta->imagen)) {
                Storage::disk('public')->delete($receta->imagen);
            }
        }
        $receta->delete();
        return redirect()->route('admin.recetas.index')->with('success', 'Registro eliminado correctamente.');
    }
}
