<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
    protected $table='preparacion';
    protected $fillable = [
        'recetas_id',
        'numero_paso',
        'descripcion',
    ];

    public function receta(){
        return $this->belongsTo(Recetas::class, 'recetas_id');
    }
}
