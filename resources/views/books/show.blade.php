@extends('layouts.app')

@section('title')
Detail
@endsection

@section('main')

<h1 class="font-semibold text-2xl text-gray-800 mb-6">Book</h1>

<div class="overflow-hidden bg-white shadow-xl rounded-3xl border border-gray-200">
    
    <table class="w-full text-sm text-left text-gray-700">
        
        <thead class="text-xs uppercase bg-gray-100 text-gray-500 border-b">
            <tr>
                <th scope="col" class="px-6 py-4 font-semibold">
                    Title
                </th>
                <th scope="col" class="px-6 py-4 font-semibold">
                    Description
                </th>
                <th scope="col" class="px-6 py-4 font-semibold">
                    Price
                </th>
                <th scope="col" class="px-6 py-4 font-semibold">
                    Author
                </th>
            </tr>
        </thead>

        <tbody>
            <tr class="hover:bg-gray-50 transition">
                
                <td class="px-6 py-4 font-medium text-gray-800">
                    {{$book->title}}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{$book->description}}
                </td>

                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">
                        S/ {{$book->price}}
                    </span>
                </td>

                <td class="px-6 py-4 text-gray-700">
                    {{$book->author->name}}
                </td>

            </tr>
        </tbody>

    </table>
</div>

@endsection