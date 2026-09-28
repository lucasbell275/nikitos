<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    protected $table='recetas';
    protected $fillable=[
        'titulo_receta',
        'imagen',
        'tiempo_preparacion',
        'tiempo_coccion',
        'porciones',
    ];
    public function ingredientes(){
        return $this->hasMany(Ingredientes::class);
    }
    public function preparacion(){
        return $this->hasMany(Preparacion::class);
    }
  
}
