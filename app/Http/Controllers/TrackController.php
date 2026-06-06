<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'artist'   => ['required', 'string', 'max:255'],
            'genre'    => ['nullable', 'string', 'max:100'],
            'duration' => ['nullable', 'integer'],
        ]);

        DB::table('tracks')->insert([
            'title'      => $request->title,
            'artist'     => $request->artist,
            'genre'      => $request->genre,
            'duration'   => $request->duration,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard', ['page' => 'tracks'])
            ->with('status', 'Track added successfully.');
    }

    public function update(Request $request, $track)
    {
        $request->validate([
            'title'  => ['required', 'string', 'max:255'],
            'artist' => ['required', 'string', 'max:255'],
            'genre'  => ['nullable', 'string', 'max:100'],
        ]);

        DB::table('tracks')->where('id', $track)->update([
            'title'      => $request->title,
            'artist'     => $request->artist,
            'genre'      => $request->genre,
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard', ['page' => 'tracks'])
            ->with('status', 'Track updated successfully.');
    }

    public function destroy($track)
    {
        DB::table('tracks')->where('id', $track)->delete();

        return redirect()->route('dashboard', ['page' => 'tracks'])
            ->with('status', 'Track deleted successfully.');
    }
}
