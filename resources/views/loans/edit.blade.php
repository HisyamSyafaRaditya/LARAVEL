@extends('layouts.app')
@section('title', 'Edit Loan')
@section('content')
<div class="px-4 sm:px-0 max-w-4xl">
    <div class="mb-6"><a href="{{ route('loans.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Loan</h1>
        <form action="{{ route('loans.update', $loan->l_id) }}" method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Member *</label>
                    <select name="member_m_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($members as $member)
                            <option value="{{ $member->m_id }}" {{ old('member_m_id', $loan->member_m_id) == $member->m_id ? 'selected' : '' }}>
                                {{ $member->m_name }} ({{ $member->m_id }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Staff *</label>
                    <select name="staff_s_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($staff as $item)
                            <option value="{{ $item->s_id }}" {{ old('staff_s_id', $loan->staff_s_id) == $item->s_id ? 'selected' : '' }}>
                                {{ $item->s_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Loan Date *</label>
                    <input type="datetime-local" name="l_date" value="{{ old('l_date', $loan->l_date->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Return Date *</label>
                    <input type="datetime-local" name="l_return_date" value="{{ old('l_return_date', $loan->l_return_date->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                <p class="text-sm font-medium text-gray-700 mb-2">Books in this loan:</p>
                <ul class="list-disc list-inside text-sm text-gray-600">
                    @foreach($loan->books as $book)
                        <li>{{ $book->b_title }}</li>
                    @endforeach
                </ul>
                <p class="text-xs text-gray-500 mt-2">Note: Cannot modify books in existing loan</p>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('loans.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg">Update Loan</button>
            </div>
        </form>
    </div>
</div>
@endsection