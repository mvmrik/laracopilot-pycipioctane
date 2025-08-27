@extends('layouts.admin')

@section('title', 'Users Management - CryptoPlatform Admin')
@section('page-title', 'Users Management')
@section('page-description', 'Manage platform users and their crypto accounts')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="admin-card rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Total Users</p>
                <p class="text-3xl font-bold text-slate-800">{{ count($users) }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="admin-card rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Active Users</p>
                <p class="text-3xl font-bold text-slate-800">{{ collect($users)->where('status', 'Active')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="admin-card rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Total Balance</p>
                <p class="text-3xl font-bold text-slate-800">${{ number_format(collect($users)->sum('balance'), 0) }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="admin-card rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Avg Balance</p>
                <p class="text-3xl font-bold text-slate-800">${{ number_format(collect($users)->avg('balance'), 0) }}</p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="admin-card rounded-2xl shadow-lg">
    <div class="p-6 border-b border-slate-200">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-slate-800">User Accounts</h2>
            <button class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                Add New User
            </button>
        </div>
    </div>

    <div class="p-6">
        <!-- Search and Filters -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
            <div class="flex-1">
                <input type="text" placeholder="Search users..." class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
            <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>All Balances</option>
                <option>High Balance</option>
                <option>Low Balance</option>
            </select>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="text-left py-3 px-4 font-semibold text-slate-700">User</th>
                        <th class="text-left py-3 px-4 font-semibold text-slate-700">Email</th>
                        <th class="text-left py-3 px-4 font-semibold text-slate-700">Balance</th>
                        <th class="text-left py-3 px-4 font-semibold text-slate-700">Status</th>
                        <th class="text-left py-3 px-4 font-semibold text-slate-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b border-slate-100 hover:bg-slate-50">
                        <td class="py-4 px-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($user['name'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-800">{{ $user['name'] }}</p>
                                    <p class="text-sm text-slate-600">ID: {{ $user['id'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-slate-800">{{ $user['email'] }}</p>
                        </td>
                        <td class="py-4 px-4">
                            <p class="font-semibold text-slate-800">${{ number_format($user['balance'], 2) }}</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $user['status'] === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user['status'] }}
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center space-x-2">
                                <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </button>
                                <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-slate-600">Showing {{ count($users) }} of {{ count($users) }} users</p>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-slate-300 rounded text-sm hover:bg-slate-50">Previous</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded text-sm">1</button>
                <button class="px-3 py-1 border border-slate-300 rounded text-sm hover:bg-slate-50">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection