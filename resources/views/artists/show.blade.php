@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-2xl shadow-lg p-8 max-w-3xl mx-auto">
            <h1 class="text-4xl font-extrabold mb-4 text-gray-900">{{ $artist->artist_name }}</h1>

            <div class="space-y-2 text-gray-700 text-lg">
                <p><span class="font-semibold">🎵 Song:</span> {{ $artist->song_title }}</p>
                <p><span class="font-semibold">🎧 Genre Style:</span> {{ $artist->genre_style }}</p>
                <p><span class="font-semibold">📅 Debut Year:</span> {{ $artist->debut_year }}</p>
                <p><span class="font-semibold">💿 Notable Album:</span> {{ $artist->notable_album }}</p>
            </div>

            <p class="mt-6 text-gray-600 text-base leading-relaxed">
                {{ $artist->bio }}
            </p>

            <a href="{{ route('artists.index') }}" class="inline-block mt-8 text-blue-600 hover:underline">
                ← Back to list
            </a>
        </div>
    </div>
@endsection
