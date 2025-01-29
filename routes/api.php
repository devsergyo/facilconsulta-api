<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cidades\IndexController as CidadesIndexController;
use App\Http\Controllers\Medicos\IndexController as MedicosIndexController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas públicas de listagem
Route::get('/cidades', [CidadesIndexController::class, '__invoke']);
Route::get('/medicos', [MedicosIndexController::class, '__invoke']);

// Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Outras rotas protegidas
    
});
