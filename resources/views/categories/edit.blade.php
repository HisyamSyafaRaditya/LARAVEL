@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')
<div class="px-4 sm:px-0">
    <div class="flex items-center mb-6">
        <a href="{{ route('categories.index') }}" class="text-gray-500 hover:text-gray-700 mr-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-gray-900">Edit Category</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('categories.update', $category->c_id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="c_name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="c_name" id="c_name" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    value="{{ old('c_name', $category->c_name) }}" required>
                @error('c_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="c_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="c_description" id="c_description" rows="4" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('c_description', $category->c_description) }}</textarea>
                @error('c_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" class="bg-gray-100 text-gray-800 hover:bg-gray-200 font-medium py-2 px-4 rounded-lg mr-2">Cancel</a>
                <button type="submit" class="bg-yellow-600 text-white hover:bg-yellow-700 font-medium py-2 px-4 rounded-lg">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection