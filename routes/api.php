<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cidades\IndexController as CidadesIndexController;
use App\Http\Controllers\Cidades\CidadesMedicoController;
use App\Http\Controllers\Medicos\IndexController as MedicosIndexController;
use App\Http\Controllers\Medicos\StoreController as MedicosStoreController;
use App\Http\Controllers\Medicos\ConsultaController as MedicosConsultaController;
use App\Http\Controllers\Medicos\MedicosPacienteController;
use App\Http\Controllers\Pacientes\IndexController as PacientesIndexController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas públicas de listagem
Route::get('/cidades', [CidadesIndexController::class, '__invoke']);
Route::get('/medicos', [MedicosIndexController::class, '__invoke']);
Route::get('/pacientes', [PacientesIndexController::class, '__invoke']);

// Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    // Autenticação
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Cidades
    Route::get('/cidades/{id_cidade}/medicos', [CidadesMedicoController::class, '__invoke']);

    // Médicos
    Route::post('/medicos', [MedicosStoreController::class, '__invoke']);
    Route::get('/medicos/{id_medico}/pacientes', [MedicosPacienteController::class, '__invoke']);
    Route::post('/medicos/consulta', [MedicosConsultaController::class, '__invoke']);
});
