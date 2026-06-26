<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $table = 'materiales';

    protected $primaryKey = 'codigo';

    protected $fillable = ['unidadMedida', 'descripcion', 'ubicacion', 'categoria_fk'];

    /**
     * Material 0..* -> 1 Categoria (rol -categoria).
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_fk', 'idCategoria');
    }

    /**
     * Material 1 -> 1..* MaterialUnidad (rol -material).
     */
    public function materialUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'material_fk', 'codigo');
    }
}