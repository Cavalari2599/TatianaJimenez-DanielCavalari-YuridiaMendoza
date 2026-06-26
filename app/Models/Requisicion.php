<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    protected $table = 'requisiciones';

    protected $primaryKey = 'idRequisicion';

    protected $fillable = ['fecha', 'estado', 'usuario_fk'];

    protected function casts(): array
    {
        return [
            'fecha' => 'datetime',
        ];
    }

    // Requisicion 0..1 -> 1 Usuario (rol -usuario). La clase Usuario esta fuera del
    // alcance de la tabla A; la relacion se conserva como columna usuario_fk sin FK.
}
