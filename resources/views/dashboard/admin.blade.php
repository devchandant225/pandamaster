@extends('layouts.app')

@section('title', 'Admin Dashboard - 888Realty')

@section('content')
<div class="min-h-screen bg-gray-50 flex">
    <x-dashboard-sidebar active="dashboard" />
    
    <div class="flex-1 lg:pl-64">
        <!-- Header -->
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-40">
            <h1 class="text-xl font-bold text-gray-900">Admin Overview</h1>
            <div class="flex items-center gap-4">
                <button class="p-2 text-gray-400 hover:text-[#D4AF37] transition-colors relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden border-2 border-[#D4AF37]">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=D4AF37&color=000" alt="Avatar">
                </div>
            </div>
        </header>
        
        <main class="p-8">
            <!-- Top Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="text-3xl font-bold mb-1">{{ $stats['totalLeads'] }}</div>
                    <div class="text-blue-100">Total Leads</div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <span class="px-2 py-1 bg-white/20 text-xs font-bold rounded-full">+{{ $stats['newLeadsToday'] }}</span>
                    </div>
                    <div class="text-3xl font-bold mb-1">{{ $stats['newLeadsToday'] }}</div>
                    <div class="text-green-100">New Leads Today</div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="text-3xl font-bold mb-1">{{ $stats['activeAgents'] }}</div>
                    <div class="text-purple-100">Active Agents</div>
                </div>

                <div class="bg-gradient-to-br from-[#D4AF37] to-[#F4D03F] text-black rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-black/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-3xl font-bold mb-1">{{ $stats['dealsClosed'] }}</div>
                    <div class="text-gray-900 font-bold">Deals Closed</div>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mb-8">
                <!-- Recent Leads -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Recent Leads
                            </h2>
                            <a href="#" class="text-sm font-bold text-[#D4AF37] hover:underline">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Lead</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">City</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Agent</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 text-sm">
                                    @foreach($recentLeads as $lead)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            <div class="font-bold">{{ $lead->name }}</div>
                                            <div class="text-gray-500">{{ $lead->phone }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-600 capitalize">{{ $lead->city }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold {{ $lead->status === 'new' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                {{ ucfirst($lead->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $lead->assignedAgent ? $lead->assignedAgent->name : 'Unassigned' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Top Agents -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden h-full">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                Top Agents
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            @foreach($topAgents as $agent)
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all border border-transparent hover:border-[#D4AF37]/20">
                                <div class="w-12 h-12 rounded-full bg-[#D4AF37] flex items-center justify-center text-black font-bold">
                                    {{ substr($agent->name, 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <div class="font-bold text-gray-900">{{ $agent->name }}</div>
                                    <div class="text-xs text-gray-500 capitalize">{{ $agent->city ?? 'Vancouver' }}</div>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-[#D4AF37]">{{ $agent->performance_score }}</div>
                                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Score</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Listings -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-xl font-bold flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Pending Listings
                    </h2>
                    <a href="#" class="text-sm font-bold text-[#D4AF37] hover:underline">View All Requests</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Property</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">City</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Price</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse($pendingListings as $listing)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-bold">{{ $listing->title }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $listing->city->name }}</td>
                                <td class="px-6 py-4 font-bold text-[#D4AF37]">${{ number_format($listing->price) }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="px-3 py-1 bg-green-500 text-white rounded font-bold text-xs hover:bg-green-600">Approve</button>
                                        <button class="px-3 py-1 bg-red-500 text-white rounded font-bold text-xs hover:bg-red-600">Reject</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">No pending listings at the moment.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
