<?php

namespace App\Services;

use App\Models\Book;

class BookService{

    public function getBookAll($perPage = 10)
    {
        return Book::with('author:id,name')->paginate($perPage);
    }

    public function getBookId($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    public function registerBook(array $data)
    {
        if (!isset($data['title']) || !isset($data['description'])) {
            throw new \Exception("Missing required data.");
        }

        return Book::create($data);
    }

    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);

        if (empty($data)) {
            throw new \Exception("No data provided for update.");
        }

        $book->update($data);

        return $book;
    }

    public function destroyBook($id)
    {
        $book = Book::findOrFail($id);

        if (!$book) {
            throw new \Exception("Book not found.");
        }

        $book->delete();

        return $book;
    }
}