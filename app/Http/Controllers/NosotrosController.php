<?php

namespace App\Http\Controllers;

use App\Models\Nosotros;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function index(Nosotros $nosotros)
    {
        $nosotros = Nosotros::first();
        return view('vistas.nosotros.index', compact('nosotros'));
    }

    public function edit(Nosotros $nosotros)
    {
        $nosotros = Nosotros::first();
        return view('admin.nosotros.edit', compact('nosotros'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'titulo' => 'nullable',
            'subtitulo_1' => 'nullable',
            'descripcion_1' => 'nullable',
            'imagen_1' => 'nullable|image',

            'subtitulo_2' => 'nullable',
            'descripcion_2' => 'nullable',
            'imagen_2' => 'nullable|image',

            'subtitulo_3' => 'nullable',
            'descripcion_3' => 'nullable',
            'imagen_3' => 'nullable|image',

            'subtitulo_4' => 'nullable',
            'descripcion_4' => 'nullable',
            'imagen_4' => 'nullable|image',
        ]);

        
        $nosotros = Nosotros::first();

        
        $imagen_1 = $nosotros ? $nosotros->imagen_1 : null;
        if ($request->hasFile('imagen_1')) {
            $imagen_1 = $request->file('imagen_1')->store('images/nosotros', 'public');
        }

        $imagen_2 = $nosotros ? $nosotros->imagen_2 : null;
        if ($request->hasFile('imagen_2')) {
            $imagen_2 = $request->file('imagen_2')->store('images/nosotros', 'public');
        }

        $imagen_3 = $nosotros ? $nosotros->imagen_3 : null;
        if ($request->hasFile('imagen_3')) {
            $imagen_3 = $request->file('imagen_3')->store('images/nosotros', 'public');
        }

        $imagen_4 = $nosotros ? $nosotros->imagen_4 : null;
        if ($request->hasFile('imagen_4')) {
            $imagen_4 = $request->file('imagen_4')->store('images/nosotros', 'public');
        }

        
        Nosotros::updateOrCreate(
            ['id' => 1],
            [
                'titulo' => $request->titulo,
                'subtitulo_1' => $request->subtitulo_1,
                'descripcion_1' => $request->descripcion_1,
                'imagen_1' => $imagen_1,
                'subtitulo_2' => $request->subtitulo_2,
                'descripcion_2' => $request->descripcion_2,
                'imagen_2' => $imagen_2,
                'subtitulo_3' => $request->subtitulo_3,
                'descripcion_3' => $request->descripcion_3,
                'imagen_3' => $imagen_3,
                'subtitulo_4' => $request->subtitulo_4,
                'descripcion_4' => $request->descripcion_4,
                'imagen_4' => $imagen_4,
            ]
        );

        return redirect()->route('nosotros.index')->with('success', 'Nosotros editado correctamente');
    }
}
