<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers     = DB::table('users')->count();
        $totalTracks    = DB::table('tracks')->count();
        $totalPlaylists = DB::table('playlists')->count();
        $streamsToday   = DB::table('streams')->whereDate('streamed_at', today())->count();
        $revenueMTD     = DB::table('payments')
                            ->whereMonth('paid_at', now()->month)
                            ->whereYear('paid_at', now()->year)
                            ->sum('amount');

        $topTracks = DB::table('tracks')
            ->leftJoin('streams', 'streams.track_id', '=', 'tracks.id')
            ->selectRaw('tracks.id, tracks.title, tracks.artist, tracks.genre, tracks.duration, tracks.created_at, COUNT(streams.id) AS plays')
            ->groupBy('tracks.id', 'tracks.title', 'tracks.artist', 'tracks.genre', 'tracks.duration', 'tracks.created_at')
            ->orderByDesc('plays')
            ->limit(5)
            ->get();

        $allTracks = DB::table('tracks')
            ->leftJoin('streams', 'streams.track_id', '=', 'tracks.id')
            ->selectRaw('tracks.id, tracks.title, tracks.artist, tracks.genre, tracks.duration, tracks.created_at, COUNT(streams.id) AS plays')
            ->groupBy('tracks.id', 'tracks.title', 'tracks.artist', 'tracks.genre', 'tracks.duration', 'tracks.created_at')
            ->orderByDesc('tracks.created_at')
            ->get();

        $recentUsers = DB::table('users')
            ->select(['id', 'name', 'email', 'role', 'created_at'])
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $allUsers = DB::table('users')
            ->select(['id', 'name', 'email', 'role', 'created_at'])
            ->orderByDesc('created_at')
            ->get();

        $playlists = DB::table('playlists')
            ->leftJoin('users', 'users.id', '=', 'playlists.user_id')
            ->leftJoin(
                DB::raw('(SELECT playlist_id, COUNT(*) as tracks_count FROM playlist_track GROUP BY playlist_id) as pt'),
                'pt.playlist_id', '=', 'playlists.id'
            )
            ->select([
                'playlists.id',
                'playlists.name',
                'playlists.visibility',
                'playlists.created_at',
                'users.name as user_name',
                DB::raw('COALESCE(pt.tracks_count, 0) as tracks_count'),
            ])
            ->orderByDesc('playlists.created_at')
            ->get()
            ->map(function ($pl) {
                // Nest user as object so blade $pl->user->name works
                $pl->user = (object) ['name' => $pl->user_name];
                return $pl;
            });

        $genres = DB::table('tracks')
            ->selectRaw('genre, COUNT(*) AS cnt')
            ->whereNotNull('genre')
            ->where('genre', '!=', '')
            ->groupBy('genre')
            ->orderByDesc('cnt')
            ->limit(5)
            ->get();

        $totalGenreCount = $genres->sum('cnt') ?: 1;

        $weeklyRaw = DB::table('streams')
            ->selectRaw('DATE(streamed_at) AS day, COUNT(*) AS cnt')
            ->where('streamed_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('cnt', 'day');

        $weekDays = $weekCounts = [];
        for ($i = 6; $i >= 0; $i--) {
            $d = now()->subDays($i)->toDateString();
            $weekDays[]   = now()->subDays($i)->format('D');
            $weekCounts[] = (int) ($weeklyRaw[$d] ?? 0);
        }

        return view('dashboard', compact(
            'totalUsers', 'totalTracks', 'totalPlaylists',
            'streamsToday', 'revenueMTD',
            'topTracks', 'allTracks',
            'recentUsers', 'allUsers',
            'playlists',
            'genres', 'totalGenreCount',
            'weekDays', 'weekCounts'
        ));
    }
}
