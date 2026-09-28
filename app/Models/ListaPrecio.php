<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaPrecio extends Model
{
    use HasFactory;

    protected $table = 'listas_precios';

    protected $fillable = ['titulo', 'archivo_path', 'tamano_bytes'];

    public function pesoLegible(): string
    {
        if ($this->tamano_bytes >= 1048576) {
            return number_format($this->tamano_bytes / 1048576, 1, ',', '.').' MB';
        }

        return number_format(ceil($this->tamano_bytes / 1024), 0, ',', '.').' KB';
    }
}
