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

.main { flex: 1; overflow-y: auto; padding: 28px 32px; }

.topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; }

.page-title {
  font-family: 'Syne', sans-serif;
  font-size: 1.5rem;
  font-weight: 800;
  letter-spacing: -.02em;
}

.topbar-right { display: flex; align-items: center; gap: 12px; }

.notif-btn {
  width: 36px; height: 36px; border-radius: 10px;
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.08);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; color: rgba(255,255,255,.5); position: relative;
}
.notif-dot { width: 7px; height: 7px; background: #ff3b30; border-radius: 50%; position: absolute; top: 6px; right: 6px; }

.admin-pill {
  display: flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.08);
  border-radius: 10px; padding: 6px 12px 6px 6px;
  font-size: .82rem; color: rgba(255,255,255,.7);
}
.avatar-sm { width: 26px; height: 26px; border-radius: 50%; background: #ff3b30; display: flex; align-items: center; justify-content: center; font-size: .65rem; font-weight: 700; overflow: hidden; }
.avatar-sm img { width: 100%; height: 100%; object-fit: cover; }

.stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 24px; }

.stat-card { background: #161616; border: 1px solid rgba(255,255,255,.07); border-radius: 14px; padding: 18px 20px; }
.stat-label { font-size: .72rem; color: rgba(255,255,255,.38); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 10px; }
.stat-val { font-family: 'Syne', sans-serif; font-size: 1.7rem; font-weight: 800; letter-spacing: -.03em; margin-bottom: 6px; }

.badge { display: inline-flex; align-items: center; gap: 4px; font-size: .72rem; padding: 3px 8px; border-radius: 6px; }
.badge-up     { background: rgba(30,200,90,.12);  color: #36d870; }
.badge-new    { background: rgba(255,59,48,.10);  color: #ff3b30; }
.badge-active { background: rgba(30,200,90,.12);  color: #36d870; }
.badge-admin  { background: rgba(255,59,48,.12);  color: #ff3b30; }

.section-card { background: #161616; border: 1px solid rgba(255,255,255,.07); border-radius: 14px; padding: 20px; margin-bottom: 20px; }

.section-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
.section-title { font-family: 'Syne', sans-serif; font-size: .95rem; font-weight: 700; }

.btn-add {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 7px 14px; background: #ff3b30; border: none;
  border-radius: 8px; color: #fff; font-size: .8rem;
  font-weight: 600; cursor: pointer; transition: background .18s;
}
.btn-add:hover { background: #cc2e28; }

/* ── Table ── */
.tbl { width: 100%; border-collapse: collapse; }
.tbl th { font-size: .7rem; text-transform: uppercase; letter-spacing: .07em; color: rgba(255,255,255,.3); padding: 8px 12px; text-align: left; border-bottom: 1px solid rgba(255,255,255,.06); }
.tbl td { padding: 12px 12px; font-size: .85rem; border-bottom: 1px solid rgba(255,255,255,.04); vertical-align: middle; }
.tbl tr:last-child td { border-bottom: none; }
.tbl tr:hover td { background: rgba(255,255,255,.02); }

.track-row-art { width: 36px; height: 36px; border-radius: 6px; object-fit: cover; }
.track-row-art-ph { width: 36px; height: 36px; border-radius: 6px; background: #1e1e1e; display: flex; align-items: center; justify-content: center; font-size: .9rem; }

.user-av-sm { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .7rem; font-weight: 700; flex-shrink: 0; overflow: hidden; }
.user-av-sm img { width: 100%; height: 100%; object-fit: cover; }

.action-btns { display: flex; gap: 6px; }
.btn-edit {
  padding: 5px 10px; background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1);
  border-radius: 7px; color: rgba(255,255,255,.7); font-size: .78rem; cursor: pointer;
  display: inline-flex; align-items: center; gap: 4px; transition: background .15s;
}
.btn-edit:hover { background: rgba(255,255,255,.12); color: #fff; }

.btn-del {
  padding: 5px 10px; background: rgba(220,53,69,.08); border: 1px solid rgba(220,53,69,.2);
  border-radius: 7px; color: #ff8a96; font-size: .78rem; cursor: pointer;
  display: inline-flex; align-items: center; gap: 4px; transition: background .15s;
}
.btn-del:hover { background: rgba(220,53,69,.15); color: #ffb3bb; }

/* ── Modal ── */
.modal-backdrop {
  display: none;
  position: fixed; inset: 0;
  background: rgba(0,0,0,.75);
  backdrop-filter: blur(4px);
  z-index: 1000;
  align-items: center;
  justify-content: center;
}
.modal-backdrop.open { display: flex; }

.modal {
  background: #1a1a1a;
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 16px;
  padding: 28px;
  width: 100%;
  max-width: 440px;
  animation: modalIn .2s cubic-bezier(.16,1,.3,1);
}

@keyframes modalIn {
  from { opacity: 0; transform: scale(.96) translateY(8px); }
  to   { opacity: 1; transform: scale(1) translateY(0); }
}

.modal-title { font-family: 'Syne', sans-serif; font-size: 1.1rem; font-weight: 700; margin-bottom: 20px; }

.modal label { display: block; font-size: .72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .06em; color: rgba(255,255,255,.35); margin-bottom: 6px; margin-top: 14px; }
.modal label:first-of-type { margin-top: 0; }

.modal input, .modal select {
  width: 100%; padding: 10px 13px;
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1);
  border-radius: 10px; color: #fff; font-size: .88rem; font-family: 'Inter', sans-serif;
  outline: none; transition: border-color .2s;
}
.modal input:focus, .modal select:focus { border-color: rgba(255,59,48,.5); }
.modal select option { background: #1a1a1a; }

.modal-footer { display: flex; gap: 10px; justify-content: flex-end; margin-top: 22px; }

.btn-cancel {
  padding: 9px 18px; background: transparent; border: 1px solid rgba(255,255,255,.1);
  border-radius: 9px; color: rgba(255,255,255,.5); font-size: .85rem; cursor: pointer;
  transition: background .15s;
}
.btn-cancel:hover { background: rgba(255,255,255,.06); color: #fff; }

.btn-confirm {
  padding: 9px 18px; background: #ff3b30; border: none;
  border-radius: 9px; color: #fff; font-size: .85rem; font-weight: 600; cursor: pointer;
  transition: background .15s;
}
.btn-confirm:hover { background: #cc2e28; }

.btn-confirm-del {
  padding: 9px 18px; background: rgba(220,53,69,.9); border: none;
  border-radius: 9px; color: #fff; font-size: .85rem; font-weight: 600; cursor: pointer;
  transition: background .15s;
}
.btn-confirm-del:hover { background: #c82333; }

.delete-warn { font-size: .88rem; color: rgba(255,255,255,.55); line-height: 1.6; }
.delete-warn strong { color: #fff; }

.mid { display: grid; gap: 14px; margin-bottom: 24px; grid-template-columns: 1.4fr 1fr; }

.card { background: #161616; border: 1px solid rgba(255,255,255,.07); border-radius: 14px; padding: 20px; }
.card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
.card-title { font-family: 'Syne', sans-serif; font-size: .95rem; font-weight: 700; }
.card-action { font-size: .78rem; color: rgba(255,255,255,.3); text-decoration: none; transition: color .2s; }
.card-action:hover { color: #ff3b30; }

.chart-bars { display: flex; align-items: flex-end; gap: 6px; height: 140px; margin-bottom: 12px; }
.bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 6px; height: 100%; }
.bar { width: 100%; border-radius: 4px 4px 0 0; min-height: 4px; }
.bar-lbl { font-size: .68rem; color: rgba(255,255,255,.3); }
.chart-legend { display: flex; gap: 16px; }
.legend-item { display: flex; align-items: center; gap: 6px; font-size: .75rem; color: rgba(255,255,255,.4); }
.legend-dot { width: 8px; height: 8px; border-radius: 50%; }

.genre-row { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }
.genre-label { font-size: .78rem; color: rgba(255,255,255,.5); width: 80px; flex-shrink: 0; }
.genre-bar-bg { flex: 1; height: 6px; background: rgba(255,255,255,.07); border-radius: 3px; overflow: hidden; }
.genre-bar-fill { height: 100%; border-radius: 3px; }
.genre-pct { font-size: .72rem; color: rgba(255,255,255,.3); width: 34px; text-align: right; }

@media (max-width: 1100px) { .stats { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 860px)  { .mid { grid-template-columns: 1fr; } }
@media (max-width: 640px)  {
  body { flex-direction: column; }
  .sidebar { width: 100%; height: auto; flex-direction: row; flex-wrap: wrap; padding: 12px; position: relative; }
  .logo { margin-bottom: 0; width: 100%; }
  .nav-section { display: none; }
  .main { padding: 16px; }
  .stats { grid-template-columns: repeat(2, 1fr); }
}
</style>
</head>
<body>

{{-- Sidebar --}}
<div class="sidebar">
  <div class="logo">MUS.IC</div>

  <a href="{{ route('dashboard') }}" class="nav-item active">
    <i class="ti ti-layout-dashboard"></i>Dashboard
  </a>
  <a href="#" class="nav-item"><i class="ti ti-users"></i>Users</a>
  <a href="#" class="nav-item"><i class="ti ti-music"></i>Tracks</a>

  <div style="flex:1"></div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="nav-item logout" style="width:100%;border:none;background:none;cursor:pointer;">
      <i class="ti ti-logout"></i>Logout
    </button>
  </form>
</div>

{{-- Main --}}
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
        <div class="avatar-sm">
          @if(Auth::user()->profile_image)
            <img src="{{ Storage::url(Auth::user()->profile_image) }}" alt="avatar">
          @else
            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
          @endif
        </div>
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

  {{-- Chart + Genre --}}
  <div class="mid">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Weekly Streams</div>
        <a href="#" class="card-action">View report →</a>
      </div>
      <div class="chart-bars" id="chartBars"></div>
      <div class="chart-legend">
        <div class="legend-item"><div class="legend-dot" style="background:#ff3b30"></div>This week</div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <div class="card-title">Genre Breakdown</div>
      </div>
      @php $genreColors = ['#ff3b30','#36d870','#ff8a96','#7c9dff','rgba(255,255,255,.3)']; @endphp
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

  {{-- ── USERS TABLE ── --}}
  <div class="section-card">
    <div class="section-head">
      <div class="section-title"><i class="ti ti-users" style="color:#ff3b30;margin-right:6px"></i>Users</div>
      <button class="btn-add" onclick="openAddUser()"><i class="ti ti-plus"></i> Add User</button>
    </div>
    <table class="tbl">
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
        @forelse($recentUsers as $i => $u)
          @php
            $initials = strtoupper(substr($u->name, 0, 2));
            $avColors = ['#ff3b3022','#36d87022','#ff8a9622','rgba(255,255,255,.08)'];
            $avTextColors = ['#ff3b30','#36d870','#ff8a96','rgba(255,255,255,.5)'];
            $ci = $i % count($avColors);
          @endphp
          <tr>
            <td style="color:rgba(255,255,255,.25);width:36px">{{ $i + 1 }}</td>
            <td>
              <div style="display:flex;align-items:center;gap:10px;">
                <div class="user-av-sm" style="background:{{ $avColors[$ci] }};color:{{ $avTextColors[$ci] }}">
                  @if($u->profile_image)
                    <img src="{{ Storage::url($u->profile_image) }}" alt="{{ $u->name }}">
                  @else
                    {{ $initials }}
                  @endif
                </div>
                <span style="font-weight:500">{{ $u->name }}</span>
              </div>
            </td>
            <td style="color:rgba(255,255,255,.45)">{{ $u->email }}</td>
            <td>
              <span class="badge {{ $u->role === 'admin' ? 'badge-admin' : 'badge-active' }}">
                {{ ucfirst($u->role ?? 'user') }}
              </span>
            </td>
            <td style="color:rgba(255,255,255,.35)">{{ $u->created_at->format('M d, Y') }}</td>
            <td>
              <div class="action-btns">
                <button class="btn-edit" onclick="openEditUser({{ $u->id }}, '{{ addslashes($u->name) }}', '{{ $u->email }}', '{{ $u->role }}')">
                  <i class="ti ti-pencil"></i> Edit
                </button>
                <button class="btn-del" onclick="openDeleteUser({{ $u->id }}, '{{ addslashes($u->name) }}')">
                  <i class="ti ti-trash"></i> Delete
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:rgba(255,255,255,.3);padding:24px">No users yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- ── TRACKS TABLE ── --}}
  <div class="section-card">
    <div class="section-head">
      <div class="section-title"><i class="ti ti-music" style="color:#ff3b30;margin-right:6px"></i>Tracks</div>
      <button class="btn-add" onclick="openAddTrack()"><i class="ti ti-plus"></i> Add Track</button>
    </div>
    <table class="tbl">
      <thead>
        <tr>
          <th>#</th>
          <th>Art</th>
          <th>Title</th>
          <th>Artist</th>
          <th>Album</th>
          <th>Plays</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="tracksTableBody">
        @forelse($topTracks as $i => $t)
          @php
            $plays = $t->plays >= 1000000
              ? number_format($t->plays/1000000,1).'M'
              : ($t->plays >= 1000 ? number_format($t->plays/1000,1).'K' : ($t->plays ?? 0));
          @endphp
          <tr>
            <td style="color:rgba(255,255,255,.25);width:36px">{{ $i + 1 }}</td>
            <td>
              <img class="track-row-art" src="" alt="{{ $t->title }}"
                   data-title="{{ $t->title }}" data-artist="{{ $t->artist }}"
                   style="display:none;">
              <div class="track-row-art-ph" data-placeholder>🎵</div>
            </td>
            <td style="font-weight:500">{{ $t->title }}</td>
            <td style="color:rgba(255,255,255,.45)">{{ $t->artist }}</td>
            <td style="color:rgba(255,255,255,.35)">{{ $t->album ?? '—' }}</td>
            <td style="color:rgba(255,255,255,.35)">{{ $plays }}</td>
            <td>
              <div class="action-btns">
                <button class="btn-edit" onclick="openEditTrack({{ $t->id }}, '{{ addslashes($t->title) }}', '{{ addslashes($t->artist) }}', '{{ addslashes($t->album ?? '') }}')">
                  <i class="ti ti-pencil"></i> Edit
                </button>
                <button class="btn-del" onclick="openDeleteTrack({{ $t->id }}, '{{ addslashes($t->title) }}')">
                  <i class="ti ti-trash"></i> Delete
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:rgba(255,255,255,.3);padding:24px">No tracks yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>{{-- end .main --}}


{{-- ══════════════════════════════════════
     MODALS
══════════════════════════════════════ --}}

{{-- Add User --}}
<div class="modal-backdrop" id="modalAddUser">
  <div class="modal">
    <div class="modal-title">Add New User</div>
    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf
      <label>Full Name</label>
      <input type="text" name="name" placeholder="John Doe" required>
      <label>Email</label>
      <input type="email" name="email" placeholder="john@example.com" required>
      <label>Password</label>
      <input type="password" name="password" placeholder="Min. 8 characters" required>
      <label>Role</label>
      <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalAddUser')">Cancel</button>
        <button type="submit" class="btn-confirm">Create User</button>
      </div>
    </form>
  </div>
</div>

{{-- Edit User --}}
<div class="modal-backdrop" id="modalEditUser">
  <div class="modal">
    <div class="modal-title">Edit User</div>
    <form method="POST" id="editUserForm">
      @csrf
      @method('PATCH')
      <label>Full Name</label>
      <input type="text" name="name" id="editUserName" required>
      <label>Email</label>
      <input type="email" name="email" id="editUserEmail" required>
      <label>Role</label>
      <select name="role" id="editUserRole">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalEditUser')">Cancel</button>
        <button type="submit" class="btn-confirm">Save Changes</button>
      </div>
    </form>
  </div>
</div>

{{-- Delete User --}}
<div class="modal-backdrop" id="modalDeleteUser">
  <div class="modal">
    <div class="modal-title">Delete User</div>
    <p class="delete-warn">Are you sure you want to delete <strong id="deleteUserName"></strong>? This action cannot be undone.</p>
    <form method="POST" id="deleteUserForm">
      @csrf
      @method('DELETE')
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalDeleteUser')">Cancel</button>
        <button type="submit" class="btn-confirm-del"><i class="ti ti-trash"></i> Delete</button>
      </div>
    </form>
  </div>
</div>

{{-- Add Track --}}
<div class="modal-backdrop" id="modalAddTrack">
  <div class="modal">
    <div class="modal-title">Add New Track</div>
    <form method="POST" action="{{ route('music.store') }}">
      @csrf
      <label>Title</label>
      <input type="text" name="title" placeholder="Song title" required>
      <label>Artist</label>
      <input type="text" name="artist" placeholder="Artist name">
      <label>Album</label>
      <input type="text" name="album" placeholder="Album name">
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalAddTrack')">Cancel</button>
        <button type="submit" class="btn-confirm">Add Track</button>
      </div>
    </form>
  </div>
</div>

{{-- Edit Track --}}
<div class="modal-backdrop" id="modalEditTrack">
  <div class="modal">
    <div class="modal-title">Edit Track</div>
    <form method="POST" id="editTrackForm">
      @csrf
      @method('PATCH')
      <label>Title</label>
      <input type="text" name="title" id="editTrackTitle" required>
      <label>Artist</label>
      <input type="text" name="artist" id="editTrackArtist">
      <label>Album</label>
      <input type="text" name="album" id="editTrackAlbum">
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalEditTrack')">Cancel</button>
        <button type="submit" class="btn-confirm">Save Changes</button>
      </div>
    </form>
  </div>
</div>

{{-- Delete Track --}}
<div class="modal-backdrop" id="modalDeleteTrack">
  <div class="modal">
    <div class="modal-title">Delete Track</div>
    <p class="delete-warn">Are you sure you want to delete <strong id="deleteTrackName"></strong>? This action cannot be undone.</p>
    <form method="POST" id="deleteTrackForm">
      @csrf
      @method('DELETE')
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalDeleteTrack')">Cancel</button>
        <button type="submit" class="btn-confirm-del"><i class="ti ti-trash"></i> Delete</button>
      </div>
    </form>
  </div>
</div>

<script>
// ── Chart ──
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
    <div class="bar-lbl">${day}</div>`;
  container.appendChild(wrap);
});

// ── Album art ──
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('img.track-row-art[data-title]').forEach(function (img) {
    var q = encodeURIComponent(img.dataset.title + ' ' + img.dataset.artist);
    fetch('https://itunes.apple.com/search?term=' + q + '&media=music&limit=1')
      .then(r => r.json())
      .then(d => {
        if (d.results && d.results.length > 0) {
          img.src = d.results[0].artworkUrl100.replace('100x100bb','300x300bb');
          img.style.display = 'block';
          var ph = img.closest('td').querySelector('[data-placeholder]');
          if (ph) ph.style.display = 'none';
        }
      }).catch(()=>{});
  });
});

// ── Modal helpers ──
function openModal(id)  { document.getElementById(id).classList.add('open'); }
function closeModal(id) { document.getElementById(id).classList.remove('open'); }

// close on backdrop click
document.querySelectorAll('.modal-backdrop').forEach(bd => {
  bd.addEventListener('click', e => { if (e.target === bd) bd.classList.remove('open'); });
});

// ── User modals ──
function openAddUser() { openModal('modalAddUser'); }

function openEditUser(id, name, email, role) {
  document.getElementById('editUserName').value  = name;
  document.getElementById('editUserEmail').value = email;
  document.getElementById('editUserRole').value  = role;
  document.getElementById('editUserForm').action = `/admin/users/${id}`;
  openModal('modalEditUser');
}

function openDeleteUser(id, name) {
  document.getElementById('deleteUserName').textContent = name;
  document.getElementById('deleteUserForm').action = `/admin/users/${id}`;
  openModal('modalDeleteUser');
}

// ── Track modals ──
function openAddTrack() { openModal('modalAddTrack'); }

function openEditTrack(id, title, artist, album) {
  document.getElementById('editTrackTitle').value  = title;
  document.getElementById('editTrackArtist').value = artist;
  document.getElementById('editTrackAlbum').value  = album;
  document.getElementById('editTrackForm').action  = `/music/${id}`;
  openModal('modalEditTrack');
}

function openDeleteTrack(id, title) {
  document.getElementById('deleteTrackName').textContent = title;
  document.getElementById('deleteTrackForm').action = `/music/${id}`;
  openModal('modalDeleteTrack');
}
</script>

@include('partials.toast')
</body>
</html>
