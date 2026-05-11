@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Welcome banner -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-600 mt-1">Welcome back, {{ Auth::user()->name ?? 'Admin' }}! Here's what's happening with your business today.</p>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat cards -->
        ...
    </div>
    
    <!-- Charts and recent activity row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        ...
    </div>
</div>
@endsection