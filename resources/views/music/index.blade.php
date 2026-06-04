@extends('')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Music — Index</title>
  <style>body{font-family:Inter,Arial;background:#0a0a0a;color:#fff;padding:20px} a{color:#36d870}</style>
</head>
<body>
  <h1>Tracks</h1>
  <p><a href="{{ route('music.create') }}">+ Add track</a></p>

  @if($music->isEmpty())
    <p>No tracks yet.</p>
  @else
    <table style="width:100%;border-collapse:collapse">
      <thead>
        <tr style="text-align:left;border-bottom:1px solid rgba(255,255,255,.06)">
          <th>Title</th><th>Artist</th><th>Album</th><th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($music as $m)
          <tr style="border-bottom:1px solid rgba(255,255,255,.03)">
            <td>{{ $m->title }}</td>
            <td>{{ $m->artist }}</td>
            <td>{{ $m->album }}</td>
            <td style="text-align:right">
              <a href="{{ route('music.show', $m) }}">View</a> |
              <a href="{{ route('music.edit', $m) }}">Edit</a> |
              <form action="{{ route('music.destroy', $m) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete track?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div style="margin-top:18px">{{ $music->links() }}</div>
  @endif

  @include('partials.toast')
</body>
</html>
