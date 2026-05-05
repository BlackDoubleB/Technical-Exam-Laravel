@extends('layouts.app')

@section('title')

@endsection

@section('main')
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-6">

    <h1 class="text-7xl font-bold text-red-500 mb-4">404</h1>

    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
        Page Not Found
    </h2>

    <p class="text-gray-500 mb-6">
        Sorry, the resource you are looking for does not exist or has been removed.
    </p>

    <a href="{{ route('books.index') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
        Back to Home
    </a>

</div>
@endsection