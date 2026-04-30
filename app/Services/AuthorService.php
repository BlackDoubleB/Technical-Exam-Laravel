<?php
namespace App\Services;
use App\Models\Author;
use App\Models\Book;

class AuthorService{
    public function getAllAuthors(){
       return Author::select('id','name')->get();
    }

     public function registerBook(array $data){
           return Book::create($data);
    }
}
