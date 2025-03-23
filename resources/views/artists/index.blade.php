@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Top 20 Afrobeats Artists</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($artists as $artist)
                <a href="{{ route('artists.show', $artist->id) }}"
                   class="block bg-white rounded-full shadow-md px-6 py-4 text-center text-lg font-semibold text-gray-800 hover:bg-yellow-100 transition duration-300">
                    {{ $artist->artist_name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
