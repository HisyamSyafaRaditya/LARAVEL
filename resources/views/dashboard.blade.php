@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="px-4 sm:px-0">
    <!-- Header Section -->
    <div class="mb-8 animate-fade-in">
        <h1 class="text-4xl font-extrabold bg-gradient-to-r from-slate-800 to-amber-600 bg-clip-text text-transparent mb-2">Dashboard</h1>
        <p class="text-gray-600 font-medium">Welcome back, <span class="font-bold text-gray-800">{{ Auth::user()->name }}</span>! Here's your library overview.</p>
    </div>

    <!-- Quick Actions Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-slide-up">
        <a href="{{ route('loans.create') }}" class="group relative overflow-hidden bg-gradient-to-br from-slate-800 to-amber-600 rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="absolute inset-0 bg-white/10 transform -skew-y-6 group-hover:skew-y-0 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Quick Action</p>
                    <h3 class="text-white text-2xl font-black mt-2">New Loan</h3>
                    <p class="text-white/70 text-sm mt-1">Create a new book loan</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
            </div>
        </a>

        <a href="{{ route('books.create') }}" class="group relative overflow-hidden bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="absolute inset-0 bg-white/10 transform -skew-y-6 group-hover:skew-y-0 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Quick Action</p>
                    <h3 class="text-white text-2xl font-black mt-2">Add Book</h3>
                    <p class="text-white/70 text-sm mt-1">Add new book to library</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </a>

        <a href="{{ route('members.create') }}" class="group relative overflow-hidden bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="absolute inset-0 bg-white/10 transform -skew-y-6 group-hover:skew-y-0 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Quick Action</p>
                    <h3 class="text-white text-2xl font-black mt-2">Add Member</h3>
                    <p class="text-white/70 text-sm mt-1">Register new member</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
            </div>
        </a>
    </div>

    <!-- Statistics Cards with Gradient & Animation -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Books -->
        <div class="stat-card from-blue-500 to-indigo-600 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Total Books</p>
                    <p class="text-5xl font-black text-white mt-2">{{ $stats['total_books'] }}</p>
                    <p class="text-white/70 text-sm mt-2 font-medium">{{ $stats['available_books'] }} available</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Members -->
        <div class="stat-card from-emerald-500 to-teal-600 animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Total Members</p>
                    <p class="text-5xl font-black text-white mt-2">{{ $stats['total_members'] }}</p>
                    <p class="text-white/70 text-sm mt-2 font-medium">Active members</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Loans -->
        <div class="stat-card from-amber-500 to-orange-600 animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Active Loans</p>
                    <p class="text-5xl font-black text-white mt-2">{{ $stats['active_loans'] }}</p>
                    <p class="text-white/70 text-sm mt-2 font-medium">Total: {{ $stats['total_loans'] }}</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Overdue Loans -->
        <div class="stat-card from-red-500 to-pink-600 animate-slide-up" style="animation-delay: 0.4s;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-semibold uppercase tracking-wide">Overdue Loans</p>
                    <p class="text-5xl font-black text-white mt-2">{{ $stats['overdue_loans'] }}</p>
                    <p class="text-white/70 text-sm mt-2 font-medium">{{ $stats['overdue_loans'] > 0 ? 'Needs attention!' : 'All good!' }}</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 {{ $stats['overdue_loans'] > 0 ? 'animate-pulse' : '' }}">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Stats with Glass Effect -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <a href="{{ route('authors.index') }}" class="glass-card group hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Authors</p>
                    <p class="text-3xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">{{ $stats['total_authors'] }}</p>
                </div>
                <svg class="w-10 h-10 text-blue-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
        </a>
        <a href="{{ route('categories.index') }}" class="glass-card group hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Categories</p>
                    <p class="text-3xl font-black bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">{{ $stats['total_categories'] }}</p>
                </div>
                <svg class="w-10 h-10 text-emerald-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
        </a>
        <a href="{{ route('publishers.index') }}" class="glass-card group hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Publishers</p>
                    <p class="text-3xl font-black bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">{{ $stats['total_publishers'] }}</p>
                </div>
                <svg class="w-10 h-10 text-amber-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
        </a>
        <a href="{{ route('staff.index') }}" class="glass-card group hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Staff</p>
                    <p class="text-3xl font-black bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">{{ $stats['total_staff'] }}</p>
                </div>
                <svg class="w-10 h-10 text-pink-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Loans with Modern Design -->
        <div class="glass-card animate-slide-up" style="animation-delay: 0.5s;">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Recent Loans
                </h2>
                <span class="px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-500 text-white text-xs font-bold rounded-full shadow-lg">{{ $recent_loans->count() }}</span>
            </div>
            <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
                @forelse($recent_loans as $loan)
                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300 hover:scale-102">
                        <div class="flex-1">
                            <p class="font-bold text-gray-900">{{ $loan->member->m_name }}</p>
                            <p class="text-sm text-gray-600 font-medium">{{ $loan->books->count() }} book(s)</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $loan->l_date->format('d M Y, H:i') }}</p>
                        </div>
                        <span class="px-4 py-2 text-xs font-bold rounded-xl shadow-sm
                            {{ $loan->l_status == 'borrowed' ? 'bg-gradient-to-r from-yellow-400 to-orange-500 text-white' : 'bg-gradient-to-r from-green-400 to-emerald-500 text-white' }}">
                            {{ ucfirst($loan->l_status) }}
                        </span>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="text-gray-500 font-medium">No recent loans</p>
                    </div>
                @endforelse
            </div>
            @if($recent_loans->count() > 0)
                <a href="{{ route('loans.index') }}" class="block text-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-xl mt-6 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    View All Loans →
                </a>
            @endif
        </div>

        <!-- Overdue Loans Alert with Modern Design -->
        <div class="glass-card animate-slide-up" style="animation-delay: 0.6s;">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent flex items-center">
                    <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    Overdue Loans
                </h2>
                @if($overdue_loans->count() > 0)
                    <span class="px-3 py-1 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold rounded-full animate-pulse shadow-lg">{{ $overdue_loans->count() }}</span>
                @endif
            </div>
            <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
                @forelse($overdue_loans as $loan)
                    <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="font-bold text-gray-900 text-lg">{{ $loan->member->m_name }}</p>
                                <div class="mt-2 space-y-1">
                                    @foreach($loan->books as $book)
                                        <p class="text-sm text-gray-700 font-medium">• {{ $book->b_title }}</p>
                                    @endforeach
                                </div>
                                <div class="flex items-center space-x-3 mt-3">
                                    <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">
                                        {{ $loan->daysOverdue() }} days overdue
                                    </span>
                                    <span class="text-sm text-red-600 font-bold">
                                        Fine: Rp {{ number_format($loan->calculateFine(), 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 text-green-500 mx-auto mb-4 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xl font-bold text-gray-700 mb-2">No overdue loans! 🎉</p>
                        <p class="text-gray-500 font-medium">All books are returned on time</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection