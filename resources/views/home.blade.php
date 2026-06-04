<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MUS.IC — Home</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  font-family: 'Inter', sans-serif;
  background: #0a0a0a;
  color: #ffffff;
  min-height: 100vh;
}
.app-shell {
  display: flex;
  min-height: 100vh;
}
.sidebar {
  width: 240px;
  background: #0f0f0f;
  border-right: 1px solid rgba(255,255,255,.08);
  display: flex;
  flex-direction: column;
  padding: 28px 20px;
  gap: 16px;
  position: sticky;
  top: 0;
  height: 100vh;
}
.logo {
  font-family: 'Syne', sans-serif;
  font-size: 1.6rem;
  font-weight: 800;
  color: #ff3b30;
  letter-spacing: .04em;
  margin-bottom: 22px;
}
.nav-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.nav-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
  border-radius: 14px;
  color: rgba(255,255,255,.8);
  text-decoration: none;
  font-size: .95rem;
  transition: background .2s, color .2s;
}
.nav-item i { font-size: 18px; }
.nav-item:hover,
.nav-item.active {
  background: rgba(255,59,48,.18);
  color: #ffffff;
}
.nav-item.logout {
  margin-top: 16px;
  color: rgba(255,255,255,.65);
}
.nav-item.logout:hover { color: #ff8a96; }
.sidebar-user {
  margin-top: auto;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px;
  border-radius: 18px;
  background: #141414;
  text-decoration: none;
}
.sidebar-user img,
.sidebar-user .avatar-fallback {
  width: 46px;
  height: 46px;
  border-radius: 50%;
  flex-shrink: 0;
}
.avatar-fallback {
  display: flex;
  align-items: center;
  justify-content: center;
  background: #ff3b30;
  color: #fff;
  font-size: 1rem;
  font-weight: 800;
}
.user-meta { display: flex; flex-direction: column; gap: 2px; }
.user-name { font-size: .95rem; font-weight: 700; }
.user-role { font-size: .78rem; color: rgba(255,255,255,.6); }
.main {
  flex: 1;
  overflow: hidden;
}
.main-scroll {
  height: 100vh;
  overflow-y: auto;
  padding: 28px 34px;
}
.main-scroll::-webkit-scrollbar { width: 10px; }
.main-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 999px; }
.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 18px;
  margin-bottom: 32px;
  flex-wrap: wrap;
}
.title-group { display: flex; flex-direction: column; gap: 8px; }
.page-title { font-family: 'Syne', sans-serif; font-size: 2.6rem; font-weight: 800; line-height: 1; }
.page-sub { color: rgba(255,255,255,.6); font-size: 1rem; }
.search-bar {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 18px;
  background: #121212;
  border: 1px solid rgba(255,59,48,.12);
  border-radius: 999px;
  min-width: 320px;
}
.search-bar i { font-size: 18px; color: rgba(255,255,255,.6); }
.search-bar input {
  flex: 1;
  background: transparent;
  border: none;
  color: #fff;
  font-size: .95rem;
  outline: none;
}
.hero {
  display: grid;
  grid-template-columns: 1.65fr 1fr;
  gap: 22px;
  margin-bottom: 30px;
}
.hero-card {
  position: relative;
  border-radius: 30px;
  padding: 36px;
  background: linear-gradient(135deg, #ff3b30, #cc2e28);
  overflow: hidden;
}
.hero-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at top left, rgba(255,255,255,.18), transparent 26%);
}
.hero-title {
  font-family: 'Syne', sans-serif;
  font-size: 3.1rem;
  font-weight: 800;
  line-height: 1.02;
  max-width: 13ch;
  margin-bottom: 18px;
  position: relative;
  z-index: 1;
}
.hero-sub {
  font-size: 1rem;
  color: rgba(255,255,255,.95);
  max-width: 36ch;
  line-height: 1.75;
  position: relative;
  z-index: 1;
}
.quick-playlist-grid {
  display: grid;
  grid-template-columns: repeat(3,minmax(0,1fr));
  gap: 18px;
}
.quick-card {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  gap: 14px;
  border-radius: 26px;
  padding: 24px;
  background: #181818;
  border: 1px solid rgba(255,255,255,.08);
  transition: transform .2s, background .2s;
}
.quick-card:hover { transform: translateY(-3px); background: #282828; }
.quick-thumb {
  width: 100%;
  height: 150px;
  border-radius: 22px;
  overflow: hidden;
  background: #111;
}
.quick-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.quick-label { font-size: .78rem; text-transform: uppercase; letter-spacing: .08em; color: rgba(255,255,255,.55); }
.quick-title { font-size: 1.05rem; font-weight: 800; }
.section {
  margin-bottom: 32px;
}
.section-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
  margin-bottom: 18px;
}
.section-title { font-family: 'Syne', sans-serif; font-size: 1.2rem; font-weight: 800; }
.section-action { font-size: .9rem; color: rgba(255,255,255,.6); text-decoration: none; transition: color .2s; }
.section-action:hover { color: #fff; }
.horizontal-scroll {
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: minmax(220px,1fr);
  gap: 16px;
  overflow-x: auto;
  padding-bottom: 6px;
}
.horizontal-scroll::-webkit-scrollbar { display: none; }
.album-card {
  background: #181818;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 24px;
  min-width: 220px;
  overflow: hidden;
  transition: transform .2s, border-color .2s;
}
.album-card:hover {
  transform: translateY(-3px);
  border-color: rgba(255,59,48,.4);
}
.album-thumb {
  height: 140px;
  background: linear-gradient(135deg, #222222 0%, #ff3b30 100%);
  display: grid;
  place-items: center;
  color: #0a0a0a;
  font-size: 2rem;
  font-weight: 700;
  overflow: hidden;
}
.album-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.album-info { padding: 16px; }
.album-name { font-size: 1rem; font-weight: 700; }
.album-sub { font-size: .85rem; color: rgba(255,255,255,.6); margin-top: 6px; }
.featured-grid {
  display: grid;
  grid-template-columns: repeat(3,minmax(0,1fr));
  gap: 20px;
}
.featured-card {
  background: #181818;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 28px;
  padding: 24px;
  transition: transform .2s, border-color .2s;
}
.featured-card:hover {
  transform: translateY(-3px);
  border-color: rgba(255,59,48,.4);
}
.featured-cover {
  height: 150px;
  border-radius: 22px;
  background: linear-gradient(135deg, #ff3b30, #cc2e28);
  overflow: hidden;
  display: grid;
  place-items: center;
}
.featured-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.featured-title { font-size: 1rem; font-weight: 800; margin-top: 14px; }
.featured-body { font-size: .9rem; color: rgba(255,255,255,.65); line-height: 1.7; margin-top: 10px; }
@media (max-width: 1100px) {
  .hero { grid-template-columns: 1fr; }
  .featured-grid { grid-template-columns: 1fr; }
  .quick-playlist-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
}
@media (max-width: 760px) {
  .app-shell { flex-direction: column; }
  .sidebar { width: 100%; height: auto; position: relative; }
  .main-scroll { padding: 20px; }
  .search-bar { min-width: 100%; }
  .nav-group { flex-direction: row; flex-wrap: wrap; gap: 10px; }
  .nav-item { flex: 1 1 calc(50% - 10px); }
  .hero { gap: 16px; }
}
</style>
</head>
<body>
  <div class="app-shell">
    <aside class="sidebar">
      <div class="logo">MUS.IC</div>
      <nav class="nav-group">
        <a class="nav-item active" href="{{ route('home') }}"><i class="ti ti-home"></i> Home</a>
        <a class="nav-item" href="#"><i class="ti ti-search"></i> Search</a>
        <a class="nav-item" href="#"><i class="ti ti-layout-list"></i> Your Library</a>
        <a class="nav-item" href="#"><i class="ti ti-playlist"></i> Made For You</a>
        <a class="nav-item" href="#"><i class="ti ti-music"></i> New Releases</a>
        <a class="nav-item" href="#"><i class="ti ti-radio"></i> Discover</a>
      </nav>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-item logout"> <i class="ti ti-logout"></i> Logout</button>
      </form>
      <a class="sidebar-user" href="{{ route('profile.edit') }}">
        @if (auth()->user()->profile_image)
          <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile photo">
        @else
          <div class="avatar-fallback">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div>
        @endif
        <div class="user-meta">
          <div class="user-name">{{ auth()->user()->name ?? 'User' }}</div>
          <div class="user-role">Premium listener</div>
        </div>
      </a>
    </aside>

    <main class="main">
      <div class="main-scroll">
        <div class="topbar">
          <div class="title-group">
            <div class="page-title">Good evening, {{ auth()->user()->name ?? 'listener' }}</div>
            <div class="page-sub">Your personalized music experience is waiting for you.</div>
          </div>
          <div class="search-bar">
            <i class="ti ti-search"></i>
            <input type="search" placeholder="Search for songs, artists, or podcasts">
          </div>
        </div>

        <div class="hero">
          <div class="hero-card">
            <div class="hero-title">Your daily mix is ready.</div>
            <div class="hero-sub">Jump back into your favorite music and explore new recommendations chosen just for you.</div>
          </div>
          <div class="quick-playlist-grid">
            <a class="quick-card" href="#">
              <div class="quick-thumb"><img src="{{ asset('images/assets/IVOS.jpg') }}" alt="IVOSforLife"></div>
              <div class="quick-label">Playlist</div>
              <div class="quick-title">IVOSforLife</div>
            </a>
            <a class="quick-card" href="#">
               <div class="quick-thumb"><img src="{{ asset('images/assets/opm.jpg') }}" alt="OPM lang malakas"></div>
              <div class="quick-label">Playlist</div>
              <div class="quick-title">OPM lang malakas</div>
            </a>
            <a class="quick-card" href="#">
              <div class="quick-thumb"><img src="{{ asset('images/assets/10pm.jpg') }}" alt="It's 10PM time"></div>
              <div class="quick-label">Playlist</div>
              <div class="quick-title">It's 10PM time</div>
            </a>
          </div>
        </div>

        <section class="section">
          <div class="section-header">
            <div class="section-title">Recently played</div>
            <a class="section-action" href="#">Show all</a>
          </div>
          <div class="horizontal-scroll">
            <a class="album-card" href="#">
              <div class="album-thumb"><img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=300&h=300&fit=crop" alt="Acoustic Afternoon"></div>
              <div class="album-info">
                <div class="album-name">IV Of Spade</div>
                <div class="album-sub">Playlist • 27 tracks</div>
              </div>
            </a>
            <a class="album-card" href="#">
              <div class="album-thumb"><img src="https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=300&h=300&fit=crop" alt="Beat Machine"></div>
              <div class="album-info">
                <div class="album-name">Zild</div>
                <div class="album-sub">Playlist • 41 tracks</div>
              </div>
            </a>
            <a class="album-card" href="#">
              <div class="album-thumb"><img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300&h=300&fit=crop" alt="Evening Acoustic"></div>
              <div class="album-info">
                <div class="album-name">Joji</div>
                <div class="album-sub">Playlist • 23 tracks</div>
              </div>
            </a>
            <a class="album-card" href="#">
              <div class="album-thumb"><img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=300&h=300&fit=crop" alt="Hip Hop Hits"></div>
              <div class="album-info">
                <div class="album-name">Hip Hop Hits</div>
                <div class="album-sub">Playlist • 28 tracks</div>
              </div>
            </a>
          </div>
        </section>

        <section class="section">
          <div class="section-header">
            <div class="section-title">Made for you</div>
            <a class="section-action" href="#">See more</a>
          </div>
          <div class="featured-grid">
            <div class="featured-card">
              <div class="featured-cover"><img src="https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=400&h=300&fit=crop" alt="Fresh Finds"></div>
              <div class="featured-title">Fresh Finds</div>
              <div class="featured-body">Discover the music trending in your city right now.</div>
            </div>
            <div class="featured-card">
              <div class="featured-cover"><img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=400&h=300&fit=crop" alt="Mood Booster"></div>
              <div class="featured-title">Mood Booster</div>
              <div class="featured-body">Playlists to keep your energy high and your day bright.</div>
            </div>
            <div class="featured-card">
              <div class="featured-cover"><img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=400&h=300&fit=crop" alt="Deep Focus"></div>
              <div class="featured-title">Deep Focus</div>
              <div class="featured-body">Ambient and mellow tracks to help you concentrate.</div>
            </div>
          </div>
        </section>

        <section class="section">
          <div class="section-header">
            <div class="section-title">New releases</div>
            <a class="section-action" href="#">View all</a>
          </div>
          <div class="featured-grid">
            <a class="featured-card" href="#">
              <div class="featured-cover"><img src="https://images.unsplash.com/photo-1511379938547-c1f69b13d835?w=400&h=300&fit=crop" alt="Night Drive"></div>
              <div class="featured-title">Night Drive</div>
              <div class="featured-body">New album</div>
            </a>
            <a class="featured-card" href="#">
              <div class="featured-cover"><img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400&h=300&fit=crop" alt="Soul Sessions"></div>
              <div class="featured-title">Soul Sessions</div>
              <div class="featured-body">New EP</div>
            </a>
            <a class="featured-card" href="#">
              <div class="featured-cover"><img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=400&h=300&fit=crop" alt="Waveform"></div>
              <div class="featured-title">Waveform</div>
              <div class="featured-body">New single</div>
            </a>
          </div>
        </section>
      </div>
    </main>
  </div>
</body>
</html>
