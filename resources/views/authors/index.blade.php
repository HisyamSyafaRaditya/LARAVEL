@extends('layouts.app')
@section('title', 'Authors')
@section('content')
<div class="px-4 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Authors</h1>
        <a href="{{ route('authors.create') }}"
           class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow hover:opacity-90 transition">
           Add Author
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($authors as $author)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $author->a_name }}</h3>
                <p class="text-sm text-gray-600 mb-1">{{ $author->a_country ?? 'Unknown' }}</p>
                <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $author->a_biography ?? 'No biography' }}</p>
                <div class="flex justify-between items-center border-t pt-4">
                    <span class="text-sm text-gray-600">{{ $author->books_count }} books</span>
                    <div class="space-x-2">
                        <a href="{{ route('authors.show', $author->a_id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        <a href="{{ route('authors.edit', $author->a_id) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                        <form action="{{ route('authors.destroy', $author->a_id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500 py-8">No authors found</p>
        @endforelse
    </div>

    <div class="mt-6">{{ $authors->links() }}</div>
</div>
@endsection
