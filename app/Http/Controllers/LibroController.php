<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(){
        return "lista de libros";
    }

     public function create(AuthorService $authorService){
        $data = $authorService->getAllAuthors();
       return view('components.create', [
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

    return redirect()->route('book.index')->with('success', 'Libro creado');

    }
     public function show(){

    }
     public function edit(){

    }
     public function update(){

    }
     public function destroy(){

    }


}
