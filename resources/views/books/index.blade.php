@extends('layouts.app')

@section('title')
Books
@endsection

@section('main')

<div class="flex flex-col space-y-5">
   <div class="flex justify-between items-center">
     <h1 class="text-2xl font-bold">Books</h1>
    <a href="{{ route('books.create') }}"
        class="text-white bg-success box-border border border-transparent hover:bg-success-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-fit self-end">
        Add Book
    </a>
   </div>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" strokeWidth="1.5">
                                    <path
                                        d="M21.544 11.045c.304.426.456.64.456.955c0 .316-.152.529-.456.955C20.178 14.871 16.689 19 12 19c-4.69 0-8.178-4.13-9.544-6.045C2.152 12.529 2 12.315 2 12c0-.316.152-.529.456-.955C3.822 9.129 7.311 5 12 5c4.69 0 8.178 4.13 9.544 6.045Z" />
                                    <path d="M15 12a3 3 0 1 0-6 0a3 3 0 0 0 6 0Z" />
                                </g>
                            </svg>
                        </a>
                    </td>
                    <td class="px-6 py-4">

                        <a href="{{ route('books.edit', $register->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                    strokeWidth="2">
                                    <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                </g>
                            </svg>
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