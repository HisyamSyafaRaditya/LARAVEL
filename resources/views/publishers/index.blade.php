@extends('layouts.app')

@section('title', 'Publishers')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-slate-800 to-amber-600 bg-clip-text text-transparent mb-4">Publishers</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all publishers in the library system.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('publishers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                Add Publisher
            </a>
        </div>
    </div>

    <div class="mt-8">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($publishers as $publisher)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $publisher->p_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $publisher->p_name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $publisher->p_address }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('publishers.edit', $publisher->p_id) }}" 
                                               class="px-3 py-1.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg font-medium text-sm transition-all duration-200">
                                                Edit
                                            </a>
                                            <form action="{{ route('publishers.destroy', $publisher->p_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="px-3 py-1.5 text-red-700 bg-red-100 hover:bg-red-200 rounded-lg font-medium text-sm transition-all duration-200"
                                                        onclick="return confirm('Are you sure you want to delete this publisher?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No publishers found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if($publishers->hasPages())
                        <div class="px-6 py-4 border-t border-gray-200">
                            {{ $publishers->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection