<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(AuthorService $authorService){
        $data = $authorService->getRegisters();
        return view('books.index',['registers'=> $data]);
    }

     public function create(AuthorService $authorService){
        $data = $authorService->getAllAuthors();
       return view('books.create', [
        'authors'=> $data,
       ]);
    }
    
     public function register(Request $request, AuthorService $authorService){

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'author_id' => 'required|exists:authors,id'
    ]);

    $data = [
        'title' => $validated['title'], 
         'description' => $validated['description'],
        'price' => $validated['price'],
        'author_id' => $validated['author_id']
    ];

    $authorService->registerBook($data);

    return redirect()->route('books.index')->with('success', 'Libro creado');

    }

     public function show($id,AuthorService $authorService){
        $data =  $authorService->getBookId($id);
       return view('books.show', ['book' => $data]);
    }

     public function edit($id,AuthorService $authorService){
        $data =  $authorService->getBookId($id);
        $authors = $authorService->getAllAuthors();
        return view('books.edit', ['book' => $data, 'authors'=> $authors,]);

    }

     public function update(Request $request, $id,AuthorService $authorService){

     $validated = $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string|max:255',
    'price' => 'required|numeric|min:0',
    'author_id' => 'required|exists:authors,id'
    ]);

    $authorService->updateBook($id, $validated);

    return redirect()->route('books.index')->with('success', 'Libro actualizado');

    }

     public function destroy($id, AuthorService $authorService){
        $delete = $authorService->destroyBook($id);
        if($delete)
            {
                return redirect()->route('books.index')->with('success', 'Libro eliminado');
            }

    }

}
