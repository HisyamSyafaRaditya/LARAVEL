@extends('layouts.app')
@section('title', 'Loan Detail')
@section('content')
<div class="px-4 sm:px-0">
    <div class="mb-6"><a href="{{ route('loans.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Loan Information -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Loan Information</h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-600">Loan ID</p>
                    <p class="font-semibold text-gray-900">{{ $loan->l_id }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Member</p>
                    <p class="font-semibold text-gray-900">{{ $loan->member->m_name }}</p>
                    <p class="text-xs text-gray-500">{{ $loan->member->m_email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Staff</p>
                    <p class="font-semibold text-gray-900">{{ $loan->staff->s_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Loan Date</p>
                    <p class="font-semibold text-gray-900">{{ $loan->l_date->format('d M Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Return Date</p>
                    <p class="font-semibold text-gray-900">{{ $loan->l_return_date->format('d M Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Status</p>
                    @if($loan->isOverdue())
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            Overdue ({{ $loan->daysOverdue() }} days)
                        </span>
                    @else
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                            {{ $loan->l_status == 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($loan->l_status) }}
                        </span>
                    @endif
                </div>
                @if($loan->isOverdue())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                        <p class="text-xs font-semibold text-red-800">
                            Fine: Rp {{ number_format($loan->calculateFine(), 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-red-600 mt-1">
                            (Rp 1.000 per day)
                        </p>
                    </div>
                @endif
            </div>

            @if($loan->l_status == 'borrowed')
                <div class="mt-6 pt-4 border-t space-y-2">
                    <a href="{{ route('loans.edit', $loan->l_id) }}" class="block w-full bg-yellow-600 hover:bg-yellow-700 text-white text-center font-medium py-2 px-4 rounded-lg">
                        Edit Loan
                    </a>
                    <form action="{{ route('loans.return', $loan->l_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg" onclick="return confirm('Mark as returned?')">
                            Return Books
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Books List -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Books ({{ $loan->books->count() }})</h2>
            <div class="space-y-4">
                @foreach($loan->books as $book)
                    <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-1">{{ $book->b_title }}</h3>
                                <p class="text-sm text-gray-600">by {{ $book->author->a_name }}</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="text-xs text-gray-500">ISBN: {{ $book->b_isbn }}</span>
                                    <span class="text-xs text-gray-500">{{ $book->category->c_name }}</span>
                                </div>
                            </div>
                            <a href="{{ route('books.show', $book->b_id) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                                View Book →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($loan->l_status == 'borrowed')
                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <p class="text-sm font-medium text-blue-900">📚 Reminder</p>
                    <p class="text-sm text-blue-700 mt-1">
                        Please return the books by {{ $loan->l_return_date->format('d M Y') }} to avoid late fees.
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection