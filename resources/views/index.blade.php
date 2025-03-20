@extends('layouts.app')

@section('content')
    <!-- Hero Section with Background Image -->
    <div class="relative bg-cover bg-center h-screen flex items-center justify-center text-center text-white"
         style="background-image: url('{{ asset('images/hero-image.png') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Dark Overlay for Professional Look -->
        <div class="relative z-10">
            <h1 class="text-5xl font-extrabold drop-shadow-lg">Feel the Rhythm of Afrobeats</h1>
            <p class="mt-4 text-lg drop-shadow-lg">Discover the latest in Afrobeats music, culture, and trends.</p>
            <a href="/blogs" class="mt-6 inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg">
                Explore Blogs
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/impact-afro.jpg') }}" width="700" alt="Afrobeats Dance">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                The Sound of Africa, The Pulse of the World
            </h2>
            <p class="py-8 text-gray-500">
                Afrobeats is more than music—it's a movement. From Lagos to the world, experience the beats and stories shaping the culture.
            </p>
            <a href="/blogs" class="uppercase bg-orange-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Read More
            </a>
        </div>
    </div>

    <!-- Expertise Section -->
    <div class="bg-gradient-to-r from-black to-gray-900 py-16 text-center text-white">
        <h2 class="text-3xl font-extrabold tracking-wide uppercase">What We Cover</h2>
        <div class="w-24 h-1 bg-orange-500 mx-auto mt-3 mb-8"></div> <!-- Accent Line -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-3/4 mx-auto">
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
                <h3 class="text-xl font-bold uppercase">Afrobeats History</h3>
            </div>
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
                <h3 class="text-xl font-bold uppercase">Artist Spotlights</h3>
            </div>
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
                <h3 class="text-xl font-bold uppercase">Music Reviews</h3>
            </div>
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
                <h3 class="text-xl font-bold uppercase">Trending Tracks</h3>
            </div>
        </div>
    </div>

    <!-- Quote Section -->
    <div class="bg-gray-100 py-12 text-center">
        <blockquote class="text-2xl italic font-semibold text-gray-800 w-3/4 mx-auto leading-relaxed">
            "	African art is functional, it serves a purpose. Never dormant, nor a means to collect the largest cheering section. But a healing source of joy, spreading positive vibrations."
        </blockquote>
        <span class="text-gray-600 block mt-4 text-lg font-bold">— Mos Def</span>
    </div>
@endsection
