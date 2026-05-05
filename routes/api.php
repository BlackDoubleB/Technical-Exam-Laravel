<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// HU-01: Registro
Route::post('/register', [AuthController::class, 'register']);
// HU-02: Login
Route::post('/login', [AuthController::class, 'login']);


// HU-04 (Paginación)
// HU-05 (Filtro Usuario)
// HU-06 (Filtro "Mis Posts")
// HU-07 (Orden Fecha)
Route::get('/posts', [PostController::class, 'index'])->middleware('auth:sanctum');

// Obtener un post 
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('auth:sanctum');

// HU-03: crear registro
Route::post('/posts', [PostController::class, 'store'])->middleware('auth:sanctum');

// HU-08: actualizar 
Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('auth:sanctum');

// HU-9: Eliminar
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('auth:sanctum');
