<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MUS.IC — Home</title>
<link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
<style>
*, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

:root {
    --bg: #111111;
    --sidebar-bg: #000;
    --panel-bg: #1a1a1a;
    --surface: #242424;
    --surface-hover: #2e2e2e;
    --accent: #ff3b30;
    --accent2: #ff6b61;
    --text: #fff;
    --muted: rgba(255, 255, 255, .55);
    --border: rgba(255, 255, 255, .08);
    --player-bg: #181818;
    --bar-height: 90px;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: 'Figtree', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    overflow: hidden;
}

.shell {
    display: grid;
    grid-template-columns: 260px 1fr;
    grid-template-rows: 1fr var(--bar-height);
    height: 100vh;
    grid-template-areas:
        "sidebar main"
        "player  player";
}

.sidebar {
    grid-area: sidebar;
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    gap: 0;
    overflow-y: auto;
    overflow-x: hidden;
    padding-bottom: 8px;
}

.sidebar::-webkit-scrollbar { width: 4px; }
.sidebar::-webkit-scrollbar-thumb { background: var(--border); border-radius: 99px; }

.logo-wrap {
    padding: 24px 20px 18px;
}

.logo {
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--accent);
    letter-spacing: .05em;
}

.nav-section {
    background: #121212;
    border-radius: 12px;
    margin: 0 8px 8px;
    padding: 8px;
}

.nav-label {
    font-size: .7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .1em;
    color: var(--muted);
    padding: 8px 12px 6px;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 10px 12px;
    border-radius: 8px;
    color: var(--muted);
    text-decoration: none;
    font-size: .92rem;
    font-weight: 600;
    transition: color .15s, background .15s;
    cursor: pointer;
    border: none;
    background: transparent;
    width: 100%;
    text-align: left;
}

.nav-item i {
    font-size: 20px;
    flex-shrink: 0;
}

.nav-item:hover {
    color: #fff;
    background: rgba(255, 255, 255, .07);
}

.nav-item.active { color: #fff; }
.nav-item.active i { color: var(--accent); }

.library-section {
    background: #121212;
    border-radius: 12px;
    margin: 0 8px 8px;
    padding: 8px;
    flex: 1;
}

.library-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px 12px;
}

.library-header span {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: .92rem;
    font-weight: 700;
    color: var(--muted);
}

.library-header i {
    font-size: 20px;
}

.library-add {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--surface);
    border: none;
    color: var(--muted);
    display: grid;
    place-items: center;
    cursor: pointer;
    font-size: 18px;
    transition: background .15s, color .15s;
}

.library-add:hover {
    background: var(--surface-hover);
    color: #fff;
}

.playlist-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 12px;
    border-radius: 8px;
    text-decoration: none;
    transition: background .15s;
    cursor: pointer;
}

.playlist-item:hover {
    background: rgba(255, 255, 255, .07);
}

.playlist-thumb {
    width: 44px;
    height: 44px;
    border-radius: 6px;
    overflow: hidden;
    background: var(--surface);
    flex-shrink: 0;
}

.playlist-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.playlist-thumb.round {
    border-radius: 50%;
}

.playlist-meta {
    flex: 1;
    min-width: 0;
}

.playlist-name {
    font-size: .88rem;
    font-weight: 600;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.playlist-sub {
    font-size: .78rem;
    color: var(--muted);
    margin-top: 2px;
}

.main {
    grid-area: main;
    background: var(--bg);
    overflow-y: auto;
    overflow-x: hidden;
}

.main::-webkit-scrollbar { width: 8px; }
.main::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, .15); border-radius: 99px; }

.top-gradient {
    background: linear-gradient(180deg, rgba(255, 59, 48, .35) 0%, var(--bg) 100%);
    padding: 20px 28px 0;
    position: sticky;
    top: 0;
    z-index: 10;
}

.topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    padding-bottom: 20px;
}

.topbar-nav {
    display: flex;
    gap: 8px;
}

.nav-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(0, 0, 0, .5);
    border: none;
    color: var(--text);
    display: grid;
    place-items: center;
    cursor: pointer;
    font-size: 18px;
    transition: background .15s;
}

.nav-btn:hover {
    background: rgba(0, 0, 0, .7);
}

.search-wrapper {
    position: relative;
    width: 340px;
}

.search-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    background: #fff;
    border-radius: 999px;
    width: 100%;
}

.search-bar i {
    font-size: 18px;
    color: #000;
}

.search-bar input {
    flex: 1;
    background: transparent;
    border: none;
    color: #000;
    font-size: .9rem;
    font-family: 'Figtree', sans-serif;
    outline: none;
}

.search-bar input::placeholder {
    color: rgba(0, 0, 0, .5);
}

#searchDropdown {
    display: none;
    position: absolute;
    top: calc(100% + 8px);
    left: 0;
    right: 0;
    background: #282828;
    border-radius: 12px;
    overflow: hidden;
    z-index: 999;
    box-shadow: 0 8px 32px rgba(0, 0, 0, .6);
    max-height: 400px;
    overflow-y: auto;
}

#searchDropdown::-webkit-scrollbar { width: 4px; }
#searchDropdown::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, .2); border-radius: 99px; }

.user-area {
    display: flex;
    align-items: center;
    gap: 10px;
}

.icon-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(0, 0, 0, .5);
    border: none;
    color: #fff;
    display: grid;
    place-items: center;
    cursor: pointer;
    font-size: 18px;
}

.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--accent);
    display: grid;
    place-items: center;
    font-weight: 800;
    font-size: .95rem;
    cursor: pointer;
    overflow: hidden;
    flex-shrink: 0;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.scroll-content {
    padding: 24px 28px 32px;
}

.filter-chips {
    display: flex;
    gap: 8px;
    margin-bottom: 26px;
    flex-wrap: wrap;
}

.chip {
    padding: 8px 16px;
    border-radius: 999px;
    font-size: .88rem;
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: background .15s, color .15s;
}

.chip.active {
    background: #fff;
    color: #000;
}

.chip:not(.active) {
    background: var(--surface);
    color: #fff;
}

.chip:not(.active):hover {
    background: var(--surface-hover);
}

.greeting {
    font-size: 1.6rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.quick-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    margin-bottom: 32px;
}

.quick-item {
    display: flex;
    align-items: center;
    gap: 14px;
    background: var(--surface);
    border-radius: 8px;
    overflow: hidden;
    text-decoration: none;
    color: #fff;
    font-weight: 700;
    font-size: .92rem;
    transition: background .15s;
    cursor: pointer;
}

.quick-item:hover {
    background: #3a3a3a;
}

.quick-item .qi-thumb {
    width: 56px;
    height: 56px;
    flex-shrink: 0;
    overflow: hidden;
}

.quick-item .qi-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.quick-item span {
    padding-right: 10px;
}

.section {
    margin-bottom: 36px;
}

.section-head {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    margin-bottom: 16px;
}

.section-title {
    font-size: 1.4rem;
    font-weight: 800;
}

.show-all {
    font-size: .82rem;
    font-weight: 700;
    color: var(--muted);
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: .06em;
    transition: color .15s;
}

.show-all:hover {
    color: #fff;
}

.cards-row {
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: 185px;
    gap: 18px;
    overflow-x: auto;
    padding-bottom: 4px;
}

.cards-row::-webkit-scrollbar { display: none; }

.card {
    background: var(--panel-bg);
    border-radius: 12px;
    padding: 16px;
    text-decoration: none;
    color: #fff;
    transition: background .15s;
    cursor: pointer;
    position: relative;
}

.card:hover {
    background: #2a2a2a;
}

.card:hover .card-play {
    opacity: 1;
    transform: translateY(0);
}

.card-thumb {
    width: 100%;
    aspect-ratio: 1;
    border-radius: 8px;
    overflow: hidden;
    background: var(--surface);
    margin-bottom: 14px;
    position: relative;
}

.card-thumb.round {
    border-radius: 50%;
}

.card-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.card-play {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: var(--accent);
    border: none;
    display: grid;
    place-items: center;
    cursor: pointer;
    font-size: 18px;
    color: #fff;
    opacity: 0;
    transform: translateY(6px);
    transition: opacity .2s, transform .2s;
    box-shadow: 0 6px 18px rgba(0, 0, 0, .5);
}

.card-name {
    font-size: .92rem;
    font-weight: 700;
    margin-bottom: 6px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.card-sub {
    font-size: .8rem;
    color: var(--muted);
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.player {
    grid-area: player;
    background: var(--player-bg);
    border-top: 1px solid var(--border);
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    align-items: center;
    padding: 0 20px;
    gap: 16px;
}

.now-playing {
    display: flex;
    align-items: center;
    gap: 14px;
    min-width: 0;
}

.np-thumb {
    width: 56px;
    height: 56px;
    border-radius: 6px;
    overflow: hidden;
    background: var(--surface);
    flex-shrink: 0;
    position: relative;
}

.np-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.np-thumb-placeholder {
    width: 100%;
    height: 100%;
    display: grid;
    place-items: center;
    font-size: 1.4rem;
    background: var(--surface);
}

.np-meta {
    min-width: 0;
}

.np-title {
    font-size: .9rem;
    font-weight: 700;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.np-artist {
    font-size: .78rem;
    color: var(--muted);
    margin-top: 3px;
}

.np-actions {
    display: flex;
    gap: 14px;
    align-items: center;
    margin-left: 8px;
}

.np-btn {
    background: none;
    border: none;
    color: var(--muted);
    cursor: pointer;
    font-size: 18px;
    display: grid;
    place-items: center;
    transition: color .15s;
}

.np-btn:hover { color: #fff; }
.np-btn.liked { color: var(--accent); }

.player-controls {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.controls-row {
    display: flex;
    align-items: center;
    gap: 20px;
}

.ctrl-btn {
    background: none;
    border: none;
    color: var(--muted);
    cursor: pointer;
    font-size: 18px;
    display: grid;
    place-items: center;
    transition: color .15s;
}

.ctrl-btn:hover {
    color: #fff;
}

.play-btn {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #fff;
    border: none;
    display: grid;
    place-items: center;
    cursor: pointer;
    font-size: 20px;
    color: #000;
    transition: transform .15s;
}

.play-btn:hover {
    transform: scale(1.06);
}

.progress-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
}

.progress-time {
    font-size: .75rem;
    color: var(--muted);
    min-width: 36px;
    text-align: center;
}

.progress-track {
    flex: 1;
    height: 4px;
    background: rgba(255, 255, 255, .2);
    border-radius: 99px;
    position: relative;
    cursor: pointer;
}

.progress-fill {
    height: 100%;
    width: 0%;
    background: #fff;
    border-radius: 99px;
    transition: width .1s linear;
    position: relative;
}

.progress-track:hover .progress-fill {
    background: var(--accent);
}

.progress-fill::after {
    content: '';
    position: absolute;
    right: -5px;
    top: -4px;
    width: 12px;
    height: 12px;
    background: #fff;
    border-radius: 50%;
    opacity: 0;
    transition: opacity .15s;
}

.progress-track:hover .progress-fill::after {
    opacity: 1;
}

.player-extra {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
}

.vol-row {
    display: flex;
    align-items: center;
    gap: 8px;
}

.vol-track {
    width: 90px;
    height: 4px;
    background: rgba(255, 255, 255, .2);
    border-radius: 99px;
    cursor: pointer;
}

.vol-fill {
    height: 100%;
    width: 70%;
    background: #fff;
    border-radius: 99px;
}

.vol-track:hover .vol-fill {
    background: var(--accent);
}

@keyframes npFlash {
    0%, 100% { background: var(--player-bg); }
    50%       { background: #2a1a1a; }
}

.player.flash {
    animation: npFlash .5s ease;
}
</style>
</head>
<body>
<div class="shell">

    <aside class="sidebar">
        <div class="logo-wrap">
            <div class="logo">MUS.IC</div>
        </div>

        <nav class="nav-section">
            <a class="nav-item active" href="{{ route('home') }}"><i class="ti ti-home-filled"></i> Home</a>
            <a class="nav-item" href="{{ route('search') }}"><i class="ti ti-search"></i> Search</a>
        </nav>

        <div class="library-section">
            <div class="library-header">
                <span><i class="ti ti-layout-list"></i> Your Library</span>
                <button class="library-add"><i class="ti ti-plus"></i></button>
            </div>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb" style="background:linear-gradient(135deg,#4b3fa0,#e040fb)"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">Liked Songs</div>
                    <div class="playlist-sub">Playlist • 142 songs</div>
                </div>
            </a>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb"><img src="{{ asset('images/assets/IVOS.jpg') }}" alt="IVOSforLife"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">IVOSforLife</div>
                    <div class="playlist-sub">Playlist • You</div>
                </div>
            </a>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb"><img src="{{ asset('images/assets/opm.jpg') }}" alt="OPM lang malakas"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">OPM lang malakas</div>
                    <div class="playlist-sub">Playlist • You</div>
                </div>
            </a>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb"><img src="{{ asset('images/assets/10pm.jpg') }}" alt="It's 10PM time"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">It's 10PM time</div>
                    <div class="playlist-sub">Playlist • You</div>
                </div>
            </a>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb round"><img src="{{ asset('images/assets/IV.jpg') }}" alt="IV Of Spade"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">IV OF SPADES</div>
                    <div class="playlist-sub">Artist</div>
                </div>
            </a>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb round"><img src="{{ asset('images/assets/Zild.jpg') }}" alt="Zild"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">Zild</div>
                    <div class="playlist-sub">Artist</div>
                </div>
            </a>

            <a class="playlist-item" href="#">
                <div class="playlist-thumb"><img src="{{ asset('images/assets/andalucia.jpg') }}" alt="Andalucia"></div>
                <div class="playlist-meta">
                    <div class="playlist-name">Andalucia</div>
                    <div class="playlist-sub">Album • IV Of Spades</div>
                </div>
            </a>
        </div>

        <form method="POST" action="{{ route('logout') }}" style="padding:8px 8px 0;">
            @csrf
            <button type="submit" class="nav-item" style="color:rgba(255,255,255,.5)">
                <i class="ti ti-logout"></i> Log out
            </button>
        </form>
    </aside>

    <main class="main">
        <div class="top-gradient">
            <div class="topbar">
                <div class="topbar-nav">
                    <button class="nav-btn"><i class="ti ti-chevron-left"></i></button>
                    <button class="nav-btn"><i class="ti ti-chevron-right"></i></button>
                </div>

                <div class="search-wrapper">
                    <form class="search-bar" method="GET" action="{{ route('search') }}">
                        <i class="ti ti-search"></i>
                        <input name="q" type="search" id="searchInput" value="{{ request('q') }}" placeholder="What do you want to play?" autocomplete="off">
                    </form>
                    <div id="searchDropdown"></div>
                </div>

                <div class="user-area">
                    <button class="icon-btn"><i class="ti ti-bell"></i></button>
                    <a href="{{ route('profile.edit') }}" style="text-decoration:none;">
                        @if(auth()->user()->profile_image)
                            <div class="user-avatar">
                                <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" alt="avatar">
                            </div>
                        @else
                            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div>
                        @endif
                    </a>
                </div>
            </div>
        </div>

        <div class="scroll-content">
            <div class="filter-chips">
                <button class="chip active">All</button>
                <button class="chip">Music</button>
                <button class="chip">Podcasts</button>
            </div>

            <div class="greeting">Good evening, {{ auth()->user()->name ?? 'listener' }}</div>

            <div class="quick-grid">
                <a class="quick-item" href="#">
                    <div class="qi-thumb"><img src="{{ asset('images/assets/IVOS.jpg') }}" alt="IVOSforLife"></div>
                    <span>IVOSforLife</span>
                </a>
                <a class="quick-item" href="#">
                    <div class="qi-thumb"><img src="{{ asset('images/assets/opm.jpg') }}" alt="OPM lang malakas"></div>
                    <span>OPM lang malakas</span>
                </a>
                <a class="quick-item" href="#">
                    <div class="qi-thumb"><img src="{{ asset('images/assets/10pm.jpg') }}" alt="It's 10PM time"></div>
                    <span>It's 10PM time</span>
                </a>
                <a class="quick-item" href="#">
                    <div class="qi-thumb" style="background:linear-gradient(135deg,#4b3fa0,#e040fb);display:grid;place-items:center;font-size:1.4rem;">♥</div>
                    <span>Liked Songs</span>
                </a>
                <a class="quick-item" href="#">
                    <div class="qi-thumb"><img src="{{ asset('images/assets/andalucia.jpg') }}" alt="Andalucia"></div>
                    <span>Andalucia</span>
                </a>
                <a class="quick-item" href="#">
                    <div class="qi-thumb"><img src="{{ asset('images/assets/superpower.jpg') }}" alt="Superpower"></div>
                    <span>Superpower</span>
                </a>
            </div>

            <section class="section">
                <div class="section-head">
                    <div class="section-title">It's New Music Friday!</div>
                    <a class="show-all" href="#">Show all</a>
                </div>
                <div class="cards-row">
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/andalucia.jpg') }}" alt="Andalucia">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Andalucia</div>
                        <div class="card-sub">IV Of Spades • New Album</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/superpower.jpg') }}" alt="Superpower">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Superpower</div>
                        <div class="card-sub">Zild • New Album</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/aswang.jpg') }}" alt="Aswang Sa Maynila">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Aswang Sa Maynila</div>
                        <div class="card-sub">Fitterkarma • New Single</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/Pwedekaba.jpg') }}" alt="Pwede Ka Ba?">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Pwede Ka Ba?</div>
                        <div class="card-sub">Frank Ely • Album</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/Slowdancing.jpg') }}" alt="Slow Dancing In The Dark">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Slow Dancing In The Dark</div>
                        <div class="card-sub">Joji • Album</div>
                    </a>
                </div>
            </section>

            <section class="section">
                <div class="section-head">
                    <div class="section-title">Your top mixes</div>
                    <a class="show-all" href="#">Show all</a>
                </div>
                <div class="cards-row">
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/IV.jpg') }}" alt="IV Of Spade">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">OPM Mix</div>
                        <div class="card-sub">IV Of Spades, Zild, Frank Ely and more</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/joji.jpg') }}" alt="Joji">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Chill Mix</div>
                        <div class="card-sub">Joji, keshi, Mitski and more</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/IVOS.jpg') }}" alt="IVOSforLife">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">IVOSforLife Mix</div>
                        <div class="card-sub">Based on your playlist</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/opm.jpg') }}" alt="OPM">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Indie Pilipinas</div>
                        <div class="card-sub">Best of Filipino indie</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/10pm.jpg') }}" alt="Late Night">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Late Night Mix</div>
                        <div class="card-sub">Joji, keshi and more</div>
                    </a>
                </div>
            </section>

            <section class="section">
                <div class="section-head">
                    <div class="section-title">Your favorite artists</div>
                    <a class="show-all" href="#">Show all</a>
                </div>
                <div class="cards-row">
                    <a class="card" href="#">
                        <div class="card-thumb round">
                            <img src="{{ asset('images/assets/IV.jpg') }}" alt="IV Of Spades">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">IV Of Spades</div>
                        <div class="card-sub">Artist</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb round">
                            <img src="{{ asset('images/assets/Zild.jpg') }}" alt="Zild">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Zild</div>
                        <div class="card-sub">Artist</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb round">
                            <img src="{{ asset('images/assets/joji.jpg') }}" alt="Joji">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Joji</div>
                        <div class="card-sub">Artist</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb round">
                            <img src="{{ asset('images/assets/frankely.jpg') }}" alt="Frank Ely">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Frank Ely</div>
                        <div class="card-sub">Artist</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb round">
                            <img src="{{ asset('images/assets/fitterkarma.jpg') }}" alt="Fitterkarma">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Fitterkarma</div>
                        <div class="card-sub">Artist</div>
                    </a>
                </div>
            </section>

            <section class="section">
                <div class="section-head">
                    <div class="section-title">Recently played</div>
                    <a class="show-all" href="#">Show all</a>
                </div>
                <div class="cards-row">
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/Slowdancing.jpg') }}" alt="Slow Dancing">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Slow Dancing In The Dark</div>
                        <div class="card-sub">Joji</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/Pwedekaba.jpg') }}" alt="Pwede Ka Ba?">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Pwede Ka Ba?</div>
                        <div class="card-sub">Frank Ely</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/andalucia.jpg') }}" alt="Andalucia">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Andalucia</div>
                        <div class="card-sub">IV Of Spades</div>
                    </a>
                    <a class="card" href="#">
                        <div class="card-thumb">
                            <img src="{{ asset('images/assets/superpower.jpg') }}" alt="Superpower">
                            <button class="card-play"><i class="ti ti-player-play-filled"></i></button>
                        </div>
                        <div class="card-name">Superpower</div>
                        <div class="card-sub">Zild</div>
                    </a>
                </div>
            </section>
        </div>
    </main>

    <footer class="player" id="playerBar">
        <div class="now-playing">
            <div class="np-thumb">
                <img id="npArt" src="{{ asset('images/assets/Slowdancing.jpg') }}" alt="Now Playing" style="display:block;">
                <div id="npArtPlaceholder" class="np-thumb-placeholder" style="display:none;">🎵</div>
            </div>
            <div class="np-meta">
                <div class="np-title" id="npTitle">Slow Dancing In The Dark</div>
                <div class="np-artist" id="npArtist">Joji</div>
            </div>
            <div class="np-actions">
                <button class="np-btn liked"><i class="ti ti-heart-filled"></i></button>
                <button class="np-btn"><i class="ti ti-picture-in-picture"></i></button>
            </div>
        </div>

        <div class="player-controls">
            <div class="controls-row">
                <button class="ctrl-btn"><i class="ti ti-arrows-shuffle"></i></button>
                <button class="ctrl-btn"><i class="ti ti-player-skip-back-filled"></i></button>
                <button class="play-btn" id="playBtn"><i class="ti ti-player-play-filled"></i></button>
                <button class="ctrl-btn"><i class="ti ti-player-skip-forward-filled"></i></button>
                <button class="ctrl-btn"><i class="ti ti-repeat"></i></button>
            </div>
            <div class="progress-bar">
                <span class="progress-time" id="curTime">0:00</span>
                <div class="progress-track" id="progressTrack">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
                <span class="progress-time">2:31</span>
            </div>
        </div>

        <div class="player-extra">
            <button class="ctrl-btn"><i class="ti ti-microphone-2"></i></button>
            <button class="ctrl-btn"><i class="ti ti-list"></i></button>
            <button class="ctrl-btn"><i class="ti ti-device-speaker"></i></button>
            <div class="vol-row">
                <button class="ctrl-btn"><i class="ti ti-volume"></i></button>
                <div class="vol-track"><div class="vol-fill"></div></div>
            </div>
            <button class="ctrl-btn"><i class="ti ti-arrows-maximize"></i></button>
        </div>
    </footer>

</div>

<script>
document.querySelectorAll('.chip').forEach(chip => {
    chip.addEventListener('click', () => {
        document.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
    });
});

const searchInput = document.getElementById('searchInput');
const dropdown    = document.getElementById('searchDropdown');

searchInput.addEventListener('input', async function () {
    const q = this.value.trim();
    if (q.length < 1) {
        dropdown.style.display = 'none';
        dropdown.innerHTML = '';
        return;
    }

    try {
        const res   = await fetch(`/search?q=${encodeURIComponent(q)}`);
        const songs = await res.json();

        if (songs.length === 0) {
            dropdown.innerHTML = `<div style="padding:20px;text-align:center;color:rgba(255,255,255,.5);font-size:.9rem;">No results for "<strong style="color:#fff">${q}</strong>"</div>`;
        } else {
            dropdown.innerHTML = songs.map(s => `
                <div onclick="selectSong('${s.title.replace(/'/g,"\\'")}','${(s.artist||'').replace(/'/g,"\\'")}',this)"
                    style="display:flex;align-items:center;gap:14px;padding:12px 16px;cursor:pointer;transition:background .15s;border-bottom:1px solid rgba(255,255,255,.06);"
                    onmouseover="this.style.background='rgba(255,255,255,.1)'"
                    onmouseout="this.style.background='transparent'">
                    <div class="song-art-wrap" style="width:42px;height:42px;border-radius:6px;overflow:hidden;flex-shrink:0;background:#222;position:relative;">
                        <img src="" data-title="${s.title}" data-artist="${s.artist||''}"
                            style="width:100%;height:100%;object-fit:cover;display:none;" class="dd-art">
                        <div class="dd-ph" style="position:absolute;inset:0;display:grid;place-items:center;font-size:1.1rem;background:linear-gradient(135deg,#ff3b30,#cc2e28);">🎵</div>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:.92rem;font-weight:700;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${s.title}</div>
                        <div style="font-size:.78rem;color:rgba(255,255,255,.55);margin-top:2px;">${s.artist||''}${s.album?' • '+s.album:''}${s.duration?' • '+s.duration:''}</div>
                    </div>
                    <i class="ti ti-player-play" style="color:rgba(255,255,255,.4);font-size:16px;"></i>
                </div>
            `).join('');

            dropdown.querySelectorAll('img.dd-art').forEach(img => {
                const q2 = encodeURIComponent(img.dataset.title + ' ' + img.dataset.artist);
                fetch('https://itunes.apple.com/search?term=' + q2 + '&media=music&limit=1')
                    .then(r => r.json())
                    .then(d => {
                        if (d.results && d.results.length > 0) {
                            img.src = d.results[0].artworkUrl100;
                            img.style.display = 'block';
                            const ph = img.closest('.song-art-wrap').querySelector('.dd-ph');
                            if (ph) ph.style.display = 'none';
                        }
                    }).catch(() => {});
            });
        }

        dropdown.style.display = 'block';
    } catch (err) {
        console.error(err);
    }
});

function selectSong(title, artist) {
    searchInput.value = title;
    dropdown.style.display = 'none';
    loadPlayer(title, artist);
}

document.addEventListener('click', e => {
    if (!searchInput.closest('.search-wrapper').contains(e.target)) {
        dropdown.style.display = 'none';
    }
});

function loadPlayer(title, artist) {
    document.getElementById('npTitle').textContent  = title;
    document.getElementById('npArtist').textContent = artist;

    const art = document.getElementById('npArt');
    const ph  = document.getElementById('npArtPlaceholder');
    art.style.display = 'none';
    ph.style.display  = 'block';

    const bar = document.getElementById('playerBar');
    bar.classList.remove('flash');
    void bar.offsetWidth;
    bar.classList.add('flash');

    const q = encodeURIComponent(title + ' ' + artist);
    fetch('https://itunes.apple.com/search?term=' + q + '&media=music&limit=1')
        .then(r => r.json())
        .then(d => {
            if (d.results && d.results.length > 0) {
                const url = d.results[0].artworkUrl100.replace('100x100bb', '300x300bb');
                art.src = url;
                art.style.display = 'block';
                ph.style.display  = 'none';
            }
        }).catch(() => {});

    sessionStorage.setItem('nowPlaying', JSON.stringify({ title, artist }));

    elapsed = 0;
    document.getElementById('progressFill').style.width = '0%';
    document.getElementById('curTime').textContent = '0:00';
}

document.addEventListener('DOMContentLoaded', () => {
    const saved = sessionStorage.getItem('nowPlaying');
    if (saved) {
        try {
            const { title, artist } = JSON.parse(saved);
            loadPlayer(title, artist);
        } catch (e) {}
    }
});

let playing = false, totalSeconds = 151, elapsed = 0, interval;
const playBtn = document.getElementById('playBtn');
const fill    = document.getElementById('progressFill');
const curTime = document.getElementById('curTime');

function formatTime(s) {
    return `${Math.floor(s / 60)}:${String(Math.floor(s % 60)).padStart(2, '0')}`;
}

playBtn.addEventListener('click', () => {
    playing = !playing;
    playBtn.innerHTML = playing
        ? '<i class="ti ti-player-pause-filled"></i>'
        : '<i class="ti ti-player-play-filled"></i>';

    if (playing) {
        interval = setInterval(() => {
            elapsed = Math.min(elapsed + 1, totalSeconds);
            fill.style.width = (elapsed / totalSeconds * 100) + '%';
            curTime.textContent = formatTime(elapsed);
            if (elapsed >= totalSeconds) {
                clearInterval(interval);
                playing = false;
            }
        }, 1000);
    } else {
        clearInterval(interval);
    }
});

document.getElementById('progressTrack').addEventListener('click', function (e) {
    const pct = (e.clientX - this.getBoundingClientRect().left) / this.getBoundingClientRect().width;
    elapsed = Math.floor(pct * totalSeconds);
    fill.style.width = (pct * 100) + '%';
    curTime.textContent = formatTime(elapsed);
});
</script>

@include('partials.toast')
</body>
</html>
