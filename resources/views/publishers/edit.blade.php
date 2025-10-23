@extends('layouts.app') 
@section('title', 'Edit Publisher')

@section('content')
<div class="px-4 sm:px-0 max-w-3xl mx-auto">
    {{-- Back link --}}
    <div class="mb-6">
        <a href="{{ route('publishers.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">
            ← Back
        </a>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-xl shadow p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit Publisher</h1>
        <p class="text-gray-600 mb-6">Update publisher information</p>

        {{-- Form --}}
        <form action="{{ route('publishers.update', $publisher->p_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Publisher Name --}}
            <div>
                <label for="p_name" class="block text-sm font-medium text-gray-700 mb-1">
                    Publisher Name <span class="text-red-500">*</span>
                </label>
                <input id="p_name" type="text" name="p_name"
                       value="{{ old('p_name', $publisher->p_name) }}"
                       placeholder="e.g. O'Reilly Media"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                       required>
                @error('p_name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label for="p_address" class="block text-sm font-medium text-gray-700 mb-1">
                    Address
                </label>
                <textarea id="p_address" name="p_address" rows="3"
                          placeholder="Publisher address or description"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('p_address', $publisher->p_address) }}</textarea>
                @error('p_address')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label for="p_phone" class="block text-sm font-medium text-gray-700 mb-1">
                    Phone
                </label>
                <input id="p_phone" type="text" name="p_phone"
                       value="{{ old('p_phone', $publisher->p_phone) }}"
                       placeholder="e.g. +62 812 3456 7890"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('p_phone')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('publishers.index') }}"
                   class="px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:opacity-90 text-white font-medium rounded-lg shadow transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
