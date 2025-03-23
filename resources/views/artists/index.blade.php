@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Top 20 Afrobeats Artists</h1>

            @auth
                @if (in_array(Auth::user()->role, ['admin', 'editor']))
                    <a href="{{ route('artists.create') }}"
                       class="bg-yellow-700 text-white px-5 py-2 rounded-full shadow hover:bg-yellow-800 transition duration-300">
                        + Add Artist
                    </a>
                @endif
            @endauth
        </div>

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
