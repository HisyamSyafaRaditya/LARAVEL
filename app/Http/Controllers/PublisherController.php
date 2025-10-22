<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::withCount('books')->orderBy('p_id', 'desc')->paginate(10);
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'p_name' => 'required|string|max:50',
            'p_address' => 'nullable|string|max:100',
            'p_phone' => 'nullable|string|max:15',
        ]);

        // Make sure optional fields exist (some DB schemas may not allow NULL)
        $validated['p_address'] = $validated['p_address'] ?? '';
        $validated['p_phone'] = $validated['p_phone'] ?? '';

        $validated['p_id'] = Publisher::generateId();

        Publisher::create($validated);

        return redirect()->route('publishers.index')
                        ->with('success', 'Publisher berhasil ditambahkan!');
    }

    public function show(Publisher $publisher)
    {
        $publisher->load('books.author');
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $validated = $request->validate([
            'p_name' => 'required|string|max:50',
            'p_address' => 'nullable|string|max:100',
            'p_phone' => 'nullable|string|max:15',
        ]);

        $publisher->update($validated);

        return redirect()->route('publishers.index')
                        ->with('success', 'Publisher berhasil diupdate!');
    }

    public function destroy(Publisher $publisher)
    {
        if ($publisher->books()->count() > 0) {
            return redirect()->route('publishers.index')
                           ->with('error', 'Tidak dapat menghapus publisher yang memiliki buku!');
        }

        $publisher->delete();

        return redirect()->route('publishers.index')
                        ->with('success', 'Publisher berhasil dihapus!');
    }
}