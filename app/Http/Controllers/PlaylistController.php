<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'visibility'  => ['required', 'in:public,private,collaborative'],
        ]);

        DB::table('playlists')->insert([
            'user_id'     => auth()->id(),
            'name'        => $request->name,
            'description' => $request->description,
            'visibility'  => $request->visibility,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->route('dashboard', ['page' => 'playlists'])
            ->with('status', 'Playlist created successfully.');
    }

    public function update(Request $request, $playlist)
    {
        $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'visibility' => ['required', 'in:public,private,collaborative'],
        ]);

        DB::table('playlists')->where('id', $playlist)->update([
            'name'       => $request->name,
            'visibility' => $request->visibility,
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard', ['page' => 'playlists'])
            ->with('status', 'Playlist updated successfully.');
    }

    public function destroy($playlist)
    {
        DB::table('playlist_track')->where('playlist_id', $playlist)->delete();
        DB::table('playlists')->where('id', $playlist)->delete();

        return redirect()->route('dashboard', ['page' => 'playlists'])
            ->with('status', 'Playlist deleted successfully.');
    }
}
