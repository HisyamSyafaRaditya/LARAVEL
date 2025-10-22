<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category', 'publisher'])
                    ->orderBy('b_id', 'desc')
                    ->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::orderBy('a_name')->get();
        $categories = Category::orderBy('c_name')->get();
        $publishers = Publisher::orderBy('p_name')->get();
        
        return view('books.create', compact('authors', 'categories', 'publishers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'b_title' => 'required|string|max:50',
            'b_isbn' => 'required|string|max:20|unique:books,b_isbn',
            'b_publication_year' => 'required|date',
            'b_stock' => 'required|integer|min:0',
            'b_synopsys' => 'nullable|string',
            'author_a_id' => 'required|exists:authors,a_id',
            'category_c_id' => 'required|exists:categories,c_id',
            'publisher_p_id' => 'required|exists:publishers,p_id',
        ]);

        $validated['b_id'] = Book::generateId();
        $validated['b_available_stock'] = $validated['b_stock'];
        
        Book::create($validated);

        return redirect()->route('books.index')
                        ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        $book->load(['author', 'category', 'publisher', 'loans.member']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('a_name')->get();
        $categories = Category::orderBy('c_name')->get();
        $publishers = Publisher::orderBy('p_name')->get();
        
        return view('books.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'b_title' => 'required|string|max:50',
            'b_isbn' => 'required|string|max:20|unique:books,b_isbn,' . $book->b_id . ',b_id',
            'b_publication_year' => 'required|date',
            'b_stock' => 'required|integer|min:0',
            'b_synopsys' => 'nullable|string',
            'author_a_id' => 'required|exists:authors,a_id',
            'category_c_id' => 'required|exists:categories,c_id',
            'publisher_p_id' => 'required|exists:publishers,p_id',
        ]);

        // Update available stock jika total stock berubah
        $stockDifference = $validated['b_stock'] - $book->b_stock;
        $validated['b_available_stock'] = $book->b_available_stock + $stockDifference;
        
        // Pastikan available stock tidak negatif
        if ($validated['b_available_stock'] < 0) {
            $validated['b_available_stock'] = 0;
        }

        $book->update($validated);

        return redirect()->route('books.index')
                        ->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy(Book $book)
    {
        if ($book->borrowedCount() > 0) {
            return redirect()->route('books.index')
                           ->with('error', 'Tidak dapat menghapus buku yang sedang dipinjam!');
        }

        $book->delete();

        return redirect()->route('books.index')
                        ->with('success', 'Buku berhasil dihapus!');
    }
}