<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $primaryKey = 'idUnidad';

    protected $fillable = ['nombre'];

    /**
     * Unidad 1 -> 0..* MaterialUnidad (rol -unidad, "pertenece a").
     */
    public function materialUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'idUnidad', 'idUnidad');
    }

    /**
     * Unidad 1 -> 1..* Presupuesto (rol -presupuestos).
     */
    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class, 'unidad_fk', 'idUnidad');
    }
}
