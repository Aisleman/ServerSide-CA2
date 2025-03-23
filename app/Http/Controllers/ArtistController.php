<?php

namespace App\Http\Controllers;

use App\Models\AfrobeatsArtist;


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
}
