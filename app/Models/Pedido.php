<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id', 'fecha', 'razon_social', 'codigo_cliente', 'localidad',
        'horario', 'condiciones_pago', 'observaciones', 'archivo_path', 'estado',
    ];

    protected function casts(): array
    {
        return ['fecha' => 'date'];
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PedidoItem::class);
    }
}
