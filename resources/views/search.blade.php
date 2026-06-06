<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Search results</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
<style>
:root {
    --bg: #120607;
    --text: #ffffff;
    --muted: rgba(255, 255, 255, .65);
    --accent: #ff3b30;
    --card-bg: rgba(255, 255, 255, .04);
    --card-border: rgba(255, 59, 48, .18);
}

* {
    box-sizing: border-box;
}

html, body {
    height: 100%;
    margin: 0;
    font-family: Inter, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    background:
        radial-gradient(circle at top left, rgba(255, 59, 48, .18), transparent 40%),
        radial-gradient(circle at bottom right, rgba(255, 0, 0, .12), transparent 45%),
        #120607;
    color: var(--text);
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 900px;
    text-align: center;
}

h1, h2, h3 {
    margin-bottom: 10px;
}

form {
    margin: 20px auto 30px;
}

input {
    padding: 12px 14px;
    width: 60%;
    max-width: 320px;
    border-radius: 10px;
    border: 1px solid rgba(255, 59, 48, .25);
    background: rgba(255, 255, 255, .05);
    color: #fff;
    outline: none;
}

input::placeholder {
    color: rgba(255, 255, 255, .4);
}

button[type=submit] {
    padding: 12px 16px;
    border-radius: 10px;
    border: none;
    background: #ff3b30;
    color: white;
    font-weight: 600;
    cursor: pointer;
    margin-left: 6px;
    transition: .2s;
}

button[type=submit]:hover {
    background: #cc2e28;
    transform: translateY(-1px);
}

.results {
    display: flex;
    justify-content: center;
    gap: 24px;
    flex-wrap: wrap;
    margin-top: 20px;
}

.card {
    background: var(--card-bg);
    padding: 18px;
    border-radius: 16px;
    min-width: 280px;
    border: 1px solid var(--card-border);
    backdrop-filter: blur(12px);
    text-align: left;
}

.track-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid rgba(255, 255, 255, .08);
    cursor: pointer;
    border-radius: 8px;
    transition: background .15s;
}

.track-item:hover {
    background: rgba(255, 255, 255, .06);
    padding-left: 8px;
}

.track-item:last-child {
    border-bottom: none;
}

.track-art {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    object-fit: cover;
    display: none;
    flex-shrink: 0;
}

.track-art-placeholder {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    background: rgba(255, 255, 255, .06);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.track-info {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 0;
}

.track-title {
    font-size: 14px;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.track-artist {
    font-size: 12px;
    color: var(--muted);
}

.play-icon {
    font-size: 18px;
    color: rgba(255, 255, 255, .3);
    margin-right: 4px;
    flex-shrink: 0;
}

p {
    color: var(--muted);
}
</style>
</head>
<body>

<div class="container">
    <h1>Search</h1>

    <form method="GET" action="{{ route('search') }}">
        <input name="q" value="{{ old('q', $q ?? request('q')) }}" placeholder="Search songs">
        <button type="submit">Search</button>
    </form>

    @if(!empty($q))
        <h2>Results for "{{ $q }}"</h2>
        <div class="results">
            <div class="card">
                <h3>Tracks</h3>
                @if($tracks->isEmpty())
                    <p>No tracks found</p>
                @else
                    <ul style="list-style:none;padding:0;margin:0;">
                        @foreach($tracks as $t)
                            <li class="track-item" onclick="playSong('{{ addslashes($t->title) }}', '{{ addslashes($t->artist) }}')">
                                <img class="track-art" src="" alt="{{ $t->title }}"
                                     data-track-title="{{ $t->title }}"
                                     data-track-artist="{{ $t->artist }}">
                                <span class="track-art-placeholder" data-placeholder>🎵</span>
                                <div class="track-info">
                                    <span class="track-title">{{ $t->title }}</span>
                                    <span class="track-artist">{{ $t->artist }}</span>
                                </div>
                                <i class="ti ti-player-play play-icon"></i>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @else
        <p>Enter a query above to search songs.</p>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('img.track-art[data-track-title]').forEach(function (img) {
        const q = encodeURIComponent(img.dataset.trackTitle + ' ' + img.dataset.trackArtist);
        fetch('https://itunes.apple.com/search?term=' + q + '&media=music&limit=1')
            .then(r => r.json())
            .then(d => {
                if (d.results && d.results.length > 0) {
                    img.src = d.results[0].artworkUrl100.replace('100x100bb', '300x300bb');
                    img.style.display = 'block';
                    const ph = img.closest('.track-item').querySelector('[data-placeholder]');
                    if (ph) ph.style.display = 'none';
                }
            }).catch(() => {});
    });
});

function playSong(title, artist) {
    sessionStorage.setItem('nowPlaying', JSON.stringify({ title, artist }));
    window.location.href = '{{ route('home') }}';
}
</script>

@include('partials.toast')
</body>
</html>
