<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredientes extends Model
{
    protected $table='ingredientes';
    
    protected $fillable = [
        'recetas_id',
        'ingrediente',
    ];

    public function receta()
    {
        return $this->belongsTo(Recetas::class, 'recetas_id');
    }
}
