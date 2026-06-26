<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Http\JsonResponse;

class MaterialController extends Controller
{
    /**
     * Actualizar un material.
     * PUT /api/materiales/{codigo}  (equipo 2)
     */
    public function update(UpdateMaterialRequest $request, int $codigo): JsonResponse
    {
        $material = Material::findOrFail($codigo);

        $material->fill($request->only(['unidadMedida', 'descripcion', 'ubicacion']));

        if ($request->filled('categoria.nombre')) {
            $categoria = Categoria::firstOrCreate([
                'nombre' => $request->input('categoria.nombre'),
            ]);
            $material->categoria_fk = $categoria->idCategoria;
        }

        $material->save();

        return response()->json($material->load('categoria'));
    }
}
