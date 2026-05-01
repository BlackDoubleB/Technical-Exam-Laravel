@extends('layouts.app')

@section('title')

@endsection

@section('main')
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-6">

    <h1 class="text-7xl font-bold text-red-500 mb-4">404</h1>

    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
        Página no encontrada
    </h2>

    <p class="text-gray-500 mb-6">
        Lo sentimos, el recurso que buscas no existe o fue eliminado.
    </p>

    <a href="{{ route('books.index') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
        Volver al inicio
    </a>

</div>
@endsection