<?php

use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros/create', [LibroController::class, 'create']); // crear formulario
Route::post('/libros', [LibroController::class, 'store']); // guardar

Route::get('/libros', [LibroController::class, 'index']); //listar

Route::get('/libros/{id}', [LibroController::class, 'show']); //detalle

Route::get('/libros/{id}/edit', [LibroController::class, 'edit']); // editar formulario
Route::put('/libros/{id}', [LibroController::class, 'update']); // actualizar

Route::delete('/libros/{id}', [LibroController::class, 'destroy']);