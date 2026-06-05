<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MusicController extends Controller
{
    public function index(): View
    {
        $music = Music::latest()->paginate(20);
        return view('music.index', compact('music'));
    }

    public function create(): View
    {
        return view('music.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
            'album'  => 'nullable|string|max:255',
            'genre'  => 'nullable|string|max:100',
            'plays'  => 'nullable|integer|min:0',
        ]);

        Music::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Track created successfully.');
    }

    public function show(Music $music): View
    {
        return view('music.show', compact('music'));
    }

    public function edit(Music $music): View
    {
        return view('music.edit', compact('music'));
    }

    public function update(Request $request, Music $music): RedirectResponse
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
            'album'  => 'nullable|string|max:255',
            'genre'  => 'nullable|string|max:100',
            'plays'  => 'nullable|integer|min:0',
        ]);

        $music->update($validated);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Track updated successfully.');
    }

    public function destroy(Music $music): RedirectResponse
    {
        $music->delete();

        return redirect()
            ->route('dashboard')
            ->with('status', 'Track deleted successfully.');
    }
}
