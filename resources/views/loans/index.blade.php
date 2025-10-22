@extends('layouts.app')
@section('title', 'Loans')
@section('content')
<div class="px-4 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Loans</h1>
        <a href="{{ route('loans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">+ New Loan</a>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Loan ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Books</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Loan Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Return Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($loans as $loan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $loan->l_id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $loan->member ? $loan->member->m_name : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->books->count() }} book(s)</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->l_date ? $loan->l_date->format('d M Y') : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->l_return_date ? $loan->l_return_date->format('d M Y') : 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if($loan->isOverdue())
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Overdue</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $loan->l_status == 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($loan->l_status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <a href="{{ route('loans.show', $loan->l_id) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                            @if($loan->l_status == 'borrowed')
                                <a href="{{ route('loans.edit', $loan->l_id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                                <form action="{{ route('loans.return', $loan->l_id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-900 mr-3" onclick="return confirm('Return books?')">Return</button>
                                </form>
                            @endif
                            <form action="{{ route('loans.destroy', $loan->l_id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="px-6 py-4 text-center text-gray-500">No loans found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $loans->links() }}</div>
</div>
@endsection