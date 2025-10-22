@extends('layouts.app')
@section('title', 'Add Author')
@section('content')
<div class="px-4 sm:px-0 max-w-2xl">
    <div class="mb-6"><a href="{{ route('authors.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Add New Author</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                    <input type="text" name="a_name" value="{{ old('a_name') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                    <input type="text" name="a_country" value="{{ old('a_country') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Biography</label>
                    <textarea name="a_biography" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('a_biography') }}</textarea>
                </div>
            </div>
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('authors.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection