<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Afrobeats Blog') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app">
    <header class="bg-gradient-to-r from-yellow-800 to-orange-700 py-5 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/Afrobeats_Blog_Logo.png') }}" alt="Afrobeats Blog" class="h-14 w-auto rounded-lg shadow-lg">
                </a>
                <a href="{{ url('/') }}" class="text-2xl font-extrabold text-white no-underline ml-3 tracking-wide">
                    {{ config('app.name', 'Afrobeats Blog') }}
                </a>
            </div>

            <!-- Desktop Nav -->
            <nav id="main-menu" class="hidden md:flex items-center space-x-6 text-white text-lg">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300' }}">
                    Home
                </a>
                <a href="{{ route('blogs.index') }}" class="{{ request()->routeIs('blogs.index') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300' }}">
                    Blog
                </a>
                <a href="{{ route('artists.index') }}" class="{{ request()->routeIs('artists.index') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300' }}">
                    Top 20
                </a>

                @auth
                    @php
                        $pendingCount = \App\Models\Post::where('status', 'pending')->count();
                    @endphp

                    @if (in_array(Auth::user()->role, ['admin', 'editor']))
                        <a href="{{ route('blogs.review') }}" class="{{ request()->is('blogs/review') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300' }}">
                            Review Blogs
                            @if($pendingCount > 0)
                                <span class="ml-1 bg-red-600 text-white text-xs px-2 py-0.5 rounded-full">
                                    {{ $pendingCount }}
                                </span>
                            @endif
                        </a>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="hover:text-yellow-300">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-yellow-300">Register</a>
                    @endif
                @else
                    <div class="relative inline-block text-left">
                        <button id="dropdown-toggle" class="font-semibold text-white hover:underline focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 inline-block ml-1" fill="white" viewBox="0 0 20 20">
                                <path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" />
                            </svg>
                        </button>

                        <div id="dropdown-menu" class="absolute right-0 mt-2 w-44 bg-yellow-800 rounded shadow-lg hidden z-50">
                            <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-white hover:bg-yellow-700">Profile</a>

                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('users.index') }}" class="block px-4 py-2 text-white hover:bg-yellow-700">View Users</a>
                            @endif

                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-white hover:bg-yellow-700"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>
</div>

<!-- Dropdown Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("dropdown-toggle");
        const menu = document.getElementById("dropdown-menu");

        if (toggle && menu) {
            toggle.addEventListener("click", function (e) {
                e.stopPropagation();
                menu.classList.toggle("hidden");
            });

            document.addEventListener("click", function (e) {
                if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                    menu.classList.add("hidden");
                }
            });
        }
    });
</script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
