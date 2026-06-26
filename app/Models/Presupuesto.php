<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = ['nombrePresupuesto', 'unidad_fk'];

    /**
     * Presupuesto 1..* -> 1 Unidad (rol -presupuestos).
     */
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'unidad_fk', 'idUnidad');
    }

    /**
     * Presupuesto 1 -> 0..* MaterialUnidad (rol -presupuesto, "comprado con").
     */
    public function materialUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'presupuesto_fk', 'codigoPresupuesto');
    }
}
