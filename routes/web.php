<?php

use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

// LISTAR
Route::get('/books', [LibroController::class, 'index'])
    ->name('books.index');

// FORMULARIO CREAR
Route::get('/books/create', [LibroController::class, 'create'])
    ->name('books.create');

// GUARDAR
Route::post('/books', [LibroController::class, 'store'])
    ->name('books.store');

// DETALLE
Route::get('/books/{id}', [LibroController::class, 'show'])
    ->name('books.show');

// FORMULARIO EDITAR
Route::get('/books/{id}/edit', [LibroController::class, 'edit'])
    ->name('books.edit');

// ACTUALIZAR
Route::put('/books/{id}', [LibroController::class, 'update'])
    ->name('books.update');

// ELIMINAR
Route::delete('/books/{id}', [LibroController::class, 'destroy'])
    ->name('books.destroy');