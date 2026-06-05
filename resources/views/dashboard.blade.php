<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MUS.IC — Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Inter', sans-serif;
  background: #0a0a0a;
  color: #fff;
  min-height: 100vh;
  display: flex;
}

.sidebar {
  width: 220px;
  background: #111;
  border-right: 1px solid rgba(255,255,255,.07);
  display: flex;
  flex-direction: column;
  padding: 24px 16px;
  gap: 4px;
  flex-shrink: 0;
  position: sticky;
  top: 0;
  height: 100vh;
}

.logo {
  font-family: 'Syne', sans-serif;
  font-size: 1.4rem;
  font-weight: 800;
  color: #ff3b30;
  letter-spacing: -.03em;
  padding: 0 8px;
  margin-bottom: 24px;
}

.nav-section {
  font-size: .65rem;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: rgba(255,255,255,.2);
  padding: 16px 12px 6px;
}

.nav-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 12px;
  border-radius: 10px;
  font-size: .85rem;
  font-weight: 500;
  color: rgba(255,255,255,.45);
  cursor: pointer;
  text-decoration: none;
  transition: background .18s, color .18s;
}

.nav-item i { font-size: 17px; }
.nav-item:hover  { background: rgba(255,255,255,.05); color: rgba(255,255,255,.75); }
.nav-item.active { background: #ff3b30; color: #ffffff; }
.nav-item.logout { color: rgba(220,53,69,.7); }
.nav-item.logout:hover { background: rgba(220,53,69,.08); color: #ff8a96; }

.main {
  flex: 1;
  overflow-y: auto;
  padding: 28px 32px;
}

.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 28px;
}

.page-title {
  font-family: 'Syne', sans-serif;
  font-size: 1.5rem;
  font-weight: 800;
  letter-spacing: -.02em;
}

.topbar-right { display: flex; align-items: center; gap: 12px; }

.notif-btn {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.08);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: rgba(255,255,255,.5);
  position: relative;
}

.notif-dot {
  width: 7px;
  height: 7px;
  background: #ff3b30;
  border-radius: 50%;
  position: absolute;
  top: 6px;
  right: 6px;
}

.admin-pill {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 10px;
  padding: 6px 12px 6px 6px;
  font-size: .82rem;
  color: rgba(255,255,255,.7);
}

.avatar-sm {
  width: 26px;
  height: 26px;
  border-radius: 50%;
  background: #ff3b30;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: .65rem;
  font-weight: 700;
}

.stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 14px;
  margin-bottom: 24px;
}

.stat-card {
  background: #161616;
  border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px;
  padding: 18px 20px;
}

.stat-label {
  font-size: .72rem;
  color: rgba(255,255,255,.38);
  text-transform: uppercase;
  letter-spacing: .07em;
  margin-bottom: 10px;
}

.stat-val {
  font-family: 'Syne', sans-serif;
  font-size: 1.7rem;
  font-weight: 800;
  letter-spacing: -.03em;
  margin-bottom: 6px;
}

.badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: .72rem;
  padding: 3px 8px;
  border-radius: 6px;
}

.badge-up     { background: rgba(30,200,90,.12);  color: #36d870; }
.badge-new    { background: rgba(255,59,48,.10);  color: #ff3b30; }
.badge-active { background: rgba(30,200,90,.12);  color: #36d870; }
.badge-admin  { background: rgba(255,59,48,.12);  color: #ff3b30; }

.mid, .bottom {
  display: grid;
  gap: 14px;
  margin-bottom: 24px;
  grid-template-columns: 1.4fr 1fr;
}

.card {
  background: #161616;
  border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px;
  padding: 20px;
}

.card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 18px;
}

.card-title {
  font-family: 'Syne', sans-serif;
  font-size: .95rem;
  font-weight: 700;
}

.card-action {
  font-size: .78rem;
  color: rgba(255,255,255,.3);
  text-decoration: none;
  transition: color .2s;
}

.card-action:hover { color: #ff3b30; }

.chart-bars {
  display: flex;
  align-items: flex-end;
  gap: 6px;
  height: 140px;
  margin-bottom: 12px;
}

.bar-wrap {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  height: 100%;
}

.bar { width: 100%; border-radius: 4px 4px 0 0; min-height: 4px; }
.bar-lbl { font-size: .68rem; color: rgba(255,255,255,.3); }

.chart-legend { display: flex; gap: 16px; }

.legend-item {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: .75rem;
  color: rgba(255,255,255,.4);
}

.legend-dot { width: 8px; height: 8px; border-radius: 50%; }

.track-list { display: flex; flex-direction: column; gap: 2px; }

.track {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 8px;
  border-radius: 10px;
  transition: background .18s;
}

.track:hover { background: rgba(255,255,255,.04); }

.track-num  { font-size: .75rem; color: rgba(255,255,255,.2); width: 16px; text-align: center; flex-shrink: 0; }

.track-art {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  flex-shrink: 0;
  object-fit: cover;
}

.track-art-placeholder {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  flex-shrink: 0;
  background: #1e1e1e;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
}

.track-info   { flex: 1; min-width: 0; }
.track-name   { font-size: .85rem; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.track-artist { font-size: .75rem; color: rgba(255,255,255,.35); margin-top: 2px; }
.track-plays  { font-size: .78rem; color: rgba(255,255,255,.3); flex-shrink: 0; }

.user-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 0;
  border-bottom: 1px solid rgba(255,255,255,.05);
}

.user-row:last-child { border-bottom: none; }

.user-av {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: .72rem;
  font-weight: 700;
  flex-shrink: 0;
}

.user-info  { flex: 1; min-width: 0; }
.user-name  { font-size: .85rem; font-weight: 500; }
.user-email { font-size: .75rem; color: rgba(255,255,255,.35); margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

.genre-row { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }

.genre-label  { font-size: .78rem; color: rgba(255,255,255,.5); width: 80px; flex-shrink: 0; }

.genre-bar-bg {
  flex: 1;
  height: 6px;
  background: rgba(255,255,255,.07);
  border-radius: 3px;
  overflow: hidden;
}

.genre-bar-fill { height: 100%; border-radius: 3px; }
.genre-pct { font-size: .72rem; color: rgba(255,255,255,.3); width: 34px; text-align: right; }

@media (max-width: 1100px) {
  .stats { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 860px) {
  .mid, .bottom { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
  body { flex-direction: column; }
  .sidebar {
    width: 100%;
    height: auto;
    flex-direction: row;
    flex-wrap: wrap;
    padding: 12px;
    position: relative;
  }
  .logo { margin-bottom: 0; width: 100%; }
  .nav-section { display: none; }
  .main { padding: 16px; }
  .stats { grid-template-columns: repeat(2, 1fr); }
}
</style>
</head>
<body>

{{-- ── Sidebar ── --}}
<div class="sidebar">
  <div class="logo">MUS.IC</div>

  <a href="{{ route('dashboard') }}" class="nav-item active">
    <i class="ti ti-layout-dashboard"></i>Dashboard
  </a>
  <a href="#" class="nav-item"><i class="ti ti-users"></i>Users</a>
  <a href="#" class="nav-item"><i class="ti ti-music"></i>Tracks</a>
  <a href="#" class="nav-item"><i class="ti ti-playlist"></i>Playlists</a>

  <div class="nav-section">Analytics</div>
  <a href="#" class="nav-item"><i class="ti ti-chart-bar"></i>Reports</a>

  <div class="nav-section">System</div>
  <a href="#" class="nav-item"><i class="ti ti-settings"></i>Settings</a>


  <div style="flex:1"></div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="nav-item logout" style="width:100%;border:none;background:none;cursor:pointer;">
      <i class="ti ti-logout"></i>Logout
    </button>
  </form>
</div>

{{-- ── Main ── --}}
<div class="main">

  {{-- Topbar --}}
  <div class="topbar">
    <div class="page-title">Dashboard</div>
    <div class="topbar-right">
      <div class="notif-btn">
        <i class="ti ti-bell" style="font-size:16px"></i>
        <div class="notif-dot"></div>
      </div>
      <a href="{{ route('profile.edit') }}" class="admin-pill" style="text-decoration:none;">
        <div class="avatar-sm">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
        {{ Auth::user()->name }}
      </a>
    </div>
  </div>

  {{-- Stat cards --}}
  <div class="stats">
    <div class="stat-card">
      <div class="stat-label">Total Users</div>
      <div class="stat-val">{{ number_format($totalUsers) }}</div>
      <span class="badge badge-up"><i class="ti ti-arrow-up" style="font-size:11px"></i>Live</span>
    </div>
    <div class="stat-card">
      <div class="stat-label">Streams Today</div>
      <div class="stat-val">{{ number_format($streamsToday) }}</div>
      <span class="badge badge-up"><i class="ti ti-arrow-up" style="font-size:11px"></i>Today</span>
    </div>
    <div class="stat-card">
      <div class="stat-label">Total Tracks</div>
      <div class="stat-val">{{ number_format($totalTracks) }}</div>
      <span class="badge badge-up"><i class="ti ti-music" style="font-size:11px"></i>Library</span>
    </div>

  </div>

  {{-- Mid: Chart + Top Tracks --}}
  <div class="mid">

    <div class="card">
      <div class="card-header">
        <div class="card-title">Weekly Streams</div>
        <a href="#" class="card-action">View report →</a>
      </div>
      <div class="chart-bars" id="chartBars"></div>
      <div class="chart-legend">
        <div class="legend-item">
          <div class="legend-dot" style="background:#ff3b30"></div>This week
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <div class="card-title">Top Tracks</div>
        <a href="#" class="card-action">See all →</a>
      </div>
      <div class="track-list">
        @forelse ($topTracks as $i => $t)
          @php
            $plays = $t->plays >= 1000000
              ? number_format($t->plays / 1000000, 1).'M'
              : ($t->plays >= 1000 ? number_format($t->plays / 1000, 1).'K' : $t->plays);
          @endphp
          <div class="track">
            <div class="track-num">{{ $i + 1 }}</div>
            <img
              class="track-art"
              src=""
              alt="{{ $t->title }}"
              data-title="{{ $t->title }}"
              data-artist="{{ $t->artist }}"
              style="display:none;"
            >
            <div class="track-art-placeholder" data-placeholder>🎵</div>
            <div class="track-info">
              <div class="track-name">{{ $t->title }}</div>
              <div class="track-artist">{{ $t->artist }}</div>
            </div>
            <div class="track-plays">{{ $plays }}</div>
          </div>
        @empty
          <p style="font-size:.82rem;color:rgba(255,255,255,.3);padding:12px 10px">No tracks yet.</p>
        @endforelse
      </div>
    </div>

  </div>

  {{-- Bottom: Recent Users + Genre Breakdown --}}
  <div class="bottom">

    <div class="card">
      <div class="card-header">
        <div class="card-title">Recent Users</div>
        <a href="#" class="card-action">Manage →</a>
      </div>
      @php
        $avColors = [
          ['#ff3b3022','#ff3b30'],
          ['#ff3b3022','#cc2e28'],
          ['#36d87022','#36d870'],
          ['#ff8a9622','#ff8a96'],
          ['rgba(255,255,255,.08)','rgba(255,255,255,.4)'],
        ];
      @endphp
      @forelse ($recentUsers as $i => $u)
        @php
          $initials = strtoupper(implode('', array_map(fn($w) => $w[0], explode(' ', trim($u->name)))));
          $initials = substr($initials, 0, 2);
          [$avBg, $avColor] = $avColors[$i % count($avColors)];
          $statusClass = $u->role === 'admin' ? 'badge-admin' : 'badge-active';
          $statusLabel = ucfirst($u->role ?? 'user');
        @endphp
        <div class="user-row">
          <div class="user-av" style="background:{{ $avBg }};color:{{ $avColor }}">
            {{ $initials }}
          </div>
          <div class="user-info">
            <div class="user-name">{{ $u->name }}</div>
            <div class="user-email">{{ $u->email }}</div>
          </div>
          <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
        </div>
      @empty
        <p style="font-size:.82rem;color:rgba(255,255,255,.3);padding:8px 0">No users yet.</p>
      @endforelse
    </div>

    <div class="card">
      <div class="card-header">
        <div class="card-title">Genre Breakdown</div>
        <a href="#" class="card-action">Full report →</a>
      </div>
      @php $genreColors = ['#ff3b30','#ff3b30','#36d870','#ff8a96','rgba(255,255,255,.3)']; @endphp
      @forelse ($genres as $i => $g)
        @php $pct = round(($g->cnt / $totalGenreCount) * 100); @endphp
        <div class="genre-row">
          <div class="genre-label">{{ $g->genre }}</div>
          <div class="genre-bar-bg">
            <div class="genre-bar-fill" style="width:{{ $pct }}%;background:{{ $genreColors[$i % count($genreColors)] }}"></div>
          </div>
          <div class="genre-pct">{{ $pct }}%</div>
        </div>
      @empty
        <p style="font-size:.82rem;color:rgba(255,255,255,.3)">No genre data yet.</p>
      @endforelse
    </div>

  </div>
</div>

<script>
{{-- Weekly streams chart --}}
const weekDays   = @json($weekDays);
const weekCounts = @json($weekCounts);
const maxVal = Math.max(...weekCounts, 1);
const container = document.getElementById('chartBars');
weekDays.forEach((day, i) => {
  const heightPct = Math.round((weekCounts[i] / maxVal) * 100);
  const wrap = document.createElement('div');
  wrap.className = 'bar-wrap';
  wrap.innerHTML = `
    <div style="display:flex;flex-direction:column;width:100%;align-items:center;flex:1;justify-content:flex-end">
      <div class="bar" style="height:${heightPct}%;background:#ff3b30;transition:height .5s cubic-bezier(.16,1,.3,1)"></div>
    </div>
    <div class="bar-lbl">${day}</div>
  `;
  container.appendChild(wrap);
});

{{-- iTunes album art for top tracks --}}
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('img.track-art[data-title]').forEach(function (img) {
    var query = encodeURIComponent(img.dataset.title + ' ' + img.dataset.artist);
    fetch('https://itunes.apple.com/search?term=' + query + '&media=music&limit=1')
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (data.results && data.results.length > 0) {
          var art = data.results[0].artworkUrl100.replace('100x100bb', '300x300bb');
          img.src = art;
          img.style.display = 'block';
          var ph = img.closest('.track').querySelector('[data-placeholder]');
          if (ph) ph.style.display = 'none';
        }
      })
      .catch(function () {});
  });
});
</script>

@include('partials.toast')

</body>
</html>
