@extends('layouts.app')
@section('title', 'Staff Detail')
@section('content')
<div class="px-4 sm:px-0">
    <div class="mb-6"><a href="{{ route('staff.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">← Back</a></div>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Staff Information</h2>
        <div class="grid grid-cols-2 gap-4">
            <div><p class="text-sm text-gray-600">Staff ID</p><p class="font-semibold">{{ $staff->s_id }}</p></div>
            <div><p class="text-sm text-gray-600">Name</p><p class="font-semibold">{{ $staff->s_name }}</p></div>
            <div><p class="text-sm text-gray-600">Email</p><p class="font-semibold">{{ $staff->s_email }}</p></div>
            <div><p class="text-sm text-gray-600">Phone</p><p class="font-semibold">{{ $staff->s_phone }}</p></div>
            <div><p class="text-sm text-gray-600">Position</p><p class="font-semibold">{{ $staff->s_position }}</p></div>
            <div><p class="text-sm text-gray-600">Join Date</p><p class="font-semibold">{{ $staff->s_join_date->format('d M Y') }}</p></div>
        </div>
    </div>
</div>
@endsection