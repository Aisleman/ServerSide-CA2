<?php

namespace App\Http\Controllers;

use App\Models\AfrobeatsArtist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = AfrobeatsArtist::all();
        return view('artists.index', compact('artists'));
    }

    public function show($id)
    {
        $artist = AfrobeatsArtist::findOrFail($id);
        return view('artists.show', compact('artist'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
            'genre_style' => 'nullable|string|max:255',
            'debut_year' => 'nullable|integer',
            'notable_album' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'youtube_video_id' => 'nullable|string|max:255',
        ]);

        AfrobeatsArtist::create($request->all());

        return redirect()->route('artists.index')->with('success', 'Artist added successfully.');
    }

    public function edit($id)
    {
        $artist = AfrobeatsArtist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'artist_name' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
            'genre_style' => 'nullable|string|max:255',
            'debut_year' => 'nullable|integer',
            'notable_album' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'youtube_video_id' => 'nullable|string|max:255',
        ]);

        $artist = AfrobeatsArtist::findOrFail($id);
        $artist->update($request->all());

        return redirect()->route('artists.show', $artist->id)->with('success', 'Artist updated successfully.');
    }

    public function destroy($id)
    {
        $artist = AfrobeatsArtist::findOrFail($id);
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
