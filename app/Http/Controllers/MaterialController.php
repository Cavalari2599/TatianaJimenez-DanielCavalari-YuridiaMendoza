<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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

    /**
     * Insertar un material con su categoria asociada.
     * POST /api/materiales  (equipo 1)
     */
    public function store(StoreMaterialRequest $request): JsonResponse
    {
        $material = DB::transaction(function () use ($request) {
            $categoria = Categoria::firstOrCreate([
                'nombre' => $request->input('categoria.nombre'),
            ]);

            return Material::create([
                'unidadMedida' => $request->input('unidadMedida'),
                'descripcion' => $request->input('descripcion'),
                'ubicacion' => $request->input('ubicacion'),
                'categoria_fk' => $categoria->idCategoria,
            ]);
        });

        return response()->json($material->load('categoria'), 201);
    }

    /**
     * Obtener la lista de materiales con sus categorias asociadas.
     * GET /api/materiales  (equipo 3)
     */
    public function index(): JsonResponse
    {
        $materiales = Material::with('categoria')->get();

        return response()->json($materiales);
    }
}
