<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MUS.IC — Create Account</title>
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

.left::before {
  content: '';
  position: absolute;
  top: -60px;
  left: -60px;
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background: rgba(255,59,48,.12);
}

.left::after {
  content: '';
  position: absolute;
  bottom: -80px;
  right: -80px;
  width: 360px;
  height: 360px;
  border-radius: 50%;
  background: rgba(255,59,48,.10);
}

.brand {
  font-family: 'Syne', sans-serif;
  font-size: 2.2rem;
  font-weight: 800;
  color: #ffffff;
  letter-spacing: -.03em;
  position: relative;
  z-index: 1;
}

.left-hero { z-index: 1; }

.left-hero h2 {
  font-family: 'Syne', sans-serif;
  font-size: 3rem;
  font-weight: 800;
  line-height: 1.1;
  color: #fff;
  margin-bottom: 16px;
  letter-spacing: -.03em;
}

.left-hero p {
  font-size: .95rem;
  color: rgba(255,255,255,.6);
  line-height: 1.6;
  max-width: 300px;
}

/* ── Perks list ── */
.perks {
  list-style: none;
  margin-top: 28px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.perks li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: .88rem;
  color: rgba(255,255,255,.8);
}

.perk-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #ff3b30;
  flex-shrink: 0;
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

.form-box .sub   { color: rgba(255,255,255,.38); font-size: .88rem; margin-bottom: 32px; }
.form-box .sub a { color: #ff3b30; text-decoration: none; font-weight: 500; }

/* ── Fields ── */
.field { margin-bottom: 16px; }

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
.field input:focus        { border-color: rgba(255,59,48,.6); box-shadow: 0 0 0 3px rgba(255,59,48,.12); }

/* ── Password strength ── */
.strength-bar {
  height: 3px;
  background: rgba(255,255,255,.08);
  border-radius: 2px;
  margin-top: 8px;
  overflow: hidden;
}

.strength-fill  { height: 100%; border-radius: 2px; width: 0; transition: width .3s, background .3s; }
.strength-label { font-size: .72rem; margin-top: 4px; color: rgba(255,255,255,.3); }

/* ── Error alert ── */
.err {
  background: rgba(220,53,69,.1);
  border: 1px solid rgba(220,53,69,.25);
  color: #ff8a96;
  border-radius: 10px;
  padding: 11px 14px;
  font-size: .85rem;
  margin-bottom: 18px;
  display: flex;
  align-items: center;
  gap: 8px;
}

/* ── Submit button ── */
.btn-signup {
  width: 100%;
  padding: 14px;
  background: #ff3b30;
  border: none;
  border-radius: 12px;
  font-family: 'Syne', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: #fff;
  cursor: pointer;
  letter-spacing: .02em;
  margin-top: 8px;
  transition: background .2s, transform .15s;
}

.btn-signup:hover  { background: #1e3de4; transform: translateY(-1px); }
.btn-signup:active { transform: translateY(0); }

.terms {
  font-size: .76rem;
  color: rgba(255,255,255,.25);
  text-align: center;
  margin-top: 16px;
  line-height: 1.5;
}

/* ── Responsive ── */
@media (max-width: 768px) {
  body          { flex-direction: column; overflow: auto; }
  .left         { width: 100%; padding: 32px; min-height: 220px; }
  .left-hero h2 { font-size: 2rem; }
  .right        { padding: 32px; }
}
</style>
</head>
<body>

<div class="left">
  <div class="brand">MUS.IC</div>
  <div class="left-hero">
    <h2>Start listening<br>for free.</h2>
    <p>Create your free account and unlock the full music experience today.</p>
    <ul class="perks">
      <li><span class="perk-dot"></span> Unlimited streaming</li>
      <li><span class="perk-dot"></span> Personalized playlists</li>
      <li><span class="perk-dot"></span> Offline listening</li>
      <li><span class="perk-dot"></span> Artist stats & insights</li>
    </ul>
  </div>
  <div style="font-size:.78rem;color:rgba(255,255,255,.3);z-index:1;position:relative">© 2025 MUS.IC</div>
</div>

<div class="right">
  <div class="form-box">
    <h3>Create account</h3>
    <p class="sub">Already have one? <a href="{{ route('login') }}">Sign in</a></p>

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

    <form method="POST" action="{{ route('register') }}" novalidate>
      @csrf

      <div class="field">
        <label for="fullname">Full Name</label>
        <input  type="text"
                id="fullname"
                name="name"
                placeholder="Your full name"
                value="{{ old('name') }}"
                autocomplete="name"
                required>
      </div>

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
                placeholder="Min. 8 characters"
                autocomplete="new-password"
                oninput="checkStr(this.value)"
                required>
        <div class="strength-bar"><div class="strength-fill" id="sf"></div></div>
        <div class="strength-label" id="sl"></div>
      </div>

      <div class="field">
        <label for="password_confirmation">Confirm Password</label>
        <input  type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="••••••••"
                autocomplete="new-password"
                required>
      </div>

      <button type="submit" class="btn-signup">Create Account →</button>
      <p class="terms">By signing up you agree to our Terms of Service and Privacy Policy.</p>
    </form>
  </div>
</div>

<script>
function checkStr(v){
  const f=document.getElementById('sf'),l=document.getElementById('sl');
  let s=0;
  if(v.length>=8)s++;
  if(/[A-Z]/.test(v))s++;
  if(/[0-9]/.test(v))s++;
  if(/[^A-Za-z0-9]/.test(v))s++;
  const m=[
    {w:'0%',bg:'transparent',t:''},
    {w:'25%',bg:'#e24b4a',t:'Weak'},
    {w:'50%',bg:'#ef9f27',t:'Fair'},
    {w:'75%',bg:'#7c9dff',t:'Good'},
    {w:'100%',bg:'#65e8a0',t:'Strong'}
  ];
  const r=v.length===0?m[0]:m[s]||m[1];
  f.style.width=r.w;f.style.background=r.bg;
  l.textContent=r.t;l.style.color=r.bg;
}
</script>
</body>
</html>
