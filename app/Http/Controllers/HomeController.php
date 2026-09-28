<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\HomeSettings;
use App\Models\Productos;
use App\Models\Recetas;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Categorias $categorias, Productos $productos, Recetas $recetas){
        $home = HomeSettings::first();
        $categorias = Categorias::take(4)->get();
        $productos = Productos::take(4)->get();
        $recetas = Recetas::take(3)->get();
        return view('vistas.home', compact('home', 'categorias', 'productos', 'recetas'));
    }
    
    public function edit(){
        $home = HomeSettings::first();
        return view('admin.home.edit', compact('home'));
    }
    
    public function update(Request $request, HomeSettings $home){
        $home=HomeSettings::first();
        $request->validate([
            'titulo'=>'nullable',
            'descripcion'=>'nullable',
            'boton_descripcion_1_texto' => 'nullable',
            'boton_descripcion_1_redireccion' => 'nullable',
            'boton_descripcion_2_texto'=> 'nullable',
            'boton_descripcion_2_redireccion' => 'nullable',
            'eleccion_video_imagen' => 'nullable',
            'video'=> 'nullable|mimes:mp4,mov,avi,webm|max:20480',
            'imagen'=>'nullable|image',
            'nosotros_titulo'=>'nullable',
            'nosotros_descripcion'=>'nullable',
            'nosotros_boton_redireccion'=>'nullable',
            'nosotros_boton_texto'=>'nullable',
            'mostrar_linea_productos'=>'nullable',
            'mostrar_productos_destacados'=>'nullable',
            'mostrar_recetas'=>'nullable',
            
        ]);
        
        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen')->store('images/body', 'public');
            $home->imagen = $imagen;
        }
        if ($request->hasFile('video')){
            $video = $request->file('video')->store('videos/body', 'public');
            $home->video = $video;
        }

        
        $home->titulo = $request->titulo;
        $home->descripcion = $request->descripcion;
        $home->boton_descripcion_1_texto = $request->boton_descripcion_1_texto;
        $home->boton_descripcion_1_redireccion   = $request->boton_descripcion_1_redireccion;
        $home->boton_descripcion_2_texto = $request->boton_descripcion_2_texto;
        $home->boton_descripcion_2_redireccion   = $request->boton_descripcion_2_redireccion;

        $home->elegir_video_imagen   = $request->elegir_video_imagen;

        $home->nosotros_titulo   = $request->nosotros_titulo;
        $home->nosotros_descripcion   = $request->nosotros_descripcion;
        $home->nosotros_boton_redireccion   = $request->nosotros_boton_redireccion;
        $home->nosotros_boton_texto   = $request->nosotros_boton_texto;

        $mostrar_linea_productos = $request->has('mostrar_linea_productos') ? 1 : 0;
        $home->mostrar_linea_productos   = $mostrar_linea_productos;

        $mostrar_productos_destacados = $request->has('mostrar_productos_destacados') ? 1 : 0;
        $home->mostrar_productos_destacados   = $mostrar_productos_destacados;

        $mostrar_recetas = $request->has('mostrar_recetas') ? 1 : 0;
        $home->mostrar_recetas  = $request->$mostrar_recetas;

        $home->save();

        return redirect()->route('home');
    }
}
