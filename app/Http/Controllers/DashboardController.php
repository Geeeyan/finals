<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers   = DB::table('users')->count();
        $totalTracks  = DB::table('tracks')->count();
        $streamsToday = DB::table('streams')->whereDate('streamed_at', today())->count();
        $revenueMTD   = DB::table('payments')
                          ->whereMonth('paid_at', now()->month)
                          ->whereYear('paid_at', now()->year)
                          ->sum('amount');

        $topTracks = DB::table('tracks')
            ->leftJoin('streams', 'streams.track_id', '=', 'tracks.id')
            ->selectRaw('tracks.title, tracks.artist, COUNT(streams.id) AS plays')
            ->groupBy('tracks.id', 'tracks.title', 'tracks.artist')
            ->orderByDesc('plays')
            ->limit(5)
            ->get();

        $recentUsers = DB::table('users')
            ->select(['id', 'name', 'email', 'role', 'created_at'])
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $genres = DB::table('tracks')
            ->selectRaw('genre, COUNT(*) AS cnt')
            ->whereNotNull('genre')
            ->where('genre', '!=', '')
            ->groupBy('genre')
            ->orderByDesc('cnt')
            ->limit(5)
            ->get();

        $totalGenreCount = $genres->sum('cnt') ?: 1;

        // Weekly streams — last 7 days
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
            'totalUsers', 'totalTracks', 'streamsToday', 'revenueMTD',
            'topTracks', 'recentUsers', 'genres', 'totalGenreCount',
            'weekDays', 'weekCounts'
        ));
    }
}
