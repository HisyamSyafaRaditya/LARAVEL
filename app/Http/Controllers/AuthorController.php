<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->orderBy('a_id', 'desc')->paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'a_name' => 'required|string|max:50',
            'a_country' => 'nullable|string|max:20',
            'a_biography' => 'nullable|string',
        ]);

        $validated['a_id'] = Author::generateId();
        
        Author::create($validated);

        return redirect()->route('authors.index')
                        ->with('success', 'Author berhasil ditambahkan!');
    }

    public function show(Author $author)
    {
        $author->loadCount('books')
               ->load(['books.category']);

        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'a_name' => 'required|string|max:50',
            'a_country' => 'nullable|string|max:20',
            'a_biography' => 'nullable|string',
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')
                        ->with('success', 'Author berhasil diupdate!');
    }

    public function destroy(Author $author)
    {
        if ($author->books()->count() > 0) {
            return redirect()->route('authors.index')
                           ->with('error', 'Tidak dapat menghapus author yang memiliki buku!');
        }

        $author->delete();

        return redirect()->route('authors.index')
                        ->with('success', 'Author berhasil dihapus!');
    }
}
