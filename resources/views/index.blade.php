@extends('layouts.app')

@section('content')
    <!-- Hero Section with Background Image -->
    <div class="relative bg-cover bg-center h-screen flex items-center justify-center text-center text-white"
         style="background-image: url('{{ asset('images/afrobeats-hero.jpg') }}'); background-size: cover; background-position: center;">
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
            <img src="{{ asset('images/afrobeats-dance.jpg') }}" width="700" alt="Afrobeats Dance">
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
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            What We Cover
        </h2>
        <span class="font-extrabold block text-4xl py-1">Afrobeats History</span>
        <span class="font-extrabold block text-4xl py-1">Artist Spotlights</span>
        <span class="font-extrabold block text-4xl py-1">Music Reviews</span>
        <span class="font-extrabold block text-4xl py-1">Trending Tracks</span>
    </div>
@endsection
