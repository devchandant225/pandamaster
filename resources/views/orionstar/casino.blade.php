@extends('layouts.app')

@section('title', 'Panda Master Casino with Fish Games, Panda Slots and Real Money Gaming Online')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950 text-center">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-black mb-8 uppercase tracking-tighter animate-fade-in-up">
                Panda Master Casino
            </h1>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                Welcome to the Panda Master casino. Fish games, panda slots, table games, and real money rewards are all here. Panda Master online casino gives you the kind of experience that keeps players coming back.
            </p>
            <div class="animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="px-12 py-5 bg-yellow-500 text-black text-2xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 shadow-lg uppercase">Play Casino Games Now</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- What is Casino -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is the Panda Master Casino?</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Panda Master casino is a social casino platform where you play fish games, slot machines, and sweepstakes games to earn real cash prizes. It operates on a sweepstakes model that is popular and legal across most of the US, meaning players can participate without the legal complexity of traditional online gambling.</p>
                    <p>The Panda Master online casino experience is designed to feel immersive and fair. The games use a Random Number Generator (RNG) system to ensure fair play, and the platform uses end-to-end encryption to keep every transaction and account secure. Thousands of players across the US use it regularly and trust it for real money gaming.</p>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                <div class="text-8xl mb-6">🎰</div>
                <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Safe & Fair</div>
            </div>
        </section>

        <!-- Fish Games -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
            <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Fish Games, The Heart of the Panda Master Casino</h2>
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>The Panda Master fish game is what made the platform famous. Fish shooting games are skill-based, which means the better you get, the more you earn. You pick a weapon, target fish of different sizes and point values, and fire away. Bigger fish carry bigger rewards, and some of the boss fish characters offer huge payouts when you take them down.</p>
                    <p>You can play the fish game solo or in a multiplayer room with other players online. The multiplayer option is especially popular because there is a real competitive edge to it. You are racing against other players to take down the same fish, so every shot counts.</p>
                </div>
                <div>
                    <a href="{{ route('orionstar.fish-games') }}" class="inline-block w-full bg-purple-600 text-white text-center py-6 rounded-2xl text-2xl font-black hover:bg-purple-500 transition-colors uppercase tracking-tighter">Play Fish Games</a>
                </div>
            </div>
        </section>

        <!-- Panda Slots -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <a href="{{ route('orionstar.slot-games') }}" class="inline-block w-full bg-yellow-500 text-black text-center py-6 rounded-2xl text-2xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter">Play Panda Slots</a>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Panda Slots, Spin for Real Money Rewards</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>The panda slots on this platform are a huge part of what the casino is known for. You will find classic three-reel slot machines for straightforward, fast gameplay, and more complex video slots with bonus rounds, free spins, and multipliers for players who want more depth.</p>
                    <p>Panda Master casino slots include titles like Fruit Tycoon, which combines fast-paced action with slot mechanics. The jackpots on some of the video slots are progressive, which means they grow over time and can reach significant amounts before someone hits them.</p>
                </div>
            </div>
        </section>

        <!-- Table & Strategy -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl text-center">
            <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Table and Board Games, For Players Who Like Strategy</h2>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                Not every casino player is after the fish games or slots. Panda Master casino also includes table and board games that require a bit more thought and strategy. These are great for players who want a slower-paced game where skill and decision-making actually matter.
            </p>
            <p class="text-gray-400 leading-relaxed italic">
                The table game options add depth to the overall Panda Master online casino offering and make it a platform that caters to more than just one type of player.
            </p>
        </section>

        <!-- Bonuses & Promos -->
        <section class="bg-gradient-to-br from-yellow-500/10 to-purple-500/10 border border-white/10 rounded-[3rem] p-12 lg:p-16">
            <h2 class="text-4xl font-black mb-8 text-center uppercase tracking-tighter">Casino Bonuses and Promotions</h2>
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Panda Master casino is generous with its bonuses. New players get a welcome bonus when they sign up through a distributor. Your first deposit comes with a 50 percent bonus on top. The second and third deposits each come with a 20 percent bonus. That means if you put in 100 on your first deposit, you are playing with 150 straight away.</p>
                    <p>On top of the deposit bonuses, there are daily free spins, weekly promotions, and a referral program that pays you when friends sign up and play through your link.</p>
                </div>
                <div class="text-center">
                    <div class="text-7xl mb-6">🎁</div>
                    <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block bg-yellow-500 text-black px-12 py-5 rounded-2xl text-2xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Claim Your Casino Bonus</a>
                </div>
            </div>
        </section>

        <!-- Real Money Play -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
            <h2 class="text-3xl font-black mb-12 text-center uppercase tracking-tighter">How to Play Panda Master Casino for Real Money</h2>
            <div class="max-w-4xl mx-auto">
                <ol class="space-y-6 text-gray-400">
                    <li class="flex gap-4">
                        <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">1</span>
                        <span>Set up your account through our trusted distributor on Facebook.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">2</span>
                        <span>Log in to the app or the browser version of the Panda Master online casino.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">3</span>
                        <span>Navigate to the deposit section in your account dashboard.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">4</span>
                        <span>Choose your preferred payment method: Cash App, e-wallet, credit or debit card, or bank transfer.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">5</span>
                        <span>Enter the amount you want to add and confirm the transaction.</span>
                    </li>
                </ol>
                <p class="mt-8 text-gray-400 leading-relaxed text-center">When you want to withdraw your winnings, the process is just as simple. Go to the withdrawal section, enter the amount, choose your payment method, and the funds are processed quickly. Most withdrawals are completed within minutes.</p>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Panda Master a real casino?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Panda Master casino operates as a social casino using a sweepstakes model. Players can win real cash prizes. The platform is popular across the US and trusted by thousands of regular players.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I play Panda Master casino play online?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        You can play Panda Master casino play online through the browser-based web version or the downloaded app. Log in with your account credentials and the full casino game lobby is available to you straight away.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What are panda slots?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Panda slots are the slot machine games available on the Panda Master casino platform. They include classic three-reel games and more advanced video slots with bonus features, free spins, and growing jackpots.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I deposit and withdraw money?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        You can deposit and withdraw through Cash App, e-wallets, credit and debit cards, and bank transfers. Deposits are processed instantly and withdrawals are typically completed within minutes.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Are the casino games fair?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 5 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 5" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. All games on Panda Master online casino use a certified RNG system to ensure every outcome is random and fair. The platform also uses end-to-end encryption to protect every transaction and account.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 6 ? null : 6" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I play the casino games on my phone?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 6 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 6" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The Panda Master casino is fully accessible on Android phones and tablets, iPhone and iPad, and through the browser on any device. The mobile experience is smooth and the game controls are designed for touchscreens.
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
@endsection
