@extends('layouts.dashboard', ['active' => 'games'])

@section('title', 'Add New Game')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">
                🎮 Add New Game
            </h1>
            <p class="text-gray-400 mt-2">Add a new game to your gaming library</p>
        </div>

        @php
            $game = new \App\Models\Game();
            $game->is_active = true;
        @endphp

        <!-- Include edit form with empty game -->
        @include('admin.games.edit', ['game' => $game])
    </div>
</div>
@endsection
