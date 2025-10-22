@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="min-h-screen bg-[#F7F8FC]">
    <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div class="flex-1">
                <h1 class="text-4xl font-extrabold text-slate-900">
                    Categories
                </h1>
                <p class="mt-3 text-base text-slate-600 max-w-2xl">
                    Organize and manage library's book categories
                </p>
            </div>
                    <a href="{{ route('categories.create') }}" 
                                class="group inline-flex items-center px-6 py-3 bg-[#1E3A8A] text-white text-sm font-medium rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-2 animate-pulse group-hover:animate-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                New Category
            </a>
        </div>

    <div class="bg-white rounded-2xl shadow-lg ring-1 ring-black/5 overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h2 class="text-xl font-semibold text-slate-900">All Categories</h2>
                    <div class="relative">
               <input type="text" 
                   placeholder="Search categories..." 
                   class="w-full sm:w-64 pl-10 pr-4 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50/75">
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Books</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</span>
                        </th>
                    </tr>
                </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($categories as $category)
                    <tr class="group hover:bg-slate-50 transition-all duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-800">
                                    {{ $category->c_id }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-slate-700 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-slate-900 group-hover:text-slate-900 transition-colors duration-200">
                                        {{ $category->c_name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $category->books_count > 0 
                                        ? 'bg-amber-50 text-amber-700' 
                                        : 'bg-slate-100 text-slate-700' }}">
                                    {{ $category->books_count }}
                                    <span class="ml-1">{{ Str::plural('book', $category->books_count) }}</span>
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600 line-clamp-2 group-hover:text-gray-900 transition-colors duration-200">
                                {{ $category->c_description ?: 'No description available' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="flex items-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <a href="{{ route('categories.show', $category->c_id) }}" 
                                   class="inline-flex items-center px-3 py-1 rounded-lg bg-slate-50 text-slate-800 hover:bg-slate-100 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View
                                </a>
                                          <a href="{{ route('categories.edit', $category->c_id) }}" 
                                              class="inline-flex items-center px-3 py-1 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->c_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                    <button type="submit" 
                        class="inline-flex items-center px-3 py-1 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 transition-colors duration-200"
                                            onclick="return confirm('Are you sure you want to delete this category? This action cannot be undone.')">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-r from-slate-200 to-amber-200 blur-xl opacity-18 animate-pulse"></div>
                                    <div class="relative">
                                        <svg class="w-16 h-16 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="mt-4 text-lg font-semibold text-gray-900">No categories yet</h3>
                                <p class="mt-2 text-sm text-gray-500 max-w-sm">Get started by creating your first category to organize your books effectively</p>
                                <div class="mt-8">
                                                <a href="{{ route('categories.create') }}" 
                                                    class="inline-flex items-center px-6 py-3 bg-amber-600 text-white text-sm font-medium rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200 ease-in-out group">
                                        <svg class="w-5 h-5 mr-2 animate-pulse group-hover:animate-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Create First Category
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    
            <div class="bg-white px-6 py-4 border-t border-gray-200">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection