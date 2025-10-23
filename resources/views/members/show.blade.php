@extends('layouts.app')

@section('title', 'Member Detail')

@section('content')
<div class="px-4 sm:px-0 animate-fade-in">
    <div class="mb-6">
        <a href="{{ route('members.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Members
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Member Info Card -->
        <div class="lg:col-span-1">
            <div class="glass-card hover:scale-105 transition-all duration-300">
                <div class="text-center mb-6">
                    <div class="inline-block relative">
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-5xl font-black shadow-2xl mx-auto animate-float">
                            {{ substr($member->m_name, 0, 1) }}
                        </div>
                        <span class="absolute bottom-2 right-2 px-3 py-1 text-xs font-bold rounded-full shadow-md
                            {{ $member->m_status == 'active' ? 'bg-gradient-to-r from-emerald-500 to-green-600 text-white ring-2 ring-emerald-300' : 'bg-gradient-to-r from-rose-500 to-red-600 text-white ring-2 ring-rose-300' }}">
                            {{ ucfirst($member->m_status) }}
                        </span>
                    </div>
                    <h2 class="text-2xl font-black text-gray-900 mt-4">{{ $member->m_name }}</h2>
                    <p class="text-gray-500 font-semibold text-sm">Member ID: {{ $member->m_id }}</p>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-xs text-gray-600 font-semibold">Email</p>
                                <p class="font-bold text-gray-900 text-sm">{{ $member->m_email }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-4 border border-emerald-100">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-xs text-gray-600 font-semibold">Phone</p>
                                <p class="font-bold text-gray-900 text-sm">{{ $member->m_phone }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border border-purple-100">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-purple-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-xs text-gray-600 font-semibold">Address</p>
                                <p class="font-bold text-gray-900 text-sm">{{ $member->m_address }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl p-4 border border-amber-100">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-amber-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-xs text-gray-600 font-semibold">Join Date</p>
                                <p class="font-bold text-gray-900 text-sm">{{ $member->m_join_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-2 mt-6">
                    <a href="{{ route('members.edit', $member->m_id) }}" class="flex-1 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white text-center font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 ring-2 ring-amber-300">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('members.destroy', $member->m_id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300" onclick="return confirm('Are you sure you want to delete this member?')">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Loan History -->
        <div class="lg:col-span-2">
            <div class="glass-card">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Loan History
                    </h2>
                    <span class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white text-sm font-bold rounded-full shadow-lg">
                        {{ $member->loans->count() }} Total
                    </span>
                </div>
                
                <div class="space-y-4">
                    @forelse($member->loans as $loan)
                        <div class="border-2 {{ $loan->l_status == 'borrowed' ? 'border-yellow-200 bg-gradient-to-r from-yellow-50 to-orange-50' : 'border-green-200 bg-gradient-to-r from-green-50 to-emerald-50' }} rounded-2xl p-5 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <span class="px-3 py-1 text-xs font-bold rounded-full
                                            {{ $loan->l_status == 'borrowed' ? 'bg-gradient-to-r from-yellow-400 to-orange-500 text-white' : 'bg-gradient-to-r from-green-400 to-emerald-500 text-white' }}">
                                            {{ ucfirst($loan->l_status) }}
                                        </span>
                                        <p class="font-bold text-gray-900">Loan ID: {{ $loan->l_id }}</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3 text-sm">
                                        <div class="flex items-center text-gray-700">
                                            <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="font-semibold">Loan:</span> {{ $loan->l_date->format('d M Y') }}
                                        </div>
                                        <div class="flex items-center text-gray-700">
                                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="font-semibold">Return:</span> {{ $loan->l_return_date->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('loans.show', $loan->l_id) }}" class="ml-4 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-sm font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                                    View
                                </a>
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    Books ({{ $loan->books->count() }}):
                                </p>
                                <ul class="space-y-1">
                                    @foreach($loan->books as $book)
                                        <li class="text-sm text-gray-700 font-medium bg-white/70 rounded-lg px-3 py-2">
                                            • {{ $book->b_title }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @if($loan->isOverdue())
                                <div class="mt-3 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-xl p-3 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                        <span class="font-bold text-sm">Overdue: {{ $loan->daysOverdue() }} days</span>
                                    </div>
                                    <span class="font-black text-lg">
                                        Fine: Rp {{ number_format($loan->calculateFine(), 0, ',', '.') }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-16">
                            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-gray-500 font-semibold text-lg">No loan history yet</p>
                            <p class="text-gray-400 text-sm mt-1">This member hasn't borrowed any books</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection