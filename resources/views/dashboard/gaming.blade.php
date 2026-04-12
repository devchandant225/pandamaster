@extends('layouts.app')

@section('title', 'Dashboard - Panda Master VIP')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-navy-900 to-gray-900 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Balance Bar -->
        <div class="bg-gradient-to-r from-yellow-500 to-purple-500 rounded-lg p-6 mb-8 shadow-lg">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-black/30 rounded-lg p-4">
                    <p class="text-white text-sm">Balance</p>
                    <p class="text-3xl font-bold text-white">${{ number_format($player->balance, 2) }}</p>
                </div>
                <div class="bg-black/30 rounded-lg p-4">
                    <p class="text-white text-sm">Bonus Coins</p>
                    <p class="text-3xl font-bold text-white">${{ number_format($player->bonus_coins, 2) }}</p>
                </div>
                <div class="bg-black/30 rounded-lg p-4">
                    <p class="text-white text-sm">Level</p>
                    <p class="text-3xl font-bold text-white">{{ $player->level }}</p>
                </div>
                <div class="bg-black/30 rounded-lg p-4">
                    <p class="text-white text-sm">VIP Status</p>
                    <p class="text-2xl font-bold text-white capitalize">{{ ucfirst($player->vip_status) }}</p>
                </div>
            </div>
        </div>

        <!-- Featured Games -->
        @if($featuredGames->count() > 0)
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6">⭐ Featured Games</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($featuredGames as $game)
                        <x-game-card :game="$game" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Hot Games -->
        @if($hotGames->count() > 0)
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6">🔥 Hot Games</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($hotGames as $game)
                        <x-game-card :game="$game" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- New Games -->
        @if($newGames->count() > 0)
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6">✨ New Games</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($newGames as $game)
                        <x-game-card :game="$game" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Popular Games -->
        @if($popularGames->count() > 0)
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6">🎮 Most Popular</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($popularGames as $game)
                        <x-game-card :game="$game" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Recent Transactions -->
        @if($recentTransactions->count() > 0)
            <div class="bg-gray-800 rounded-lg p-6">
                <h2 class="text-2xl font-bold text-white mb-6">Recent Transactions</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-400 border-b border-gray-700">
                                <th class="pb-3">Date</th>
                                <th class="pb-3">Type</th>
                                <th class="pb-3">Amount</th>
                                <th class="pb-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentTransactions as $transaction)
                                <tr class="border-b border-gray-700">
                                    <td class="py-3 text-white">{{ $transaction->created_at->format('M d, Y') }}</td>
                                    <td class="py-3 text-white capitalize">{{ $transaction->type }}</td>
                                    <td class="py-3 font-bold {{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                                        ${{ number_format($transaction->amount, 2) }}
                                    </td>
                                    <td class="py-3">
                                        <span class="px-3 py-1 rounded-full text-sm font-semibold
                                            {{ $transaction->status === 'completed' ? 'bg-green-500/20 text-green-500' : 'bg-yellow-500/20 text-yellow-500' }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
