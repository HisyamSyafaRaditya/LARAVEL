@extends('layouts.app')

@section('title', 'Add New Member')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100/50 pt-16 pb-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-slate-800 to-amber-600 bg-clip-text text-transparent mb-3">Add New Member</h1>
            <p class="text-slate-600 text-lg">Register a new library member.</p>
        </div>

        <div class="bg-white/70 backdrop-blur-lg rounded-3xl shadow-xl shadow-slate-200/60 border border-white/20">
            <div class="p-8">
                <form action="{{ route('members.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div class="relative group">
                            <label for="m_name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                            <input type="text" name="m_name" id="m_name" value="{{ old('m_name') }}" 
                                class="block w-full px-4 py-3 rounded-xl text-slate-900 bg-white/60 border border-slate-200 
                                focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200
                                placeholder:text-slate-400 shadow-sm" 
                                placeholder="Enter full name" required>
                            @error('m_name')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="relative group">
                            <label for="m_email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                            <input type="email" name="m_email" id="m_email" value="{{ old('m_email') }}" 
                                class="block w-full px-4 py-3 rounded-xl text-slate-900 bg-white/60 border border-slate-200 
                                focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200
                                placeholder:text-slate-400 shadow-sm" 
                                placeholder="Enter email address" required>
                            @error('m_email')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="relative group">
                            <label for="m_phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                            <input type="tel" name="m_phone" id="m_phone" value="{{ old('m_phone') }}" 
                                class="block w-full px-4 py-3 rounded-xl text-slate-900 bg-white/60 border border-slate-200 
                                focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200
                                placeholder:text-slate-400 shadow-sm" 
                                placeholder="Enter phone number" required>
                            @error('m_phone')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="relative group">
                            <label for="m_address" class="block text-sm font-medium text-slate-700 mb-2">Address</label>
                            <textarea name="m_address" id="m_address" rows="3" 
                                class="block w-full px-4 py-3 rounded-xl text-slate-900 bg-white/60 border border-slate-200 
                                focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200
                                placeholder:text-slate-400 shadow-sm resize-none" 
                                placeholder="Enter complete address" required>{{ old('m_address') }}</textarea>
                            @error('m_address')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Join Date -->
                        <div class="relative group">
                            <label for="m_join_date" class="block text-sm font-medium text-slate-700 mb-2">Join Date</label>
                            <input type="date" name="m_join_date" id="m_join_date" value="{{ old('m_join_date', date('Y-m-d')) }}" 
                                class="block w-full px-4 py-3 rounded-xl text-slate-900 bg-white/60 border border-slate-200 
                                focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200
                                placeholder:text-slate-400 shadow-sm" required>
                            @error('m_join_date')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="relative group">
                            <label for="m_status" class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                            <select name="m_status" id="m_status" 
                                class="block w-full px-4 py-3 rounded-xl text-slate-900 bg-white/60 border border-slate-200 
                                focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200
                                shadow-sm" required>
                                <option value="">Select status</option>
                                <option value="active" {{ old('m_status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('m_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('m_status')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end items-center space-x-4 pt-6">
                        <a href="{{ route('members.index') }}" 
                            class="px-6 py-2.5 rounded-xl text-slate-700 bg-slate-100 hover:bg-slate-200 
                            font-semibold transition-all duration-200 shadow-sm hover:shadow focus:ring-2 
                            focus:ring-offset-2 focus:ring-slate-200">
                            Cancel
                        </a>
                        <button type="submit" 
                            class="px-6 py-2.5 rounded-xl text-white font-semibold
                            bg-gradient-to-r from-slate-800 to-amber-600 hover:from-slate-900 hover:to-amber-700
                            transition-all duration-200 shadow-lg shadow-amber-600/20 hover:shadow-xl 
                            hover:shadow-amber-600/30 focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                            Create Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            </div>
        </form>
    </div>
</div>
@endsection