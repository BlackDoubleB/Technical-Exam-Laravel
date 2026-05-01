@extends('layouts.app')

@section('title', 'Server Error')

@section('main')
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-6">

    <h1 class="text-7xl font-bold text-red-500 mb-4">500</h1>

    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
        Internal Server Error
    </h2>

    <p class="text-gray-500 mb-6">
        Something went wrong on our side. Please try again later.
    </p>

    <a href="{{ route('books.index') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
        Go back home
    </a>

</div>
@endsection