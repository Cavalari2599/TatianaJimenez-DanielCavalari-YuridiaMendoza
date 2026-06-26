<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $primaryKey = 'idCategoria';

    protected $fillable = ['nombre'];

    /**
     * Categoria 1 -> 0..* Material (rol -categoria).
     */
    public function materiales(): HasMany
    {
        return $this->hasMany(Material::class, 'categoria_fk', 'idCategoria');
    }
}
