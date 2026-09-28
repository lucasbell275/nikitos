<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSettings extends Model
{
    protected $table='home_settings';

    protected $fillable=[
        'titulo',
        'descripcion',
        'boton_descripcion_1_texto',
        'boton_descripcion_1_redireccion',
        'boton_descripcion_2_texto',
        'boton_descripcion_2_redireccion',
        'elegir_video_imagen',
        'video',
        'imagen',
        'nosotros_titulo',
        'nosotros_descripcion',
        'nosotros_boton_redireccion',
        'nosotros_boton_texto',
        'nosotros_imagen',
        'mostrar_linea_productos',
        'mostrar_productos_destacados',
        'mostrar_recetas'
    ];
}
