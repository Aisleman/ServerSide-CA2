@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-2xl shadow-lg p-8 max-w-3xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-extrabold text-gray-900">{{ $artist->artist_name }}</h1>

                @auth
                    @if(in_array(Auth::user()->role, ['admin', 'editor']))
                        <div class="flex gap-2">
                            <a href="{{ route('artists.edit', $artist->id) }}"
                               class="bg-yellow-700 text-white px-4 py-2 rounded-full text-sm shadow hover:bg-yellow-800 transition">
                                ✏️ Edit
                            </a>

                            <button type="button"
                                    onclick="showDeleteModal()"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full text-sm shadow">
                                🗑️ Delete
                            </button>
                        </div>
                    @endif
                @endauth
            </div>

            <div class="space-y-2 text-gray-700 text-lg">
                <p><span class="font-semibold">🎵 Song:</span> {{ $artist->song_title }}</p>
                <p><span class="font-semibold">🎧 Genre Style:</span> {{ $artist->genre_style }}</p>
                <p><span class="font-semibold">📅 Debut Year:</span> {{ $artist->debut_year }}</p>
                <p><span class="font-semibold">💿 Notable Album:</span> {{ $artist->notable_album }}</p>
            </div>

            @if ($artist->youtube_video_id)
                <div class="mt-6 aspect-video rounded-xl overflow-hidden shadow">
                    <iframe class="w-full h-full"
                            src="https://www.youtube.com/embed/{{ $artist->youtube_video_id }}"
                            frameborder="0"
                            allowfullscreen></iframe>
                </div>
            @endif

            <p class="mt-6 text-gray-600 text-base leading-relaxed">
                {{ $artist->bio }}
            </p>

            <a href="{{ route('artists.index') }}" class="inline-block mt-8 text-blue-600 hover:underline">
                ← Back to list
            </a>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-lg p-6 shadow-xl w-full max-w-md">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Confirm Delete</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete <strong>{{ $artist->artist_name }}</strong>?</p>

            <div class="flex justify-end space-x-3">
                <button onclick="hideDeleteModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                    Cancel
                </button>

                <form id="deleteArtistForm" action="{{ route('artists.destroy', $artist->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
