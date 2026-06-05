<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $music = Music::latest()->paginate(20);

        return view('music.index', compact('music'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
            'album'  => 'nullable|string|max:255',
        ]);

        Music::create($validated);

        return redirect()
            ->route('music.index')
            ->with('status', 'Track created successfully');
    }

    public function show(Music $music)
    {
        return view('music.show', compact('music'));
    }

    public function edit(Music $music)
    {
        return view('music.edit', compact('music'));
    }

    public function update(Request $request, Music $music)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
            'album'  => 'nullable|string|max:255',
        ]);

        $music->update($validated);

        return redirect()
            ->route('music.index')
            ->with('status', 'Track updated successfully');
    }

    public function destroy(Music $music)
    {
        $music->delete();

        return redirect()
            ->route('music.index')
            ->with('status', 'Track deleted successfully');
    }
}
