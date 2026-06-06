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
  overflow-y: auto;
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
  border: none;
  background: none;
  width: 100%;
  font-family: 'Inter', sans-serif;
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
  min-height: 100vh;
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
  width: 36px; height: 36px;
  border-radius: 10px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.08);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; color: rgba(255,255,255,.5); position: relative;
}

.notif-dot {
  width: 7px; height: 7px;
  background: #ff3b30; border-radius: 50%;
  position: absolute; top: 6px; right: 6px;
}

.admin-pill {
  display: flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 10px; padding: 6px 12px 6px 6px;
  font-size: .82rem; color: rgba(255,255,255,.7); text-decoration: none;
}

.avatar-sm {
  width: 26px; height: 26px; border-radius: 50%;
  background: #ff3b30; display: flex; align-items: center; justify-content: center;
  font-size: .65rem; font-weight: 700;
}

.page-section { display: none; }
.page-section.active { display: block; }

.stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 14px; margin-bottom: 24px;
}

.stat-card {
  background: #161616;
  border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px; padding: 18px 20px;
}

.stat-label {
  font-size: .72rem; color: rgba(255,255,255,.38);
  text-transform: uppercase; letter-spacing: .07em; margin-bottom: 10px;
}

.stat-val {
  font-family: 'Syne', sans-serif;
  font-size: 1.7rem; font-weight: 800;
  letter-spacing: -.03em; margin-bottom: 6px;
}

.badge {
  display: inline-flex; align-items: center; gap: 4px;
  font-size: .72rem; padding: 3px 8px; border-radius: 6px;
}

.badge-up     { background: rgba(30,200,90,.12);  color: #36d870; }
.badge-new    { background: rgba(255,59,48,.10);  color: #ff3b30; }
.badge-active { background: rgba(30,200,90,.12);  color: #36d870; }
.badge-admin  { background: rgba(255,59,48,.12);  color: #ff3b30; }
.badge-info   { background: rgba(99,179,255,.1);  color: #63b3ff; }

.mid, .bottom {
  display: grid; gap: 14px; margin-bottom: 24px;
  grid-template-columns: 1.4fr 1fr;
}

.card {
  background: #161616;
  border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px; padding: 20px;
}

.card-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 18px;
}

.card-title {
  font-family: 'Syne', sans-serif;
  font-size: .95rem; font-weight: 700;
}

.card-action {
  font-size: .78rem; color: rgba(255,255,255,.3);
  text-decoration: none; transition: color .2s; background: none; border: none;
  cursor: pointer; font-family: 'Inter', sans-serif;
}
.card-action:hover { color: #ff3b30; }

.chart-bars {
  display: flex; align-items: flex-end; gap: 6px;
  height: 140px; margin-bottom: 12px;
}

.bar-wrap {
  flex: 1; display: flex; flex-direction: column;
  align-items: center; gap: 6px; height: 100%;
}

.bar { width: 100%; border-radius: 4px 4px 0 0; min-height: 4px; }
.bar-lbl { font-size: .68rem; color: rgba(255,255,255,.3); }

.chart-legend { display: flex; gap: 16px; }

.legend-item {
  display: flex; align-items: center; gap: 6px;
  font-size: .75rem; color: rgba(255,255,255,.4);
}

.legend-dot { width: 8px; height: 8px; border-radius: 50%; }

.track-list { display: flex; flex-direction: column; gap: 2px; }

.track {
  display: flex; align-items: center; gap: 12px;
  padding: 10px 8px; border-radius: 10px; transition: background .18s;
}

.track:hover { background: rgba(255,255,255,.04); }
.track-num  { font-size: .75rem; color: rgba(255,255,255,.2); width: 16px; text-align: center; flex-shrink: 0; }

.track-art {
  width: 40px; height: 40px; border-radius: 8px;
  flex-shrink: 0; object-fit: cover;
}

.track-art-placeholder {
  width: 40px; height: 40px; border-radius: 8px; flex-shrink: 0;
  background: #1e1e1e; display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem;
}

.track-info   { flex: 1; min-width: 0; }
.track-name   { font-size: .85rem; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.track-artist { font-size: .75rem; color: rgba(255,255,255,.35); margin-top: 2px; }
.track-plays  { font-size: .78rem; color: rgba(255,255,255,.3); flex-shrink: 0; }

.user-row {
  display: flex; align-items: center; gap: 12px;
  padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,.05);
}
.user-row:last-child { border-bottom: none; }

.user-av {
  width: 36px; height: 36px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: .72rem; font-weight: 700; flex-shrink: 0;
}

.user-info  { flex: 1; min-width: 0; }
.user-name  { font-size: .85rem; font-weight: 500; }
.user-email { font-size: .75rem; color: rgba(255,255,255,.35); margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

.action-btns { display: flex; gap: 6px; margin-left: 8px; }

.btn-icon {
  width: 30px; height: 30px; border-radius: 8px; border: none;
  cursor: pointer; display: flex; align-items: center; justify-content: center;
  font-size: 14px; transition: background .15s; text-decoration: none;
}

.btn-edit { background: rgba(255,255,255,.06); color: rgba(255,255,255,.5); }
.btn-edit:hover { background: rgba(255,255,255,.12); color: #fff; }
.btn-del { background: rgba(220,53,69,.08); color: rgba(220,53,69,.6); }
.btn-del:hover { background: rgba(220,53,69,.18); color: #ff8a96; }

.genre-row { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }
.genre-label  { font-size: .78rem; color: rgba(255,255,255,.5); width: 80px; flex-shrink: 0; }

.genre-bar-bg {
  flex: 1; height: 6px; background: rgba(255,255,255,.07);
  border-radius: 3px; overflow: hidden;
}

.genre-bar-fill { height: 100%; border-radius: 3px; }
.genre-pct { font-size: .72rem; color: rgba(255,255,255,.3); width: 34px; text-align: right; }

.page-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 24px;
}

.btn-primary {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 10px 18px; background: #ff3b30; border: none;
  border-radius: 10px; color: #fff; font-size: .85rem; font-weight: 600;
  cursor: pointer; font-family: 'Syne', sans-serif; transition: background .15s;
  text-decoration: none;
}
.btn-primary:hover { background: #cc2e28; }

.search-bar {
  display: flex; align-items: center; gap: 10px;
  background: rgba(255,255,255,.05);
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 10px; padding: 9px 14px;
  font-size: .85rem; color: rgba(255,255,255,.5);
  width: 260px;
}

.search-bar input {
  background: none; border: none; outline: none;
  color: #fff; font-size: .85rem; font-family: 'Inter', sans-serif;
  flex: 1;
}
.search-bar input::placeholder { color: rgba(255,255,255,.25); }

.table-wrap {
  background: #161616; border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px; overflow: hidden;
}

.data-table {
  width: 100%; border-collapse: collapse;
}

.data-table th {
  padding: 12px 16px; text-align: left;
  font-size: .7rem; text-transform: uppercase; letter-spacing: .08em;
  color: rgba(255,255,255,.3); background: rgba(255,255,255,.03);
  border-bottom: 1px solid rgba(255,255,255,.06); font-weight: 600;
}

.data-table td {
  padding: 13px 16px; font-size: .85rem;
  border-bottom: 1px solid rgba(255,255,255,.04);
  vertical-align: middle;
}

.data-table tr:last-child td { border-bottom: none; }
.data-table tbody tr { transition: background .15s; }
.data-table tbody tr:hover { background: rgba(255,255,255,.03); }

.cell-user { display: flex; align-items: center; gap: 10px; }
.cell-track { display: flex; align-items: center; gap: 12px; }

.tbl-av {
  width: 32px; height: 32px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: .68rem; font-weight: 700; flex-shrink: 0;
}

.tbl-art {
  width: 38px; height: 38px; border-radius: 8px;
  background: #1e1e1e; display: flex; align-items: center;
  justify-content: center; font-size: 1rem; flex-shrink: 0; overflow: hidden;
}

.tbl-art img { width: 100%; height: 100%; object-fit: cover; }

.tbl-name { font-size: .85rem; font-weight: 500; }
.tbl-sub  { font-size: .75rem; color: rgba(255,255,255,.35); margin-top: 2px; }

.empty-row td {
  text-align: center; padding: 40px !important;
  color: rgba(255,255,255,.25); font-size: .85rem;
}

.playlist-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 14px; margin-top: 8px;
}

.playlist-card {
  background: #161616; border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px; padding: 16px; cursor: pointer; transition: border-color .2s, transform .2s;
}

.playlist-card:hover { border-color: rgba(255,59,48,.35); transform: translateY(-2px); }

.playlist-cover {
  width: 100%; aspect-ratio: 1;
  border-radius: 10px; background: #1e1e1e;
  display: flex; align-items: center; justify-content: center;
  font-size: 2.4rem; margin-bottom: 12px;
  overflow: hidden;
}

.playlist-cover img { width: 100%; height: 100%; object-fit: cover; }

.playlist-cover-spinner {
  width: 100%; height: 100%;
  display: flex; align-items: center; justify-content: center;
  background: linear-gradient(135deg, #1a1a1a, #222);
  animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 1; }
  50%       { opacity: .5; }
}

.playlist-name {
  font-family: 'Syne', sans-serif; font-size: .9rem; font-weight: 700;
  white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-bottom: 4px;
}

.playlist-meta { font-size: .75rem; color: rgba(255,255,255,.35); }

.playlist-actions {
  display: flex; gap: 6px; margin-top: 12px;
}

.filter-row {
  display: flex; align-items: center; gap: 10px; margin-bottom: 20px; flex-wrap: wrap;
}

.filter-chip {
  padding: 6px 14px; border-radius: 8px;
  font-size: .78rem; font-weight: 500;
  border: 1px solid rgba(255,255,255,.1);
  background: rgba(255,255,255,.04);
  color: rgba(255,255,255,.45); cursor: pointer;
  transition: background .15s, color .15s, border-color .15s;
}

.filter-chip.on {
  background: rgba(255,59,48,.1); border-color: rgba(255,59,48,.3); color: #ff3b30;
}

.filter-chip:hover:not(.on) { background: rgba(255,255,255,.08); color: rgba(255,255,255,.7); }

.pagination {
  display: flex; align-items: center; justify-content: space-between;
  padding: 14px 16px 0;
}

.pagination-info { font-size: .78rem; color: rgba(255,255,255,.3); }

.pagination-btns { display: flex; gap: 4px; }

.pg-btn {
  width: 30px; height: 30px; border-radius: 8px; border: 1px solid rgba(255,255,255,.08);
  background: rgba(255,255,255,.04); color: rgba(255,255,255,.4);
  display: flex; align-items: center; justify-content: center;
  font-size: .78rem; cursor: pointer; transition: background .15s;
}

.pg-btn:hover { background: rgba(255,255,255,.1); color: #fff; }
.pg-btn.on { background: #ff3b30; border-color: #ff3b30; color: #fff; }

.modal-bg {
  position: fixed; inset: 0;
  background: rgba(0,0,0,.7); backdrop-filter: blur(4px);
  display: flex; align-items: center; justify-content: center;
  z-index: 100; opacity: 0; pointer-events: none; transition: opacity .2s;
}

.modal-bg.open { opacity: 1; pointer-events: all; }

.modal {
  background: #161616; border: 1px solid rgba(255,255,255,.1);
  border-radius: 16px; width: 100%; max-width: 440px; padding: 24px;
  transform: translateY(12px); transition: transform .25s cubic-bezier(.16,1,.3,1);
  max-height: 90vh; overflow-y: auto;
}

.modal-bg.open .modal { transform: translateY(0); }

.modal-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 20px;
}

.modal-title {
  font-family: 'Syne', sans-serif; font-size: 1.1rem; font-weight: 800;
}

.modal-close {
  width: 30px; height: 30px; border-radius: 8px; border: none;
  background: rgba(255,255,255,.06); color: rgba(255,255,255,.4);
  cursor: pointer; display: flex; align-items: center; justify-content: center;
  font-size: 16px;
}

.modal-close:hover { background: rgba(255,255,255,.1); color: #fff; }

.field { margin-bottom: 14px; }

.field label {
  display: block; font-size: .72rem; text-transform: uppercase;
  letter-spacing: .07em; color: rgba(255,255,255,.35); margin-bottom: 6px;
}

.field input, .field select, .field textarea {
  width: 100%; background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.1); border-radius: 10px;
  color: #fff; padding: 11px 14px; font-size: .87rem; outline: none;
  font-family: 'Inter', sans-serif; transition: border .15s; resize: vertical;
}

.field input:focus, .field select:focus, .field textarea:focus {
  border-color: rgba(255,59,48,.5);
}

.field select option { background: #1e1e1e; color: #fff; }

.field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

.modal-actions { display: flex; gap: 10px; margin-top: 20px; }

.btn-cancel {
  flex: 1; padding: 11px;
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1);
  border-radius: 10px; color: rgba(255,255,255,.6);
  font-size: .87rem; cursor: pointer; font-family: 'Inter', sans-serif;
}
.btn-cancel:hover { background: rgba(255,255,255,.1); }

.btn-save {
  flex: 1; padding: 11px; background: #ff3b30; border: none;
  border-radius: 10px; color: #fff; font-size: .87rem; font-weight: 600;
  cursor: pointer; font-family: 'Syne', sans-serif;
}
.btn-save:hover { background: #cc2e28; }

.delete-icon {
  width: 52px; height: 52px; border-radius: 14px;
  background: rgba(220,53,69,.12); border: 1px solid rgba(220,53,69,.2);
  display: flex; align-items: center; justify-content: center;
  font-size: 22px; margin: 0 auto 16px; color: #ff8a96;
}

.delete-title {
  font-family: 'Syne', sans-serif; font-size: 1.1rem; font-weight: 800;
  text-align: center; margin-bottom: 8px;
}

.delete-sub {
  font-size: .84rem; color: rgba(255,255,255,.4);
  text-align: center; line-height: 1.6;
}

.delete-sub strong { color: rgba(255,255,255,.75); }

.btn-delete-confirm {
  flex: 1; padding: 11px;
  background: rgba(220,53,69,.15); border: 1px solid rgba(220,53,69,.3);
  border-radius: 10px; color: #ff8a96; font-size: .87rem; font-weight: 600;
  cursor: pointer; font-family: 'Syne', sans-serif;
}
.btn-delete-confirm:hover { background: rgba(220,53,69,.28); }

@media (max-width: 1100px) {
  .stats { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 860px) {
  .mid, .bottom { grid-template-columns: 1fr; }
  .playlist-grid { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); }
}

@media (max-width: 640px) {
  body { flex-direction: column; overflow: auto; }
  .sidebar { width: 100%; height: auto; flex-direction: row; flex-wrap: wrap; padding: 12px; position: relative; }
  .logo { margin-bottom: 0; width: 100%; }
  .nav-section { display: none; }
  .main { padding: 16px; }
  .stats { grid-template-columns: repeat(2, 1fr); }
  .search-bar { width: 100%; }
  .page-header { flex-direction: column; align-items: flex-start; gap: 12px; }
}
</style>
</head>
<body>

<div class="sidebar">
  <div class="logo">MUS.IC</div>

  <button class="nav-item active" data-page="dashboard" onclick="switchPage('dashboard', this)">
    <i class="ti ti-layout-dashboard"></i>Dashboard
  </button>
  <button class="nav-item" data-page="users" onclick="switchPage('users', this)">
    <i class="ti ti-users"></i>Users
  </button>
  <button class="nav-item" data-page="tracks" onclick="switchPage('tracks', this)">
    <i class="ti ti-music"></i>Tracks
  </button>
  <button class="nav-item" data-page="playlists" onclick="switchPage('playlists', this)">
    <i class="ti ti-playlist"></i>Playlists
  </button>

  <div style="flex:1"></div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="nav-item logout">
      <i class="ti ti-logout"></i>Logout
    </button>
  </form>
</div>

<div class="main">

  <div class="topbar">
    <div class="page-title" id="pageTitle">Dashboard</div>
    <div class="topbar-right">
      <div class="notif-btn">
        <i class="ti ti-bell" style="font-size:16px"></i>
        <div class="notif-dot"></div>
      </div>
      <a href="{{ route('profile.edit') }}" class="admin-pill">
        <div class="avatar-sm">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
        {{ Auth::user()->name }}
      </a>
    </div>
  </div>

  <div id="page-dashboard" class="page-section active">

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
      <div class="stat-card">
        <div class="stat-label">Playlists</div>
        <div class="stat-val">{{ number_format($totalPlaylists ?? 0) }}</div>
        <span class="badge badge-info"><i class="ti ti-playlist" style="font-size:11px"></i>Active</span>
      </div>
    </div>

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
          <button class="card-action" onclick="switchPage('tracks', document.querySelector('[data-page=tracks]'))">See all →</button>
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
              <img class="track-art" src="" alt="{{ $t->title }}" data-title="{{ $t->title }}" data-artist="{{ $t->artist }}" style="display:none;">
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

    <div class="bottom">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Recent Users</div>
          <button class="card-action" onclick="switchPage('users', document.querySelector('[data-page=users]'))">Manage →</button>
        </div>
        @php
          $avColors = [
            ['#ff3b3022','#ff3b30'],['#ff3b3022','#cc2e28'],
            ['#36d87022','#36d870'],['#ff8a9622','#ff8a96'],
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
            <div class="user-av" style="background:{{ $avBg }};color:{{ $avColor }}">{{ $initials }}</div>
            <div class="user-info">
              <div class="user-name">{{ $u->name }}</div>
              <div class="user-email">{{ $u->email }}</div>
            </div>
            <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
            <div class="action-btns">
              <button class="btn-icon btn-edit" title="Edit"
                onclick="openEditUser({{ $u->id }}, '{{ addslashes($u->name) }}', '{{ addslashes($u->email) }}', '{{ $u->role }}')">
                <i class="ti ti-edit"></i>
              </button>
              <button class="btn-icon btn-del" title="Delete"
                onclick="openDeleteUser({{ $u->id }}, '{{ addslashes($u->name) }}')">
                <i class="ti ti-trash"></i>
              </button>
            </div>
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

  <div id="page-users" class="page-section">

    <div class="page-header">
      <div class="search-bar">
        <i class="ti ti-search" style="font-size:15px;flex-shrink:0"></i>
        <input type="text" placeholder="Search users…" id="userSearchInput" oninput="filterTable('userTable', this.value)">
      </div>
    </div>

    <div class="filter-row">
      <button class="filter-chip on" onclick="toggleChip(this, 'userTable', 'role', '')">All</button>
      <button class="filter-chip" onclick="toggleChip(this, 'userTable', 'role', 'admin')">Admins</button>
      <button class="filter-chip" onclick="toggleChip(this, 'userTable', 'role', 'user')">Users</button>
    </div>

    <div class="table-wrap">
      <table class="data-table" id="userTable">
        <thead>
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Joined</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($allUsers ?? $recentUsers as $i => $u)
            @php
              [$avBg, $avColor] = $avColors[$i % count($avColors)];
              $initials = strtoupper(substr(preg_replace('/[^A-Z]/i', '', $u->name), 0, 2));
            @endphp
            <tr data-role="{{ $u->role ?? 'user' }}">
              <td style="color:rgba(255,255,255,.25);font-size:.8rem">{{ $i + 1 }}</td>
              <td>
                <div class="cell-user">
                  <div class="tbl-av" style="background:{{ $avBg }};color:{{ $avColor }}">{{ $initials }}</div>
                  <div>
                    <div class="tbl-name">{{ $u->name }}</div>
                  </div>
                </div>
              </td>
              <td style="color:rgba(255,255,255,.5);font-size:.82rem">{{ $u->email }}</td>
              <td>
                <span class="badge {{ $u->role === 'admin' ? 'badge-admin' : 'badge-active' }}">
                  {{ ucfirst($u->role ?? 'user') }}
                </span>
              </td>
              <td style="color:rgba(255,255,255,.35);font-size:.8rem">
                {{ $u->created_at ? \Carbon\Carbon::parse($u->created_at)->format('M d, Y') : '—' }}
              </td>
              <td>
                <div class="action-btns">
                  <button class="btn-icon btn-edit" title="Edit"
                    onclick="openEditUser({{ $u->id }}, '{{ addslashes($u->name) }}', '{{ addslashes($u->email) }}', '{{ $u->role }}')">
                    <i class="ti ti-edit"></i>
                  </button>
                  <button class="btn-icon btn-del" title="Delete"
                    onclick="openDeleteUser({{ $u->id }}, '{{ addslashes($u->name) }}')">
                    <i class="ti ti-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="6">No users found.</td></tr>
          @endforelse
        </tbody>
      </table>
      <div class="pagination">
        <div class="pagination-info">Showing {{ count($allUsers ?? $recentUsers) }} users</div>
        <div class="pagination-btns">
          <button class="pg-btn"><i class="ti ti-chevron-left" style="font-size:12px"></i></button>
          <button class="pg-btn on">1</button>
          <button class="pg-btn"><i class="ti ti-chevron-right" style="font-size:12px"></i></button>
        </div>
      </div>
    </div>

  </div>

  <div id="page-tracks" class="page-section">

    <div class="page-header">
      <div class="search-bar">
        <i class="ti ti-search" style="font-size:15px;flex-shrink:0"></i>
        <input type="text" placeholder="Search tracks…" oninput="filterTable('trackTable', this.value)">
      </div>
      <button class="btn-primary" onclick="openModal('addTrackModal')">
        <i class="ti ti-plus" style="font-size:15px"></i>Add Track
      </button>
    </div>

    <div class="filter-row">
      <button class="filter-chip on" onclick="toggleChip(this, 'trackTable', 'genre', '')">All</button>
      @foreach ($genres as $g)
        <button class="filter-chip" onclick="toggleChip(this, 'trackTable', 'genre', '{{ strtolower($g->genre) }}')">
          {{ $g->genre }}
        </button>
      @endforeach
    </div>

    <div class="table-wrap">
      <table class="data-table" id="trackTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Track</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>Plays</th>
            <th>Uploaded</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($allTracks ?? $topTracks as $i => $t)
            @php
              $plays = $t->plays >= 1000000
                ? number_format($t->plays / 1000000, 1).'M'
                : ($t->plays >= 1000 ? number_format($t->plays / 1000, 1).'K' : $t->plays);
              $duration = isset($t->duration) ? gmdate('i:s', $t->duration) : '—';
            @endphp
            <tr data-genre="{{ strtolower($t->genre ?? '') }}">
              <td style="color:rgba(255,255,255,.25);font-size:.8rem">{{ $i + 1 }}</td>
              <td>
                <div class="cell-track">
                  <div class="tbl-art" data-track-title="{{ $t->title }}" data-track-artist="{{ $t->artist }}">
                    🎵
                  </div>
                  <div>
                    <div class="tbl-name">{{ $t->title }}</div>
                    <div class="tbl-sub">{{ $t->artist }}</div>
                  </div>
                </div>
              </td>
              <td>
                <span class="badge badge-info" style="font-size:.7rem">{{ $t->genre ?? '—' }}</span>
              </td>
              <td style="color:rgba(255,255,255,.45);font-size:.82rem">{{ $duration }}</td>
              <td style="color:rgba(255,255,255,.45);font-size:.82rem">{{ $plays }}</td>
              <td style="color:rgba(255,255,255,.35);font-size:.8rem">
                {{ isset($t->created_at) ? \Carbon\Carbon::parse($t->created_at)->format('M d, Y') : '—' }}
              </td>
              <td>
                <div class="action-btns">
                  <button class="btn-icon btn-edit" title="Edit"
                    onclick="openEditTrack({{ $t->id }}, '{{ addslashes($t->title) }}', '{{ addslashes($t->artist) }}', '{{ $t->genre ?? '' }}')">
                    <i class="ti ti-edit"></i>
                  </button>
                  <button class="btn-icon btn-del" title="Delete"
                    onclick="openDeleteTrack({{ $t->id }}, '{{ addslashes($t->title) }}')">
                    <i class="ti ti-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="7">No tracks found.</td></tr>
          @endforelse
        </tbody>
      </table>
      <div class="pagination">
        <div class="pagination-info">Showing {{ count($allTracks ?? $topTracks) }} tracks</div>
        <div class="pagination-btns">
          <button class="pg-btn"><i class="ti ti-chevron-left" style="font-size:12px"></i></button>
          <button class="pg-btn on">1</button>
          <button class="pg-btn"><i class="ti ti-chevron-right" style="font-size:12px"></i></button>
        </div>
      </div>
    </div>

  </div>

  <div id="page-playlists" class="page-section">

    <div class="page-header">
      <div class="search-bar">
        <i class="ti ti-search" style="font-size:15px;flex-shrink:0"></i>
        <input type="text" placeholder="Search playlists…" id="playlistSearch" oninput="filterPlaylists(this.value)">
      </div>
      <button class="btn-primary" onclick="openModal('addPlaylistModal')">
        <i class="ti ti-plus" style="font-size:15px"></i>New Playlist
      </button>
    </div>

    <div class="filter-row">
      <button class="filter-chip on" onclick="filterPlaylistChip(this,'')">All</button>
      <button class="filter-chip" onclick="filterPlaylistChip(this,'public')">Public</button>
      <button class="filter-chip" onclick="filterPlaylistChip(this,'private')">Private</button>
      <button class="filter-chip" onclick="filterPlaylistChip(this,'collaborative')">Collaborative</button>
    </div>

    <div class="playlist-grid" id="playlistGrid">
      @forelse ($playlists ?? [] as $pl)
        <div class="playlist-card"
             data-name="{{ strtolower($pl->name) }}"
             data-visibility="{{ $pl->visibility ?? 'public' }}">

          <div class="playlist-cover">
            @if(!empty($pl->cover_path))
              <img src="{{ asset('storage/' . $pl->cover_path) }}" alt="{{ $pl->name }}">
            @else
              <div class="pl-skeleton" id="plSkeleton-{{ $pl->id }}"></div>
              <img
                class="itunes-art"
                data-query="{{ $pl->name }}"
                src=""
                alt="{{ $pl->name }}"
                style="display:none;width:100%;height:100%;object-fit:cover;border-radius:10px;"
                onload="this.style.display='block';document.getElementById('plSkeleton-{{ $pl->id }}').style.display='none';"
              >
            @endif
          </div>

          <div class="playlist-name">{{ $pl->name }}</div>
          <div class="playlist-meta">
            <i class="ti ti-music" style="font-size:11px"></i>&nbsp;{{ $pl->tracks_count ?? 0 }} tracks
            @if(isset($pl->user)) &nbsp;·&nbsp; {{ $pl->user->name }} @endif
          </div>
          <div class="playlist-actions">
            <button class="btn-icon btn-edit" style="flex:1;width:auto;border-radius:8px" title="Edit"
              onclick="openEditPlaylist({{ $pl->id }},'{{ addslashes($pl->name) }}','{{ $pl->visibility ?? 'public' }}')">
              <i class="ti ti-edit"></i>
            </button>
            <button class="btn-icon btn-del" style="flex:1;width:auto;border-radius:8px" title="Delete"
              onclick="openDeletePlaylist({{ $pl->id }},'{{ addslashes($pl->name) }}')">
              <i class="ti ti-trash"></i>
            </button>
          </div>
        </div>
      @empty
        @foreach ([
          ['name'=>'Chill Vibes',    'query'=>'chill vibes lofi'],
          ['name'=>'Workout Mix',    'query'=>'workout pump up'],
          ['name'=>'Late Night Jazz','query'=>'late night jazz'],
          ['name'=>'Road Trip',      'query'=>'road trip songs'],
        ] as $idx => $s)
          <div class="playlist-card" data-name="{{ strtolower($s['name']) }}">
            <div class="playlist-cover">
              <div class="pl-skeleton" id="plSampleSkeleton-{{ $idx }}"></div>
              <img
                class="itunes-art"
                data-query="{{ $s['query'] }}"
                src=""
                alt="{{ $s['name'] }}"
                style="display:none;width:100%;height:100%;object-fit:cover;border-radius:10px;"
                onload="this.style.display='block';document.getElementById('plSampleSkeleton-{{ $idx }}').style.display='none';"
              >
            </div>
            <div class="playlist-name">{{ $s['name'] }}</div>
            <div class="playlist-meta">0 tracks · sample</div>
            <div class="playlist-actions">
              <button class="btn-icon btn-edit" style="flex:1;width:auto;border-radius:8px"><i class="ti ti-edit"></i></button>
              <button class="btn-icon btn-del"  style="flex:1;width:auto;border-radius:8px"><i class="ti ti-trash"></i></button>
            </div>
          </div>
        @endforeach
      @endforelse
    </div>

  </div>
</div>


<div class="modal-bg" id="editUserModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Edit User</div>
      <button class="modal-close" onclick="closeModal('editUserModal')"><i class="ti ti-x"></i></button>
    </div>
    <form method="POST" id="editUserForm">
      @csrf @method('PUT')
      <div class="field"><label>Name</label><input type="text" name="name" id="editUserName" required></div>
      <div class="field"><label>Email</label><input type="email" name="email" id="editUserEmail" required></div>
      <div class="field">
        <label>Role</label>
        <select name="role" id="editUserRole">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeModal('editUserModal')">Cancel</button>
        <button type="submit" class="btn-save">Save changes</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="addUserModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Add User</div>
      <button class="modal-close" onclick="closeModal('addUserModal')"><i class="ti ti-x"></i></button>
    </div>
    <form method="POST" action="{{ route('users.store') }}">
      @csrf
      <div class="field"><label>Name</label><input type="text" name="name" required placeholder="Full name"></div>
      <div class="field"><label>Email</label><input type="email" name="email" required placeholder="email@example.com"></div>
      <div class="field"><label>Password</label><input type="password" name="password" required placeholder="Min. 8 characters"></div>
      <div class="field">
        <label>Role</label>
        <select name="role">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeModal('addUserModal')">Cancel</button>
        <button type="submit" class="btn-save">Create User</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="deleteUserModal">
  <div class="modal">
    <div class="modal-header" style="border:none;margin-bottom:8px"><div></div>
      <button class="modal-close" onclick="closeModal('deleteUserModal')"><i class="ti ti-x"></i></button>
    </div>
    <div class="delete-icon"><i class="ti ti-trash"></i></div>
    <div class="delete-title">Delete user?</div>
    <p class="delete-sub">Permanently remove <strong id="deleteUserName"></strong> and all their data. This cannot be undone.</p>
    <form method="POST" id="deleteUserForm">
      @csrf @method('DELETE')
      <div class="modal-actions" style="margin-top:24px">
        <button type="button" class="btn-cancel" onclick="closeModal('deleteUserModal')">Cancel</button>
        <button type="submit" class="btn-delete-confirm"><i class="ti ti-trash" style="font-size:14px;margin-right:4px"></i>Delete</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="addTrackModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Add Track</div>
      <button class="modal-close" onclick="closeModal('addTrackModal')"><i class="ti ti-x"></i></button>
    </div>
    <form method="POST" action="{{ route('tracks.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="field-row">
        <div class="field"><label>Title</label><input type="text" name="title" required placeholder="Track title"></div>
        <div class="field"><label>Artist</label><input type="text" name="artist" required placeholder="Artist name"></div>
      </div>
      <div class="field-row">
        <div class="field">
          <label>Genre</label>
          <select name="genre">
            <option value="">Select genre</option>
            @foreach ($genres as $g)
              <option value="{{ $g->genre }}">{{ $g->genre }}</option>
            @endforeach
            <option value="Pop">Pop</option>
            <option value="Rock">Rock</option>
            <option value="Hip-Hop">Hip-Hop</option>
            <option value="Jazz">Jazz</option>
            <option value="Classical">Classical</option>
          </select>
        </div>
        <div class="field"><label>Duration (sec)</label><input type="number" name="duration" placeholder="e.g. 213"></div>
      </div>
      <div class="field"><label>Album</label><input type="text" name="album" placeholder="Album name (optional)"></div>
      <div class="field"><label>Audio File</label><input type="file" name="audio" accept="audio/*"></div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeModal('addTrackModal')">Cancel</button>
        <button type="submit" class="btn-save">Upload Track</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="editTrackModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Edit Track</div>
      <button class="modal-close" onclick="closeModal('editTrackModal')"><i class="ti ti-x"></i></button>
    </div>
    <form method="POST" id="editTrackForm">
      @csrf @method('PUT')
      <div class="field-row">
        <div class="field"><label>Title</label><input type="text" name="title" id="editTrackTitle" required></div>
        <div class="field"><label>Artist</label><input type="text" name="artist" id="editTrackArtist" required></div>
      </div>
      <div class="field">
        <label>Genre</label>
        <select name="genre" id="editTrackGenre">
          <option value="">Select genre</option>
          @foreach ($genres as $g)
            <option value="{{ $g->genre }}">{{ $g->genre }}</option>
          @endforeach
          <option value="Pop">Pop</option>
          <option value="Rock">Rock</option>
          <option value="Hip-Hop">Hip-Hop</option>
          <option value="Jazz">Jazz</option>
          <option value="Classical">Classical</option>
        </select>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeModal('editTrackModal')">Cancel</button>
        <button type="submit" class="btn-save">Save changes</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="deleteTrackModal">
  <div class="modal">
    <div class="modal-header" style="border:none;margin-bottom:8px"><div></div>
      <button class="modal-close" onclick="closeModal('deleteTrackModal')"><i class="ti ti-x"></i></button>
    </div>
    <div class="delete-icon"><i class="ti ti-music"></i></div>
    <div class="delete-title">Delete track?</div>
    <p class="delete-sub">Permanently remove <strong id="deleteTrackName"></strong>. This cannot be undone.</p>
    <form method="POST" id="deleteTrackForm">
      @csrf @method('DELETE')
      <div class="modal-actions" style="margin-top:24px">
        <button type="button" class="btn-cancel" onclick="closeModal('deleteTrackModal')">Cancel</button>
        <button type="submit" class="btn-delete-confirm"><i class="ti ti-trash" style="font-size:14px;margin-right:4px"></i>Delete</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="addPlaylistModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">New Playlist</div>
      <button class="modal-close" onclick="closeModal('addPlaylistModal')"><i class="ti ti-x"></i></button>
    </div>
    <form method="POST" action="{{ route('playlists.store') }}">
      @csrf
      <div class="field"><label>Playlist Name</label><input type="text" name="name" required placeholder="e.g. Late Night Vibes"></div>
      <div class="field"><label>Description</label><textarea name="description" rows="3" placeholder="Optional description…"></textarea></div>
      <div class="field">
        <label>Visibility</label>
        <select name="visibility">
          <option value="public">Public</option>
          <option value="private">Private</option>
          <option value="collaborative">Collaborative</option>
        </select>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeModal('addPlaylistModal')">Cancel</button>
        <button type="submit" class="btn-save">Create Playlist</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="editPlaylistModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Edit Playlist</div>
      <button class="modal-close" onclick="closeModal('editPlaylistModal')"><i class="ti ti-x"></i></button>
    </div>
    <form method="POST" id="editPlaylistForm">
      @csrf @method('PUT')
      <div class="field"><label>Playlist Name</label><input type="text" name="name" id="editPlaylistName" required></div>
      <div class="field">
        <label>Visibility</label>
        <select name="visibility" id="editPlaylistVisibility">
          <option value="public">Public</option>
          <option value="private">Private</option>
          <option value="collaborative">Collaborative</option>
        </select>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeModal('editPlaylistModal')">Cancel</button>
        <button type="submit" class="btn-save">Save changes</button>
      </div>
    </form>
  </div>
</div>

<div class="modal-bg" id="deletePlaylistModal">
  <div class="modal">
    <div class="modal-header" style="border:none;margin-bottom:8px"><div></div>
      <button class="modal-close" onclick="closeModal('deletePlaylistModal')"><i class="ti ti-x"></i></button>
    </div>
    <div class="delete-icon"><i class="ti ti-playlist"></i></div>
    <div class="delete-title">Delete playlist?</div>
    <p class="delete-sub">Permanently remove <strong id="deletePlaylistName"></strong>. This cannot be undone.</p>
    <form method="POST" id="deletePlaylistForm">
      @csrf @method('DELETE')
      <div class="modal-actions" style="margin-top:24px">
        <button type="button" class="btn-cancel" onclick="closeModal('deletePlaylistModal')">Cancel</button>
        <button type="submit" class="btn-delete-confirm"><i class="ti ti-trash" style="font-size:14px;margin-right:4px"></i>Delete</button>
      </div>
    </form>
  </div>
</div>


<script>
const pageTitles = {
  dashboard: 'Dashboard',
  users: 'Users',
  tracks: 'Tracks',
  playlists: 'Playlists',
};

function switchPage(pageId, navBtn) {
  document.querySelectorAll('.page-section').forEach(el => el.classList.remove('active'));
  document.getElementById('page-' + pageId).classList.add('active');
  document.querySelectorAll('.nav-item[data-page]').forEach(el => el.classList.remove('active'));
  if (navBtn) navBtn.classList.add('active');
  else {
    const btn = document.querySelector('.nav-item[data-page="' + pageId + '"]');
    if (btn) btn.classList.add('active');
  }
  document.getElementById('pageTitle').textContent = pageTitles[pageId] || pageId;
  document.querySelector('.main').scrollTop = 0;
  if (pageId === 'playlists') loadPlaylistArt();
}

const weekDays   = @json($weekDays);
const weekCounts = @json($weekCounts);
const maxVal     = Math.max(...weekCounts, 1);
const chartContainer = document.getElementById('chartBars');

weekDays.forEach((day, i) => {
  const heightPct = Math.round((weekCounts[i] / maxVal) * 100);
  const wrap = document.createElement('div');
  wrap.className = 'bar-wrap';
  wrap.innerHTML = `
    <div style="display:flex;flex-direction:column;width:100%;align-items:center;flex:1;justify-content:flex-end">
      <div class="bar" style="height:${heightPct}%;background:#ff3b30;transition:height .5s cubic-bezier(.16,1,.3,1) ${i * .05}s"></div>
    </div>
    <div class="bar-lbl">${day}</div>
  `;
  chartContainer.appendChild(wrap);
});

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('img.track-art[data-title]').forEach(img => {
    const query = encodeURIComponent(img.dataset.title + ' ' + img.dataset.artist);
    fetch('https://itunes.apple.com/search?term=' + query + '&media=music&limit=1')
      .then(r => r.json())
      .then(data => {
        if (data.results && data.results.length) {
          const art = data.results[0].artworkUrl100.replace('100x100bb', '300x300bb');
          img.src = art;
          img.style.display = 'block';
          const ph = img.closest('.track').querySelector('[data-placeholder]');
          if (ph) ph.style.display = 'none';
        }
      })
      .catch(() => {});
  });

  document.querySelectorAll('.tbl-art[data-track-title]').forEach(el => {
    const q = encodeURIComponent(el.dataset.trackTitle + ' ' + el.dataset.trackArtist);
    fetch('https://itunes.apple.com/search?term=' + q + '&media=music&limit=1')
      .then(r => r.json())
      .then(data => {
        if (data.results && data.results.length) {
          const art = data.results[0].artworkUrl100;
          el.innerHTML = `<img src="${art}" alt="">`;
        }
      })
      .catch(() => {});
  });
});

function openModal(id) {
  document.getElementById(id).classList.add('open');
}

function closeModal(id) {
  document.getElementById(id).classList.remove('open');
}

function loadPlaylistArt() {
  document.querySelectorAll('.itunes-art[data-query]').forEach(function(img) {
    if (img.dataset.loaded) return;
    img.dataset.loaded = '1';
    var query = encodeURIComponent(img.dataset.query);
    fetch('https://itunes.apple.com/search?term=' + query + '&media=music&limit=3')
      .then(function(r) { return r.json(); })
      .then(function(data) {
        if (data.results && data.results.length > 0) {
          var pick = data.results[Math.floor(Math.random() * data.results.length)];
          var art  = pick.artworkUrl100.replace('100x100bb', '600x600bb');
          img.src = art;
          img.style.display = 'block';
          var spinner = img.closest('.playlist-cover').querySelector('.playlist-cover-spinner');
          if (spinner) spinner.style.display = 'none';
        }
      })
      .catch(function() {});
  });
}

document.addEventListener('DOMContentLoaded', loadPlaylistArt);

document.querySelectorAll('.modal-bg').forEach(bg => {
  bg.addEventListener('click', e => { if (e.target === bg) bg.classList.remove('open'); });
});

function openEditUser(id, name, email, role) {
  document.getElementById('editUserName').value  = name;
  document.getElementById('editUserEmail').value = email;
  document.getElementById('editUserRole').value  = role;
  document.getElementById('editUserForm').action = `/users/${id}`;
  openModal('editUserModal');
}

function openDeleteUser(id, name) {
  document.getElementById('deleteUserName').textContent = name;
  document.getElementById('deleteUserForm').action = `/users/${id}`;
  openModal('deleteUserModal');
}

function openEditTrack(id, title, artist, genre) {
  document.getElementById('editTrackTitle').value  = title;
  document.getElementById('editTrackArtist').value = artist;
  document.getElementById('editTrackGenre').value  = genre;
  document.getElementById('editTrackForm').action  = `/tracks/${id}`;
  openModal('editTrackModal');
}

function openDeleteTrack(id, name) {
  document.getElementById('deleteTrackName').textContent = name;
  document.getElementById('deleteTrackForm').action = `/tracks/${id}`;
  openModal('deleteTrackModal');
}

function openEditPlaylist(id, name, visibility) {
  document.getElementById('editPlaylistName').value       = name;
  document.getElementById('editPlaylistVisibility').value = visibility;
  document.getElementById('editPlaylistForm').action      = `/playlists/${id}`;
  openModal('editPlaylistModal');
}

function openDeletePlaylist(id, name) {
  document.getElementById('deletePlaylistName').textContent = name;
  document.getElementById('deletePlaylistForm').action      = `/playlists/${id}`;
  openModal('deletePlaylistModal');
}

function filterTable(tableId, query) {
  const q = query.toLowerCase();
  document.querySelectorAll(`#${tableId} tbody tr:not(.empty-row)`).forEach(tr => {
    tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}

function toggleChip(chip, tableId, attr, val) {
  chip.closest('.filter-row').querySelectorAll('.filter-chip').forEach(c => c.classList.remove('on'));
  chip.classList.add('on');
  if (tableId) {
    document.querySelectorAll(`#${tableId} tbody tr:not(.empty-row)`).forEach(tr => {
      tr.style.display = (!val || tr.dataset[attr] === val) ? '' : 'none';
    });
  }
}

function filterPlaylists(query) {
  const q = query.toLowerCase();
  document.querySelectorAll('#playlistGrid .playlist-card').forEach(card => {
    const name = (card.dataset.name || card.querySelector('.playlist-name').textContent).toLowerCase();
    card.style.display = name.includes(q) ? '' : 'none';
  });
}

const urlParams = new URLSearchParams(window.location.search);
const initialPage = urlParams.get('page');
if (initialPage && ['users','tracks','playlists','dashboard'].includes(initialPage)) {
  switchPage(initialPage, document.querySelector(`[data-page="${initialPage}"]`));
}
</script>

@include('partials.toast')

</body>
</html>
