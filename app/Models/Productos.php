<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre', 'descripcion', 'cajas', 'unidades', 'peso', 'vida_util',
        'imagen', 'categoria_id', 'codigo',
    ];

    public function categorias()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}
