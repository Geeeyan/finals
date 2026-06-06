<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
<style>
*, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    min-height: 100vh;
    background: #0a0a0a;
    font-family: 'DM Sans', sans-serif;
    color: #fff;
    padding: 40px 16px 60px;
}

body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image:
        linear-gradient(rgba(255, 59, 48, .07) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 59, 48, .07) 1px, transparent 1px);
    background-size: 40px 40px;
    animation: drift 20s linear infinite;
    pointer-events: none;
    z-index: 0;
}

@keyframes drift {
    from { background-position: 0 0; }
    to   { background-position: 40px 40px; }
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.page-wrapper {
    position: relative;
    z-index: 1;
    max-width: 860px;
    margin: 0 auto;
}

.page-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1.85rem;
    font-weight: 700;
    letter-spacing: -.02em;
    margin-bottom: 4px;
}

.page-sub {
    color: rgba(255, 255, 255, .35);
    font-size: .9rem;
    margin-bottom: 36px;
}

.user-name {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1.25rem;
    font-weight: 700;
    letter-spacing: -.01em;
    margin-bottom: 3px;
}

.user-email {
    color: rgba(255, 255, 255, .4);
    font-size: .88rem;
}

.section-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: -.01em;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.section-title::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(255, 255, 255, .07);
}

label {
    display: block;
    font-size: .75rem;
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, .35);
    margin-bottom: 7px;
}

.strength-text {
    font-size: .75rem;
    color: rgba(255, 255, 255, .3);
    margin-top: 4px;
}

.glass-card {
    background: rgba(255, 255, 255, .04);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, .09);
    border-radius: 20px;
    padding: 32px;
    margin-bottom: 20px;
    animation: fadeUp .45s cubic-bezier(.16, 1, .3, 1) both;
}

.glass-card:nth-child(2) { animation-delay: .05s; }
.glass-card:nth-child(3) { animation-delay: .10s; }
.glass-card:nth-child(4) { animation-delay: .15s; }

.avatar-upload-wrap {
    display: flex;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
}

.avatar-preview {
    width: 96px;
    height: 96px;
    border-radius: 50%;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(255, 59, 48, .3), rgba(204, 46, 40, .2));
    border: 2px solid rgba(255, 59, 48, .35);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1.5rem;
    font-weight: 700;
    flex-shrink: 0;
    cursor: pointer;
    position: relative;
    transition: border-color .2s;
}

.avatar-preview:hover {
    border-color: #ff3b30;
}

.avatar-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.avatar-preview .avatar-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, .55);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity .2s;
    font-size: .75rem;
    font-weight: 600;
    letter-spacing: .04em;
    color: #fff;
    text-align: center;
    gap: 4px;
    flex-direction: column;
}

.avatar-preview:hover .avatar-overlay {
    opacity: 1;
}

.upload-meta {
    flex: 1;
    min-width: 200px;
}

.upload-meta p {
    font-size: .82rem;
    color: rgba(255, 255, 255, .35);
    margin-top: 6px;
    line-height: 1.5;
}

.upload-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 18px;
    background: rgba(255, 255, 255, .07);
    border: 1px solid rgba(255, 255, 255, .12);
    border-radius: 10px;
    color: rgba(255, 255, 255, .8);
    font-family: 'DM Sans', sans-serif;
    font-size: .88rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .18s, color .18s;
}

.upload-btn:hover {
    background: rgba(255, 255, 255, .12);
    color: #fff;
}

.avatar-ring {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255, 59, 48, .3), rgba(204, 46, 40, .2));
    border: 1.5px solid rgba(255, 59, 48, .42);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1.5rem;
    font-weight: 700;
    flex-shrink: 0;
    overflow: hidden;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 12px;
    border-radius: 100px;
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .07em;
    text-transform: uppercase;
    background: rgba(255, 59, 48, .14);
    border: 1px solid rgba(255, 59, 48, .3);
    color: #ff3b30;
}

.stat-row {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, .07);
}

.stat-pill {
    flex: 1;
    min-width: 120px;
    background: rgba(255, 255, 255, .04);
    border: 1px solid rgba(255, 255, 255, .07);
    border-radius: 12px;
    padding: 14px 18px;
}

.stat-label {
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .07em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, .35);
    margin-bottom: 5px;
}

.stat-value {
    font-size: 1rem;
    font-weight: 600;
}

.form-control {
    width: 100%;
    background: rgba(255, 255, 255, .06);
    border: 1px solid rgba(255, 255, 255, .1);
    border-radius: 12px;
    color: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: .92rem;
    padding: 11px 15px;
    outline: none;
    transition: border-color .2s, box-shadow .2s;
}

.form-control::placeholder {
    color: rgba(255, 255, 255, .2);
}

.form-control:focus {
    border-color: rgba(255, 59, 48, .5);
    box-shadow: 0 0 0 3px rgba(255, 59, 48, .12);
    background: rgba(255, 255, 255, .08);
}

.form-control[readonly] {
    opacity: .5;
    cursor: not-allowed;
}

.btn-primary-custom {
    padding: 11px 24px;
    background: #ff3b30;
    border: none;
    border-radius: 12px;
    color: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: .92rem;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: background .16s, transform .12s;
}

.btn-primary-custom:hover {
    background: #cc2e28;
    transform: translateY(-1px);
}

.btn-ghost {
    padding: 11px 20px;
    background: transparent;
    border: 1px solid rgba(255, 255, 255, .1);
    border-radius: 12px;
    color: rgba(255, 255, 255, .5);
    font-family: 'DM Sans', sans-serif;
    font-size: .92rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: background .2s, color .2s;
}

.btn-ghost:hover {
    background: rgba(255, 255, 255, .06);
    color: #fff;
}

.alert-success-custom,
.alert-danger-custom {
    border-radius: 10px;
    padding: 12px 16px;
    font-size: .88rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.alert-success-custom {
    background: rgba(25, 135, 84, .1);
    border: 1px solid rgba(25, 135, 84, .25);
    color: #65e8a0;
}

.alert-danger-custom {
    background: rgba(220, 53, 69, .1);
    border: 1px solid rgba(220, 53, 69, .25);
    color: #ff8a96;
}

.strength-bar {
    height: 3px;
    border-radius: 2px;
    background: rgba(255, 255, 255, .08);
    margin-top: 8px;
    overflow: hidden;
}

.strength-fill {
    height: 100%;
    border-radius: 2px;
    width: 0%;
    transition: width .3s, background .3s;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, .4);
    font-size: .85rem;
    text-decoration: none;
    margin-bottom: 32px;
    transition: color .2s;
}

.back-link:hover {
    color: #7c9dff;
}

.back-link svg {
    width: 16px;
    height: 16px;
}

.form-divider {
    height: 1px;
    background: rgba(255, 255, 255, .06);
    margin: 24px 0;
}

#profile_image {
    display: none;
}

@media (max-width: 576px) {
    .glass-card { padding: 22px 18px; }
    .avatar-preview { width: 80px; height: 80px; font-size: 1.2rem; }
}
</style>
</head>
<body>

<div class="page-wrapper">

    <a href="{{ route('home') }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 5l-7 7 7 7"/>
        </svg>
        Back to Home
    </a>

    <h1 class="page-title">My Profile</h1>
    <p class="page-sub">Manage your account information and security</p>

    @if(session('status') === 'profile-updated')
        <div class="alert-success-custom">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M20 6L9 17l-5-5"/>
            </svg>
            Profile updated successfully.
        </div>
    @endif

    @if(session('status') === 'password-updated')
        <div class="alert-success-custom">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M20 6L9 17l-5-5"/>
            </svg>
            Password changed successfully.
        </div>
    @endif

    @if($errors->any())
        <div class="alert-danger-custom">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="glass-card">
        @php
            $words    = explode(' ', trim(Auth::user()->name));
            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
            $joined   = Auth::user()->created_at ? Auth::user()->created_at->format('F Y') : 'N/A';
        @endphp

        <div class="d-flex align-items-center gap-3 flex-wrap">
            <div class="avatar-ring">
                @if(Auth::user()->profile_image)
                    <img src="{{ Storage::url(Auth::user()->profile_image) }}" alt="Avatar" style="width:100%;height:100%;object-fit:cover;display:block;">
                @else
                    {{ $initials }}
                @endif
            </div>
            <div class="flex-grow-1">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-email mb-2">{{ Auth::user()->email }}</div>
                <span class="role-badge">{{ Auth::user()->role }}</span>
            </div>
        </div>

        <div class="stat-row">
            <div class="stat-pill">
                <div class="stat-label">Member Since</div>
                <div class="stat-value">{{ $joined }}</div>
            </div>
            <div class="stat-pill">
                <div class="stat-label">Account ID</div>
                <div class="stat-value">#{{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="stat-pill">
                <div class="stat-label">Role</div>
                <div class="stat-value" style="text-transform:capitalize">{{ Auth::user()->role }}</div>
            </div>
        </div>
    </div>

    <div class="glass-card">
        <div class="section-title">Edit Profile</div>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label>Profile Photo</label>
                <div class="avatar-upload-wrap">

                    <div class="avatar-preview" id="avatarPreview" onclick="document.getElementById('profile_image').click()" title="Click to change photo">
                        @if(Auth::user()->profile_image)
                            <img id="avatarImg" src="{{ Storage::url(Auth::user()->profile_image) }}" alt="Avatar">
                        @else
                            <img id="avatarImg" src="" alt="" style="display:none;">
                            <span id="avatarInitials">{{ $initials }}</span>
                        @endif
                        <div class="avatar-overlay">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="17 8 12 3 7 8"/>
                                <line x1="12" y1="3" x2="12" y2="15"/>
                            </svg>
                            Upload
                        </div>
                    </div>

                    <div class="upload-meta">
                        <button type="button" class="upload-btn" onclick="document.getElementById('profile_image').click()">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="17 8 12 3 7 8"/>
                                <line x1="12" y1="3" x2="12" y2="15"/>
                            </svg>
                            Choose Photo
                        </button>
                        <p id="fileNameDisplay">JPG, PNG, GIF or WebP — max 2 MB</p>
                    </div>

                    <input type="file" id="profile_image" name="profile_image" accept="image/*">
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('name', Auth::user()->name) }}"
                           placeholder="Your full name" required>
                </div>
                <div class="col-md-6">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email', Auth::user()->email) }}"
                           placeholder="your@email.com" required>
                </div>
                <div class="col-md-6">
                    <label>Role</label>
                    <input type="text" class="form-control" value="{{ ucfirst(Auth::user()->role) }}" readonly>
                </div>
            </div>

            <div class="form-divider"></div>

            <div class="d-flex gap-2 flex-wrap">
                <button type="submit" class="btn-primary-custom">Save Changes</button>
                <a href="{{ route('home') }}" class="btn-ghost">Cancel</a>
            </div>
        </form>
    </div>

    <div class="glass-card">
        <div class="section-title">Change Password</div>

        <form method="POST" action="{{ route('password.update') }}" novalidate>
            @csrf
            @method('PATCH')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password"
                           class="form-control" placeholder="••••••••" autocomplete="current-password">
                </div>
            </div>

            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password"
                           class="form-control" placeholder="Min. 8 characters"
                           autocomplete="new-password" oninput="checkStrength(this.value)">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strength-fill"></div>
                    </div>
                    <div class="strength-text" id="strength-text"></div>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-control" placeholder="••••••••" autocomplete="new-password">
                </div>
            </div>

            <div class="form-divider"></div>

            <button type="submit" class="btn-primary-custom">Update Password</button>
        </form>
    </div>

    <div class="glass-card" style="border-color:rgba(220,53,69,.18)">
        <div class="section-title" style="color:#ff8a96">Danger Zone</div>
        <p style="color:rgba(255,255,255,.35);font-size:.88rem;margin-bottom:16px">
            Sign out of your account or take other irreversible actions.
        </p>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn-ghost"
                    style="color:#ff8a96;border-color:rgba(220,53,69,.25)"
                    onclick="return confirm('Are you sure you want to log out?')">
                Sign Out
            </button>
        </form>
    </div>

</div>

<script>
document.getElementById('profile_image').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    document.getElementById('fileNameDisplay').textContent = file.name;

    const reader = new FileReader();
    reader.onload = function (e) {
        const img      = document.getElementById('avatarImg');
        const initials = document.getElementById('avatarInitials');

        img.src = e.target.result;
        img.style.display = 'block';
        if (initials) initials.style.display = 'none';
    };
    reader.readAsDataURL(file);
});

function checkStrength(val) {
    const fill = document.getElementById('strength-fill');
    const text = document.getElementById('strength-text');
    let score = 0;

    if (val.length >= 8)            score++;
    if (/[A-Z]/.test(val))         score++;
    if (/[0-9]/.test(val))         score++;
    if (/[^A-Za-z0-9]/.test(val))  score++;

    const levels = [
        { w: '0%',   bg: 'transparent', label: '' },
        { w: '25%',  bg: '#e24b4a',     label: 'Weak' },
        { w: '50%',  bg: '#ef9f27',     label: 'Fair' },
        { w: '75%',  bg: '#7c9dff',     label: 'Good' },
        { w: '100%', bg: '#65e8a0',     label: 'Strong' },
    ];

    const lvl = val.length === 0 ? levels[0] : (levels[score] || levels[1]);
    fill.style.width      = lvl.w;
    fill.style.background = lvl.bg;
    text.textContent      = lvl.label;
    text.style.color      = lvl.bg;
}
</script>

</body>
</html>
