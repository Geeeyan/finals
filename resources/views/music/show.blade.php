<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Track: {{ $music->title }}</title>
  <style>body{font-family:Inter,Arial;background:#0a0a0a;color:#fff;padding:20px} a{color:#36d870}</style>
</head>
<body>
  <h1>{{ $music->title }}</h1>
  <div>Artist: {{ $music->artist }}</div>
  <div>Album: {{ $music->album }}</div>
  <p style="margin-top:12px"><a href="{{ route('music.edit', $music) }}">Edit</a> • <a href="{{ route('music.index') }}">Back</a></p>

  @include('partials.toast')
</body>
</html>
