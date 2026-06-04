<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $music = Music::orderBy('created_at', 'desc')->paginate(20);
        return view('music.index', compact('music'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['nullable', 'string', 'max:255'],
            'album' => ['nullable', 'string', 'max:255'],
        ]);

        Music::create($data);

        return redirect()->route('music.index')->with('status', 'Track created');
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
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['nullable', 'string', 'max:255'],
            'album' => ['nullable', 'string', 'max:255'],
        ]);

        $music->update($data);

        return redirect()->route('music.index')->with('status', 'Track updated');
    }

    public function destroy(Music $music)
    {
        $music->delete();
        return redirect()->route('music.index')->with('status', 'Track deleted');
    }
}
