<?php
namespace App\Services;
use App\Models\Author;
use App\Models\Book;

class AuthorService{
    public function getAllAuthors(){
       return Author::select('id','name')->get();
    }

    public function getRegisters($perPage = 10){
        return Book::with('author:id,name')->paginate($perPage);
    }
    
     public function registerBook(array $data){
           return Book::create($data);
    }

    public function getBookId($id){
            return Book::with('author')->findOrFail($id);
    }

    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function destroyBook($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return $book;
    }
}
