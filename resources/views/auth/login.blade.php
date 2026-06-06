<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MUS.IC — Sign In</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
*, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    min-height: 100vh;
    display: flex;
    font-family: 'Inter', sans-serif;
    background: #0a0a0a;
    overflow: hidden;
}

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
    background: rgba(255, 59, 48, .18);
}

.brand {
    font-family: 'Syne', sans-serif;
    font-size: 2.2rem;
    font-weight: 800;
    color: #ffffff;
}

.left-hero h2 {
    font-family: 'Syne', sans-serif;
    font-size: 3.2rem;
    font-weight: 800;
    line-height: 1.1;
    color: #ffffff;
    margin-bottom: 16px;
}

.left-hero p {
    font-size: 1rem;
    color: rgba(255, 255, 255, .9);
    max-width: 320px;
    line-height: 1.6;
}

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

.wave-bars span:nth-child(1) { height: 30%; }
.wave-bars span:nth-child(2) { height: 70%; }
.wave-bars span:nth-child(3) { height: 50%; }
.wave-bars span:nth-child(4) { height: 90%; }
.wave-bars span:nth-child(5) { height: 40%; }
.wave-bars span:nth-child(6) { height: 80%; }
.wave-bars span:nth-child(7) { height: 60%; }
.wave-bars span:nth-child(8) { height: 35%; }

@keyframes wavebar {
    0%, 100% { transform: scaleY(1); }
    50%       { transform: scaleY(1.6); }
}

.right {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
}

.form-box {
    width: 100%;
    max-width: 400px;
}

.form-box h3 {
    font-family: 'Syne', sans-serif;
    font-size: 1.9rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 6px;
}

.sub {
    color: rgba(255, 255, 255, .38);
    font-size: .88rem;
    margin-bottom: 36px;
}

.sub a {
    color: #ff3b30;
    text-decoration: none;
}

.field {
    margin-bottom: 18px;
}

.field label {
    display: block;
    font-size: .75rem;
    text-transform: uppercase;
    color: rgba(255, 255, 255, .38);
    margin-bottom: 7px;
}

.field input {
    width: 100%;
    background: rgba(255, 255, 255, .07);
    border: 1px solid rgba(255, 255, 255, .1);
    border-radius: 12px;
    color: #fff;
    padding: 13px 16px;
}

.remember {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    color: rgba(255, 255, 255, .6);
    font-size: .85rem;
}

.remember input {
    width: auto;
}

.err {
    background: rgba(220, 53, 69, .1);
    border: 1px solid rgba(220, 53, 69, .25);
    color: #ff8a96;
    padding: 11px 14px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: .85rem;
}

.btn-login {
    width: 100%;
    padding: 14px;
    background: #ff3b30;
    border: none;
    border-radius: 12px;
    color: #fff;
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    cursor: pointer;
}

.btn-login:hover {
    background: #cc2e28;
}

@media (max-width: 768px) {
    body { flex-direction: column; overflow: auto; }
    .left { width: 100%; padding: 32px; }
}
</style>
</head>
<body>

<div class="left">
    <div class="brand">MUS.IC</div>

    <div class="left-hero">
        <h2>Your music,<br>your world.</h2>
        <p>Millions of songs, curated playlists, and personalized recommendations.</p>

        <div class="wave-bars">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div style="font-size:.78rem;color:rgba(0,0,0,.4)">© 2025 MUS.IC</div>
</div>

<div class="right">
    <div class="form-box">

        <h3>Welcome back</h3>

        <p class="sub">
            Don't have an account?
            <a href="{{ route('register') }}">Sign up free</a>
        </p>

        @if(session('status'))
            <div class="err" style="background:rgba(40,167,69,.1);border-color:rgba(40,167,69,.25);color:#75e096;">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="err">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <button class="btn-login" type="submit">Sign In →</button>
        </form>

    </div>
</div>

@include('partials.toast')

</body>
</html>
