@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<div class="px-4 sm:px-0 max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('members.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">
            ← Back to Members
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Member</h1>

        <form action="{{ route('members.update', $member->m_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="m_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" 
                           name="m_name" 
                           id="m_name" 
                           value="{{ old('m_name', $member->m_name) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('m_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="m_email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                    <input type="email" 
                           name="m_email" 
                           id="m_email" 
                           value="{{ old('m_email', $member->m_email) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('m_email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="m_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone *</label>
                    <input type="text" 
                           name="m_phone" 
                           id="m_phone" 
                           value="{{ old('m_phone', $member->m_phone) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('m_phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="m_join_date" class="block text-sm font-medium text-gray-700 mb-2">Join Date *</label>
                    <input type="date" 
                           name="m_join_date" 
                           id="m_join_date" 
                           value="{{ old('m_join_date', $member->m_join_date->format('Y-m-d')) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    @error('m_join_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="m_status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select name="m_status" 
                            id="m_status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                        <option value="active" {{ old('m_status', $member->m_status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('m_status', $member->m_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('m_status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="m_address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                <textarea name="m_address" 
                          id="m_address" 
                          rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          required>{{ old('m_address', $member->m_address) }}</textarea>
                @error('m_address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('members.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                    Update Member
                </button>
            </div>
        </form>
    </div>
</div>
@endsection