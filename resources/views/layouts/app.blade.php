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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownToggle = document.getElementById("dropdown-toggle");
        const dropdownMenu = document.getElementById("dropdown-menu");

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener("click", function (event) {
                event.stopPropagation(); // Prevent immediate close
                dropdownMenu.classList.toggle("hidden");
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function (event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        } else {
            console.error("Dropdown elements not found");
        }
    });
</script>

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
                <nav id="main-menu" class="space-x-6 text-white text-lg hidden md:flex md:items-center md:space-x-6 flex-col md:flex-row bg-yellow-800 md:bg-transparent absolute md:relative top-full left-0 w-full md:w-auto shadow-lg md:shadow-none p-6 md:p-0">
                    <a href="/" class="{{ request()->is('/') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                        Home
                    </a>
                    <a href="/blogs" class="{{ request()->is('blogs') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                        Blog
                    </a>
                    <a href="{{ route('top50') }}" class="{{ request()->is('top50') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                        Top 50
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
                        <div class="relative inline-block text-left">
                            <a href="{{ route('profile') }}" class="font-semibold hover:underline text-white">
                                {{ Auth::user()->name }}
                            </a>

                            <!-- Dropdown Button -->
                            <button id="dropdown-toggle" class="ml-2 focus:outline-none">
                                <svg class="w-5 h-5" fill="white" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="dropdown-menu" class="absolute right-0 mt-2 w-40 bg-yellow-800 rounded-md shadow-lg hidden">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-white hover:bg-yellow-700">Profile</a>
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
            <div id="mobile-menu" class="hidden bg-yellow-800 text-white text-lg px-6 py-4">
                <a href="/" class="{{ request()->is('/') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                    Home
                </a>
                <a href="/blogs" class="{{ request()->is('blogs') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                    Blog
                </a>
                <a href="{{ route('top50') }}" class="{{ request()->is('top50') ? 'text-yellow-300 font-bold border-b-2 border-yellow-300' : 'hover:text-yellow-300 transition duration-300' }}">
                    Top 50
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
                document.addEventListener("DOMContentLoaded", function () {
                    const menuButton = document.getElementById("menu-button");
                    const mainMenu = document.getElementById("main-menu");
                    const dropdownToggle = document.getElementById("dropdown-toggle");
                    const dropdownMenu = document.getElementById("dropdown-menu");

                    // Mobile menu toggle
                    menuButton.addEventListener("click", function () {
                        mainMenu.classList.toggle("hidden");
                    });

                    // Dropdown toggle
                    dropdownToggle.addEventListener("click", function (event) {
                        event.stopPropagation(); // Prevent closing immediately
                        dropdownMenu.classList.toggle("hidden");
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener("click", function (event) {
                        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                            dropdownMenu.classList.add("hidden");
                        }
                    });
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
