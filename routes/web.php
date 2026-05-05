<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// LISTAR
Route::redirect('/', '/books');
Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

// FORMULARIO CREAR
Route::get('/books/create', [BookController::class, 'create'])
    ->name('books.create');

// GUARDAR
Route::post('/books', [BookController::class, 'store'])
    ->name('books.store');

// DETALLE
Route::get('/books/{id}', [BookController::class, 'show'])
    ->name('books.show');

// FORMULARIO EDITAR
Route::get('/books/{id}/edit', [BookController::class, 'edit'])
    ->name('books.edit');

// ACTUALIZAR
Route::put('/books/{id}', [BookController::class, 'update'])
    ->name('books.update');

// ELIMINAR
Route::delete('/books/{id}', [BookController::class, 'destroy'])
    ->name('books.destroy');