<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cidades\IndexController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/cidades', [IndexController::class, '__invoke']);

// Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Outras rotas protegidas
    
});
