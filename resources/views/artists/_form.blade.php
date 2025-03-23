@csrf
@if(isset($artist))
    @method('PUT')
@endif

<div class="space-y-4">
    <input type="text" name="artist_name" value="{{ old('artist_name', $artist->artist_name ?? '') }}"
           placeholder="Artist Name" class="w-full p-3 border rounded" required>

    <input type="text" name="song_title" value="{{ old('song_title', $artist->song_title ?? '') }}"
           placeholder="Song Title" class="w-full p-3 border rounded" required>

    <input type="text" name="genre_style" value="{{ old('genre_style', $artist->genre_style ?? '') }}"
           placeholder="Genre Style" class="w-full p-3 border rounded">

    <input type="number" name="debut_year" value="{{ old('debut_year', $artist->debut_year ?? '') }}"
           placeholder="Debut Year" class="w-full p-3 border rounded">

    <input type="text" name="notable_album" value="{{ old('notable_album', $artist->notable_album ?? '') }}"
           placeholder="Notable Album" class="w-full p-3 border rounded">

    <input type="text" name="youtube_video_id" value="{{ old('youtube_video_id', $artist->youtube_video_id ?? '') }}"
           placeholder="YouTube Video ID (e.g. Xx0v7r7trLA)" class="w-full p-3 border rounded">

    <textarea name="bio" placeholder="Bio" class="w-full p-3 border rounded" rows="4">{{ old('bio', $artist->bio ?? '') }}</textarea>

    <div class="flex justify-between items-center pt-2">
        <button type="submit"
                class="bg-yellow-700 hover:bg-yellow-800 text-white px-6 py-2 rounded shadow">
            {{ isset($artist) ? 'Update' : 'Add' }} Artist
        </button>

        <a href="{{ isset($artist) ? route('artists.show', $artist->id) : route('artists.index') }}"
           class="px-6 py-2 border border-gray-400 text-gray-700 rounded hover:bg-gray-100 transition">
            Cancel
        </a>
    </div>
</div>
