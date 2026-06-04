<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MUS.IC — Sign In</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
/* ── Reset ── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ── Base ── */
body {
  min-height: 100vh;
  display: flex;
  font-family: 'Inter', sans-serif;
  background: #0a0a0a;
  overflow: hidden;
}


/* ── Left panel ── */
.left {
  width: 48%;
  background: #ff3b30;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 48px;
  position: relative;
  overflow: hidden;
}

.left::after {
  content: '';
  position: absolute;
  bottom: -80px;
  right: -80px;
  width: 360px;
  height: 360px;
  border-radius: 50%;
  background: rgba(255,59,48,.18);
}

.brand {
  font-family: 'Syne', sans-serif;
  font-size: 2.2rem;
  font-weight: 800;
  color: #ffffff;
  letter-spacing: -.03em;
}

.left-hero { z-index: 1; }

.left-hero h2 {
  font-family: 'Syne', sans-serif;
  font-size: 3.2rem;
  font-weight: 800;
  line-height: 1.1;
  color: #ffffff;
  margin-bottom: 16px;
  letter-spacing: -.03em;
}

.left-hero p {
  font-size: 1rem;
  color: rgba(255,255,255,.9);
  max-width: 320px;
  line-height: 1.6;
}

/* ── Wave bars ── */
.wave-bars {
  display: flex;
  align-items: flex-end;
  gap: 5px;
  height: 60px;
  margin-top: 40px;
}

.wave-bars span {
  width: 8px;
  border-radius: 4px;
  background: #ffffff;
  animation: wavebar 1.2s ease-in-out infinite;
}

.wave-bars span:nth-child(1) { height: 30%; animation-delay: 0s;   }
.wave-bars span:nth-child(2) { height: 70%; animation-delay: .1s;  }
.wave-bars span:nth-child(3) { height: 50%; animation-delay: .2s;  }
.wave-bars span:nth-child(4) { height: 90%; animation-delay: .3s;  }
.wave-bars span:nth-child(5) { height: 40%; animation-delay: .4s;  }
.wave-bars span:nth-child(6) { height: 80%; animation-delay: .5s;  }
.wave-bars span:nth-child(7) { height: 60%; animation-delay: .6s;  }
.wave-bars span:nth-child(8) { height: 35%; animation-delay: .7s;  }

@keyframes wavebar {
  0%, 100% { transform: scaleY(1);   }
  50%       { transform: scaleY(1.6); }
}

/* ── Right panel ── */
.right {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 48px;
}

/* ── Form box ── */
.form-box {
  width: 100%;
  max-width: 400px;
  animation: fadeUp .5s cubic-bezier(.16,1,.3,1) both;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0);    }
}

.form-box h3 {
  font-family: 'Syne', sans-serif;
  font-size: 1.9rem;
  font-weight: 800;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 6px;
}

.form-box .sub          { color: rgba(255,255,255,.38); font-size: .88rem; margin-bottom: 36px; }
.form-box .sub a        { color: #ff3b30; text-decoration: none; font-weight: 500; }

/* ── Fields ── */
.field       { margin-bottom: 18px; }

.field label {
  display: block;
  font-size: .75rem;
  font-weight: 500;
  letter-spacing: .07em;
  text-transform: uppercase;
  color: rgba(255,255,255,.38);
  margin-bottom: 7px;
}

.field input {
  width: 100%;
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 12px;
  color: #fff;
  font-family: 'Inter', sans-serif;
  font-size: .95rem;
  padding: 13px 16px;
  outline: none;
  transition: border-color .2s, box-shadow .2s;
}

.field input::placeholder { color: rgba(255,255,255,.2); }
.field input:focus        { border-color: rgba(255,59,48,.5); box-shadow: 0 0 0 3px rgba(255,59,48,.08); }

/* ── Error alert ── */
.err {
  background: rgba(220,53,69,.1);
  border: 1px solid rgba(220,53,69,.25);
  color: #ff8a96;
  border-radius: 10px;
  padding: 11px 14px;
  font-size: .85rem;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 8px;
}

/* ── Submit button ── */
.btn-login {
  width: 100%;
  padding: 14px;
  background: #ff3b30;
  border: none;
  border-radius: 12px;
  font-family: 'Syne', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: #ffffff;
  cursor: pointer;
  letter-spacing: .02em;
  margin-top: 8px;
  transition: background .16s, transform .12s;
}

.btn-login:hover  { background: #cc2e28; transform: translateY(-1px); }
.btn-login:active { transform: translateY(0); }

/* ── Responsive ── */
@media (max-width: 768px) {
  body          { flex-direction: column; overflow: auto; }
  .left         { width: 100%; padding: 32px; min-height: 200px; }
  .left-hero h2 { font-size: 2rem; }
  .right        { padding: 32px; }
}
</style>
</head>
<body>

<div class="left">
  <div class="brand">MUS.IC</div>
  <div class="left-hero">
    <h2>Your music,<br>your world.</h2>
    <p>Millions of songs, curated playlists, and personalized recommendations — all in one place.</p>
    <div class="wave-bars">
      <span></span><span></span><span></span><span></span>
      <span></span><span></span><span></span><span></span>
    </div>
  </div>
  <div style="font-size:.78rem;color:rgba(10,10,10,.4)">© 2025 MUS.IC</div>
</div>

<div class="right">
  <div class="form-box">
    <h3>Welcome back</h3>
    <p class="sub">
      Don't have an account? <a href="{{ route('register') }}">Sign up free</a>
    </p>

    {{-- Session status (e.g. after logout) --}}
    @if (session('status'))
      <div class="err" style="background:rgba(40,167,69,.1);border-color:rgba(40,167,69,.25);color:#75e096;">
        {{ session('status') }}
      </div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
      <div class="err">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <circle cx="12" cy="12" r="10"/>
          <line x1="12" y1="8" x2="12" y2="12"/>
          <line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" novalidate>
      @csrf

      <div class="field">
        <label for="email">Email</label>
        <input  type="email"
                id="email"
                name="email"
                placeholder="you@example.com"
                value="{{ old('email') }}"
                autocomplete="email"
                required>
      </div>

      <div class="field">
        <label for="password">Password</label>
        <input  type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
                required>
      </div>

      <button type="submit" class="btn-login">Sign In →</button>
    </form>

  </div>
</div>

</body>
</html>
