<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Track</title>
  <style>body{font-family:Inter,Arial;background:#0a0a0a;color:#fff;padding:20px} label{display:block;margin-top:8px}</style>
</head>
<body>
  <h1>Edit Track</h1>
  <form method="POST" action="{{ route('music.update', $music) }}">
    @csrf
    @method('PUT')
    <label>Title <input type="text" name="title" value="{{ old('title', $music->title) }}" required></label>
    <label>Artist <input type="text" name="artist" value="{{ old('artist', $music->artist) }}"></label>
    <label>Album <input type="text" name="album" value="{{ old('album', $music->album) }}"></label>
    <div style="margin-top:12px"><button type="submit">Save</button> <a href="{{ route('music.index') }}">Cancel</a></div>
  </form>

  @if($errors->any())
    <div style="margin-top:12px;color:#ff8a96">{{ $errors->first() }}</div>
  @endif

  @include('partials.toast')
</body>
</html>
