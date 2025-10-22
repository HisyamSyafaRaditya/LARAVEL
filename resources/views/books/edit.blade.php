@extends('layouts.app')
@section('title', 'Edit Book')
@section('content')
<div class="px-4 sm:px-0 max-w-4xl">
    <div class="mb-6"><a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Book</h1>
        <form action="{{ route('books.update', $book->b_id) }}" method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="b_title" value="{{ old('b_title', $book->b_title) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ISBN *</label>
                    <input type="text" name="b_isbn" value="{{ old('b_isbn', $book->b_isbn) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Author *</label>
                    <select name="author_a_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($authors as $author)
                            <option value="{{ $author->a_id }}" {{ old('author_a_id', $book->author_a_id) == $author->a_id ? 'selected' : '' }}>{{ $author->a_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_c_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->c_id }}" {{ old('category_c_id', $book->category_c_id) == $category->c_id ? 'selected' : '' }}>{{ $category->c_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Publisher *</label>
                    <select name="publisher_p_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->p_id }}" {{ old('publisher_p_id', $book->publisher_p_id) == $publisher->p_id ? 'selected' : '' }}>{{ $publisher->p_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Publication Year *</label>
                    <input type="date" name="b_publication_year" value="{{ old('b_publication_year', $book->b_publication_year->format('Y-m-d')) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                    <input type="number" name="b_stock" value="{{ old('b_stock', $book->b_stock) }}" min="0" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Synopsis</label>
                <textarea name="b_synopsys" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('b_synopsys', $book->b_synopsys) }}</textarea>
            </div>
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('books.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg">Update Book</button>
            </div>
        </form>
    </div>
</div>
@endsection