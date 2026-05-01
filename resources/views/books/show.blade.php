@extends('layouts.app')

@section('title')
Detail
@endsection

@section('main')
<h1 class="font-bold text-3xl">Book</h1>

    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Author
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{$book->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$book->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$book->description}}
                    </td>
                    <td class="px-6 py-4">
                        {{$book->price}}
                    </td>
                    <td class="px-6 py-4">
                        {{$book->author->name}}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

@endsection