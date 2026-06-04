<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Search results</title>
  <link rel="stylesheet" href="/css/app.css">
  <style>
    body { font-family: Inter, sans-serif; background:#0a0a0a; color:#fff; padding:28px; }
    .results { display:flex; gap:24px; flex-wrap:wrap }
    .card { background:#181818; padding:16px; border-radius:12px; min-width:220px }
    img.thumb { width:100%; height:140px; object-fit:cover; border-radius:8px }

    .track-item { display:flex; align-items:center; gap:12px; padding:8px 0; border-bottom:1px solid #2a2a2a; }
    .track-item:last-child { border-bottom:none; }
    .track-art { width:48px; height:48px; border-radius:6px; object-fit:cover; background:#2a2a2a; flex-shrink:0; }
    .track-art-placeholder { width:48px; height:48px; border-radius:6px; background:#2a2a2a; flex-shrink:0; display:flex; align-items:center; justify-content:center; font-size:20px; }
    .track-info { display:flex; flex-direction:column; }
    .track-title { font-size:14px; font-weight:600; color:#fff; }
    .track-artist { font-size:12px; color:#aaa; margin-top:2px; }
  </style>
</head>
<body>
  <h1>Search</h1>
  <form method="GET" action="{{ route('search') }}">
    <input name="q" value="{{ old('q', $q ?? request('q')) }}" placeholder="Search songs or images" style="padding:8px; width:320px">
    <button type="submit">Search</button>
  </form>

  @if(!empty($q))
    <h2>Results for "{{ $q }}"</h2>
    <div class="results">
      <div class="card">
        <h3>Tracks</h3>
        @if($tracks->isEmpty())
          <div>No tracks found</div>
        @else
          <ul style="list-style:none; padding:0; margin:0;">
            @foreach($tracks as $t)
              <li class="track-item">
                <img
                  class="track-art"
                  src=""
                  alt="{{ $t->artist }}"
                  data-track-title="{{ $t->title }}"
                  data-track-artist="{{ $t->artist }}"
                  style="display:none"
                >
                <span class="track-art-placeholder" data-placeholder>🎵</span>
                <div class="track-info">
                  <span class="track-title">{{ $t->title }}</span>
                  <span class="track-artist">{{ $t->artist }}</span>
                </div>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  @else
    <p>Enter a query above to search users and image assets.</p>
  @endif

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const artImgs = document.querySelectorAll('img.track-art[data-track-title]');

      artImgs.forEach(function (img) {
        const title  = img.dataset.trackTitle;
        const artist = img.dataset.trackArtist;
        const query  = encodeURIComponent(title + ' ' + artist);
        const url    = 'https://itunes.apple.com/search?term=' + query + '&media=music&limit=1';

        fetch(url)
          .then(function (r) { return r.json(); })
          .then(function (data) {
            if (data.results && data.results.length > 0) {
              var artUrl = data.results[0].artworkUrl100.replace('100x100', '300x300');
              img.src = artUrl;
              img.style.display = 'block';
              var placeholder = img.closest('.track-item').querySelector('[data-placeholder]');
              if (placeholder) placeholder.style.display = 'none';
            }
          })
          .catch(function () {});
      });
    });
  </script>
</body>
@include('partials.toast')

</html>
