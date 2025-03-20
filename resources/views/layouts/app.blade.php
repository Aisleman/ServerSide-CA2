<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Afrobeats Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gradient-to-r from-yellow-800 to-orange-700 py-5 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-6">
                <!-- Logo and Site Name -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/Afrobeats_Blog_Logo.png') }}" alt="Afrobeats Blog" class="h-14 w-auto rounded-lg shadow-lg">
                    </a>
                    <a href="{{ url('/') }}" class="text-2xl font-extrabold text-white no-underline ml-3 tracking-wide">
                        {{ config('app.name', 'Afrobeats Blog') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="space-x-6 text-white text-lg hidden md:flex">
                    <a href="/" class="{{ request()->is('/') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                        Home
                    </a>
                    <a href="/blogs" class="{{ request()->is('blogs') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                        Blog
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="{{ request()->is('register') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                                Register
                            </a>
                        @endif
                    @else
                        <div class="relative group">
                            <button class="focus:outline-none flex items-center space-x-2">
                                <span class="font-semibold">{{ Auth::user()->name }}</span>
                                <svg class="w-5 h-5" fill="white" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="absolute right-0 mt-2 w-40 bg-yellow-800 rounded-md shadow-lg hidden group-hover:block">
                                <a href="/profile" class="block px-4 py-2 text-white hover:bg-yellow-700">Profile</a>
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-white hover:bg-yellow-700"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endguest
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="w-8 h-8" fill="white" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 6h16M4 12h16m-7 6h7" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-yellow-800 text-white text-lg px-6 py-4">
                <a href="/" class="{{ request()->is('/') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                    Home
                </a>
                <a href="/blogs" class="{{ request()->is('blogs') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                    Blog
                </a>
                @guest
                    <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="{{ request()->is('register') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                            Register
                        </a>
                    @endif
                @else
                    <a href="/profile" class="block py-2 hover:text-yellow-300">Profile</a>
                    <a href="{{ route('logout') }}" class="block py-2 hover:text-yellow-300"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                @endguest
            </div>

            <!-- Mobile Menu Toggle Script -->
            <script>
                document.getElementById('mobile-menu-button').addEventListener('click', function() {
                    document.getElementById('mobile-menu').classList.toggle('hidden');
                });
            </script>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
