@extends('layouts.app')

@section('title')
Books
@endsection

@section('main')
<h1 class="text-2xl font-bold">Books</h1>
<div class="flex flex-col space-y-5">
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default ">

        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        View
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Add
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Edit
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registers as $register)
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $register->title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $register->description }}
                    </td>
                    
                    <td class="px-6 py-4">
                        <a href="{{ route('books.show', $register->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 20h13v-4H9zM2 8h5V4H2zm0 6h5v-4H2zm0 6h5v-4H2zm7-6h13v-4H9zm0-6h13V4H9z"/></svg>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('books.create')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('books.edit', $register->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z"/><path fill="currentColor" d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2z"/></svg>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <form id="deleteRegister" action="{{ route('books.destroy', $register->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btnDelete" type="button"> <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                </svg></button>
                        </form>

                    </td>


                </tr>
                @endforeach


            </tbody>
        </table>

    </div>
</div>

<x-modal />

@endsection