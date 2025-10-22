@extends('layouts.app')
@section('title', 'Book Detail')
@section('content')
<div class="px-4 sm:px-0">
    <div class="mb-6"><a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">Book Information</h2>
            <div class="space-y-3">
                <div><p class="text-sm text-gray-600">Book ID</p><p class="font-semibold">{{ $book->b_id }}</p></div>
                <div><p class="text-sm text-gray-600">Title</p><p class="font-semibold">{{ $book->b_title }}</p></div>
                <div><p class="text-sm text-gray-600">ISBN</p><p class="font-semibold">{{ $book->b_isbn }}</p></div>
                <div><p class="text-sm text-gray-600">Author</p><p class="font-semibold">{{ $book->author->a_name }}</p></div>
                <div><p class="text-sm text-gray-600">Category</p><p class="font-semibold">{{ $book->category->c_name }}</p></div>
                <div><p class="text-sm text-gray-600">Publisher</p><p class="font-semibold">{{ $book->publisher->p_name }}</p></div>
                <div><p class="text-sm text-gray-600">Publication Year</p><p class="font-semibold">{{ $book->b_publication_year->format('Y') }}</p></div>
                <div><p class="text-sm text-gray-600">Total Stock</p><p class="font-semibold">{{ $book->b_stock }}</p></div>
                <div><p class="text-sm text-gray-600">Available</p><p class="font-semibold text-green-600">{{ $book->b_available_stock }}</p></div>
                <div><p class="text-sm text-gray-600">Borrowed</p><p class="font-semibold text-red-600">{{ $book->borrowedCount() }}</p></div>
            </div>
            <div class="mt-6 pt-4 border-t">
                <p class="text-sm text-gray-600 mb-2">Synopsis</p>
                <p class="text-sm text-gray-700">{{ $book->b_synopsys ?? 'No synopsis available' }}</p>
            </div>
            <div class="flex space-x-2 mt-6">
                <a href="{{ route('books.edit', $book->b_id) }}" class="flex-1 bg-yellow-600 hover:bg-yellow-700 text-white text-center font-medium py-2 px-4 rounded-lg">Edit</a>
                <form action="{{ route('books.destroy', $book->b_id) }}" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </div>
        </div>
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">Loan History</h2>
            <div class="space-y-3">
                @forelse($book->loans as $loan)
                    <div class="border rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="font-semibold">{{ $loan->member->m_name }}</p>
                                <p class="text-sm text-gray-600">Loan Date: {{ $loan->l_date->format('d M Y') }}</p>
                                <p class="text-sm text-gray-600">Return Date: {{ $loan->l_return_date->format('d M Y') }}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $loan->l_status == 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($loan->l_status) }}
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">No loan history</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection