<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

// Endpoints SOLINVORD - Material (Parte II.B)
Route::put('/materiales/{codigo}', [MaterialController::class, 'update']); // equipo 2: actualizar material
Route::post('/materiales', [MaterialController::class, 'store']);          // equipo 1: insertar material + categoria
Route::get('/materiales', [MaterialController::class, 'index']);           // equipo 3: listar materiales + categorias
