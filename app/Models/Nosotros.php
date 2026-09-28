<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nosotros extends Model
{
    protected $table = 'nosotros';

    protected $fillable = [
        'titulo',
        'subtitulo_1',
        'descripcion_1',
        'imagen_1',

        'subtitulo_2',
        'descripcion_2',
        'imagen_2',

        'subtitulo_3',
        'descripcion_3',
        'imagen_3',

        'subtitulo_4',
        'descripcion_4',
        'imagen_4'
    ];
}
