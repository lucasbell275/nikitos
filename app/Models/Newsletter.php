<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table='suscriptores_newsletter';
    protected $fillable=['email'];
}
