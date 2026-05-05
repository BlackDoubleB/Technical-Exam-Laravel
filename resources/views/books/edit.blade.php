@extends('layouts.app')

@section('title')
Update Book
@endsection

@section('main')

<form class="max-w-md mx-auto bg-white px-8 py-8 rounded-3xl shadow-xl border border-gray-200"
    action="{{ route('books.update', $book->id) }}"
    method="POST">

    <h1 class="font-semibold text-2xl text-center text-gray-800 mb-6">Edit</h1>

    @csrf
    @method('PUT')

    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Title</label>
        <input name="title" type="text" id="title"
            value="{{ old('title', $book->title) }}"
            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400"
            placeholder="Name book" required />

        @error('title')
        <p class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 px-3 py-2 rounded-lg">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Price</label>
        <input name="price" type="number" id="price" step="0.01"
            value="{{ old('price', $book->price) }}"
            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400"
            placeholder="0.00" required />

        @error('price')
        <p class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 px-3 py-2 rounded-lg">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
        <input name="description" type="text" id="description"
            value="{{ old('description', $book->description) }}"
            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400"
            placeholder="Description" required />

        @error('description')
        <p class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 px-3 py-2 rounded-lg">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="authors" class="block mb-2 text-sm font-medium text-gray-700">Author</label>
        <select id="authors" name="author_id"
            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

            <option value="">Choose an author</option>

            @foreach($authors as $item)
                <option value="{{ $item->id }}"
                    {{ old('author_id', $book->author_id) == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach

        </select>

        @error('author_id')
        <p class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 px-3 py-2 rounded-lg">
            {{ $message }}
        </p>
        @enderror
    </div>

    <button type="submit"
        class="w-full bg-blue-600 text-white text-sm font-medium py-2.5 rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm focus:ring-2 focus:ring-blue-400">
        Update
    </button>

</form>

@endsection