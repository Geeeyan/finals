<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = (string) $request->query('q', '');

        $tracks = collect();
        $images = collect();

        if ($q !== '') {
            $tracks = Music::query()
                ->where('title', 'like', "%{$q}%")
                ->orWhere('artist', 'like', "%{$q}%")
                ->limit(50)
                ->get();

            $assetsPath = base_path('public/images/assets');
            if (File::exists($assetsPath)) {
                $files = File::files($assetsPath);
                $images = collect($files)->filter(function ($f) use ($q) {
                    return str_contains(strtolower($f->getFilename()), strtolower($q));
                })->map(function ($f) {
                    return 'images/assets/' . $f->getFilename();
                })->values();
            }
        }

        // If the request expects JSON (AJAX live-search), return compact JSON results
        if ($request->wantsJson() || $request->ajax()) {
            $trackResults = $tracks->map(function ($t) {
                return [
                    'type' => 'track',
                    'id' => $t->id,
                    'title' => $t->title,
                    'artist' => $t->artist,
                    'album' => $t->album ?? null,
                ];
            })->values()->all();

            $imageResults = $images->map(function ($p) {
                return [
                    'type' => 'image',
                    'title' => basename($p),
                    'artist' => 'Image',
                    'url' => asset($p),
                ];
            })->values()->all();

            return response()->json(array_values(array_merge($trackResults, $imageResults)));
        }

        return view('search', [
            'q' => $q,
            'tracks' => $tracks,
            'images' => $images,
        ]);
    }
}
