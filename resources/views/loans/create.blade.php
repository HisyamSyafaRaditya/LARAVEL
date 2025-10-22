@extends('layouts.app')
@section('title', 'Create Loan')
@section('content')
<div class="px-4 sm:px-0 max-w-4xl">
    <div class="mb-6"><a href="{{ route('loans.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Create New Loan</h1>
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Member *</label>
                    <select name="Member_m_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Member</option>
                        @foreach($members as $member)
                            <option value="{{ $member->m_id }}" {{ old('Member_m_id') == $member->m_id ? 'selected' : '' }}>
                                {{ $member->m_name }} ({{ $member->m_id }})
                            </option>
                        @endforeach
                    </select>
                    @error('Member_m_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Staff *</label>
                    <select name="Staff_s_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Staff</option>
                        @foreach($staff as $item)
                            <option value="{{ $item->s_id }}" {{ old('Staff_s_id') == $item->s_id ? 'selected' : '' }}>
                                {{ $item->s_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('Staff_s_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Loan Date *</label>
                    <input type="datetime-local" name="l_date" value="{{ old('l_date', now()->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    @error('l_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Return Date *</label>
                    <input type="datetime-local" name="l_return_date" value="{{ old('l_return_date', now()->addDays(7)->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    @error('l_return_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Books *</label>
                <div class="border rounded-lg p-4 max-h-96 overflow-y-auto">
                    @forelse($books as $book)
                        <div class="flex items-center p-3 hover:bg-gray-50 rounded">
                            <input type="checkbox" name="books[]" value="{{ $book->b_id }}" id="book_{{ $book->b_id }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="book_{{ $book->b_id }}" class="ml-3 flex-1 cursor-pointer">
                                <p class="text-sm font-medium text-gray-900">{{ $book->b_title }}</p>
                                <p class="text-xs text-gray-600">by {{ $book->author->a_name }} | {{ $book->category->c_name }} | Available: {{ $book->b_available_stock }}</p>
                            </label>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No available books</p>
                    @endforelse
                </div>
                @error('books')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('loans.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg">Create Loan</button>
            </div>
        </form>
    </div>
</div>
@endsectione