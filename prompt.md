Illuminate\Database\QueryException
vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'orion.team_members' doesn't exist (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: orion, SQL: select * from `team_members` order by `sort_order` asc)

LARAVEL
12.56.0
PHP
8.2.30
UNHANDLED
CODE 42S02
500
GET
http://orionstars.joomni.com/about

Exception trace
9 vendor frames

Illuminate\Database\Eloquent\Builder->get()
resources/views/components/team-section.blade.php:1

1@php
2    $members = \App\Models\TeamMember::orderBy('sort_order')->get();
3@endphp
4
5@if($members->count() > 0)
6<section class="py-20 bg-gray-50">
7    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
8        <div class="text-center mb-16">
9            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center">
10                Meet Our <span class="text-[#D4AF37]">Leadership Team</span>
11            </h2>
12            <p class="text-xl text-gray-600">
13                Experienced professionals dedicated to your success
14            </p>
15        </div>
16
17        <div class="grid md:grid-cols-3 gap-8">
18