<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table='contacto';
    protected $fillable=[
        'razon_social',
        'cuit',
        'tipo_negocio',
        'trayectoria_mercado',
        'direccion',
        'localidad',
        'telefono',
        'celular',
        'horario_atencion',
        'email',
        'observaciones',
        'nombre',
        'genero',
        'curriculum'
    ];
}
