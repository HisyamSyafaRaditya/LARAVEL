<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('books')->orderBy('c_id', 'desc')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'c_name' => 'required|string|max:20',
            'c_description' => 'nullable|string',
        ]);

        $validated['c_id'] = Category::generateId();
        
        Category::create($validated);

        return redirect()->route('categories.index')
                        ->with('success', 'Category berhasil ditambahkan!');
    }

    public function show(Category $category)
    {
        $category->load('books.author');
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'c_name' => 'required|string|max:20',
            'c_description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
                        ->with('success', 'Category berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        if ($category->books()->count() > 0) {
            return redirect()->route('categories.index')
                           ->with('error', 'Tidak dapat menghapus category yang memiliki buku!');
        }

        $category->delete();

        return redirect()->route('categories.index')
                        ->with('success', 'Category berhasil dihapus!');
    }
}