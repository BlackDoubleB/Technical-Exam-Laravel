@extends('layouts.app')

@section('title')
Create
@endsection

@section('main')
<h1 class="font-bold text-2xl">Register Book</h1>
<div class="flex flex-col">
    <form class="max-w-sm mx-auto" action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-5 mt-20">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Book</label>
            <input name="title" type="text" id="title"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Name book" required />
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2.5 text-sm font-medium text-heading">Price</label>
            <input name="price" type="number" id="price" step="0.01"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="0.00" required />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2.5 text-sm font-medium text-heading">Description</label>
            <input name="description" type="text" id="description"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Description" required />
        </div>
        <div class="mb-5">
            <label for="authors" class="block mb-2.5 text-sm font-medium text-heading">Author</label>
            <select id="authors" name="author_id"
                class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                <option selected>Choose a author</option>
                @foreach($authors as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Submit</button>
    </form>
</div>
@endsection