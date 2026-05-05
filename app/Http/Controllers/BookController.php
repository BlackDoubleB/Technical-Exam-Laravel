<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\AuthorService;
use App\Services\BookService;

class BookController extends Controller
{
    public function index(BookService $bookService)
    {
        $data = $bookService->getBookAll();

        return view('books.index', ['registers' => $data]);
    }

    public function create(AuthorService $authorService)
    {
        try {
            $data = $authorService->getAllAuthors();

            return view('books.create', [
                'authors' => $data,
            ]);
        } catch (\Exception $e) {
            abort(500, 'Error loading authors.');
        }
    }

    public function store(CreateBookRequest $request, BookService $bookService)
    {
        $validated = $request->validated();

        try {
            $bookService->registerBook($validated);
            return redirect()
                ->route('books.index')
                ->with('success', 'Book created successfully.');
        } catch (\Exception $e) {
            abort(500, 'Error creating book.');
        }
    }

    public function show(int $id, BookService $bookService)
    {

        $data = $bookService->getBookId($id);

        return view('books.show', ['book' => $data]);
    }

    public function edit(int $id, BookService $bookService, AuthorService $authorService)
    {
        $data = $bookService->getBookId($id);
        $authors = $authorService->getAllAuthors();

        return view('books.edit', [
            'book' => $data,
            'authors' => $authors,
        ]);
    }

    public function update(UpdateBookRequest $request, int $id, BookService $bookService)
    {
        $validated = $request->validated();

        try {
            $bookService->updateBook($id, $validated);

            return redirect()
                ->route('books.index')
                ->with('success', 'Book updated successfully.');
        } catch (\Exception $e) {
            abort(500, 'Error updating book.');
        }
    }

    public function destroy(int $id, BookService $bookService)
    {
        try {
            $bookService->destroyBook($id);

            return redirect()
                ->route('books.index')
                ->with('success', 'Book deleted successfully.');
        } catch (\Exception $e) {
            abort(500, 'Error deleting book.');
        }
    }
}
