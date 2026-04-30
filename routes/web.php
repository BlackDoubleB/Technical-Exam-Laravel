<?php

use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros/create', [LibroController::class, 'create']); // crear formulario
Route::post('/libros/register', [LibroController::class, 'register'])->name('book.register'); // guardar

Route::get('/libros', [LibroController::class, 'index'])->name('book.index'); //listar

Route::get('/libros/{id}', [LibroController::class, 'show']); //detalle

Route::get('/libros/{id}/edit', [LibroController::class, 'edit']); // editar formulario
Route::put('/libros/{id}', [LibroController::class, 'update']); // actualizar

Route::delete('/libros/{id}', [LibroController::class, 'destroy']);