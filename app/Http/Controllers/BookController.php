<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:books,title',
            'author_id' => 'required',
            'description' => 'nullable',
        ]);

        Book::create($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Berhasil menambah data buku');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|max:255|unique:books,title,' . $book->id,
            'author_id' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $book->update($request->all());

        return redirect()
            ->route('books.show', $book)
            ->with('success', 'Berhasil memperbarui data buku');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Berhasil menghapus data buku');
    }
}
