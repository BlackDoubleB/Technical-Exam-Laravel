<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Collection;

class AuthorService
{
    public function getAllAuthors(): Collection
    {
        $authors = Author::select('id', 'name')->get();

        if ($authors->isEmpty()) {
            throw new \Exception("No authors found.");
        }

        return $authors;
    }

    

    
}