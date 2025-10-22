@extends('layouts.app')
@section('title', 'Category Details')
@section('content')
<div class="px-4 sm:px-0">
    <div class="flex items-center mb-6">
        <a href="{{ route('categories.index') }}" class="text-gray-500 hover:text-gray-700 mr-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-gray-900">Category Details</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Category Information</h3>
                    <dl class="grid grid-cols-1 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">ID</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->c_id }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->c_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Description</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->c_description ?? 'No description available' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Total Books</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->books_count }} book(s)</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Books in this Category</h3>
                    @if($category->books->count() > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($category->books as $book)
                                <li class="py-3">
                                    <a href="{{ route('books.show', $book->b_id) }}" class="hover:text-blue-600">
                                        <div class="text-sm font-medium text-gray-900">{{ $book->b_title }}</div>
                                        <div class="text-sm text-gray-500">ISBN: {{ $book->b_isbn }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500">No books in this category yet.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-gray-50 px-6 py-3 flex justify-end space-x-3 rounded-b-lg">
            <a href="{{ route('categories.edit', $category->c_id) }}" class="bg-yellow-600 text-white hover:bg-yellow-700 font-medium py-2 px-4 rounded-lg">Edit Category</a>
            <form action="{{ route('categories.destroy', $category->c_id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white hover:bg-red-700 font-medium py-2 px-4 rounded-lg" onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</button>
            </form>
        </div>
    </div>
</div>
@endsection