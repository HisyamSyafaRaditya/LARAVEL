@extends('layouts.app')
@section('title', 'Create Category')
@section('content')
<div class="min-h-full bg-gray-50/50">
    <div class="py-6">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-3">
                <a href="{{ route('categories.index') }}" 
                   class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Categories
                </a>
            </div>

            <div class="mt-4">
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Create New Category</h1>
                <p class="mt-2 text-sm text-gray-600">Add a new category to organize your books</p>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 rounded-lg">
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6 p-6">
                @csrf
            
                <div class="space-y-6">
                    <div>
                        <label for="c_name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" name="c_name" id="c_name" 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('c_name') }}" 
                                placeholder="Enter category name"
                                required>
                        </div>
                        @error('c_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="c_description" class="block text-sm font-medium text-gray-700">
                            Description
                            <span class="text-gray-400 font-normal ml-1">(optional)</span>
                        </label>
                        <div class="mt-1">
                            <textarea name="c_description" id="c_description" rows="4" 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Enter category description">{{ old('c_description') }}</textarea>
                        </div>
                        @error('c_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('categories.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Create Category
                    </button>
                </div>
        </form>
    </div>
</div>
@endsection