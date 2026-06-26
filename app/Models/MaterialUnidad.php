<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialUnidad extends Model
{
    protected $table = 'material_unidad';

    protected $primaryKey = 'idMaterialUnidad';

    protected $fillable = ['cantidad', 'material_fk', 'idUnidad', 'presupuesto_fk'];

    /**
     * MaterialUnidad 1..* -> 1 Material (rol -material).
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_fk', 'codigo');
    }

    /**
     * MaterialUnidad 0..* -> 1 Unidad (rol -unidad, "pertenece a").
     */
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    /**
     * MaterialUnidad 0..* -> 1 Presupuesto (rol -presupuesto, "comprado con").
     */
    public function presupuesto(): BelongsTo
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_fk', 'codigoPresupuesto');
    }
}
