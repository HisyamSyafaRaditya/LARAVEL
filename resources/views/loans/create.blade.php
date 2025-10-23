@extends('layouts.app')
@section('title', 'Create Loan')

@section('content')
<div class="px-4 sm:px-0 max-w-4xl mx-auto">
    {{-- Back link --}}
    <div class="mb-6">
        <a href="{{ route('loans.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">
            ← Back
        </a>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Create New Loan</h1>
        <p class="text-gray-600 mb-8">Fill out the details below to create a new loan record</p>

        {{-- Form --}}
        <form action="{{ route('loans.store') }}" method="POST" class="space-y-8">
            @csrf

            {{-- Member & Staff --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Member --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Member <span class="text-red-500">*</span>
                    </label>
                    <select name="Member_m_id"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <option value="">Select Member</option>
                        @foreach($members as $member)
                            <option value="{{ $member->m_id }}" {{ old('Member_m_id') == $member->m_id ? 'selected' : '' }}>
                                {{ $member->m_name }} ({{ $member->m_id }})
                            </option>
                        @endforeach
                    </select>
                    @error('Member_m_id')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Staff --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Staff <span class="text-red-500">*</span>
                    </label>
                    <select name="Staff_s_id"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <option value="">Select Staff</option>
                        @foreach($staff as $item)
                            <option value="{{ $item->s_id }}" {{ old('Staff_s_id') == $item->s_id ? 'selected' : '' }}>
                                {{ $item->s_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('Staff_s_id')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Dates --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Loan Date <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="l_date"
                           value="{{ old('l_date', now()->format('Y-m-d\TH:i')) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           required>
                    @error('l_date')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Return Date <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="l_return_date"
                           value="{{ old('l_return_date', now()->addDays(7)->format('Y-m-d\TH:i')) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           required>
                    @error('l_return_date')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Book Selection --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Select Books <span class="text-red-500">*</span></label>
                <div class="border border-gray-300 rounded-lg divide-y divide-gray-200 overflow-hidden max-h-96 overflow-y-auto">
                    @forelse($books as $book)
                        <div class="flex items-start gap-3 p-4 hover:bg-gray-50 transition">
                            <input type="checkbox" name="books[]" value="{{ $book->b_id }}" id="book_{{ $book->b_id }}"
                                   class="mt-1 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="book_{{ $book->b_id }}" class="flex-1 cursor-pointer">
                                <p class="font-medium text-gray-900">{{ $book->b_title }}</p>
                                <p class="text-sm text-gray-600">
                                    by {{ $book->author->a_name }} • {{ $book->category->c_name }}
                                </p>
                                <p class="text-xs text-gray-500 mt-0.5">Available: {{ $book->b_available_stock }}</p>
                            </label>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-6">No available books</p>
                    @endforelse
                </div>
                @error('books')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('loans.index') }}"
                   class="px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:opacity-90 text-white font-medium rounded-lg shadow transition">
                    Create Loan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
