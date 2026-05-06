<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Buku Tamu BKPSDM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    /* ============================================================
       RESET & BASE
    ============================================================ */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --blue-1:   #0a2aff;
        --blue-2:   #1e47ff;
        --blue-3:   #3a6bff;
        --blue-4:   #6e9bff;
        --cyan:     #00d4ff;
        --white:    #ffffff;
        --bg:       #0f1f6e;
        --dark:     #0d1136;
        --txt:      #111827;
        --txt-2:    #6b7280;
        --border:   #e5e7eb;
        --surf:     #f9fafb;
        --r:        14px;
        --r-lg:     24px;
    }

    html, body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        background: var(--bg);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        padding: 24px 20px;
        position: relative;
        overflow: hidden;
    }

    /* animated background particles */
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 20% 80%, rgba(0,212,255,0.12) 0%, transparent 60%),
            radial-gradient(ellipse 60% 50% at 80% 20%, rgba(30,71,255,0.25) 0%, transparent 60%),
            linear-gradient(135deg, #071060 0%, #0f1f8e 50%, #071060 100%);
        pointer-events: none;
        z-index: 0;
    }

    /* ============================================================
       CARD WRAPPER
    ============================================================ */
    .card {
        position: relative;
        z-index: 1;
        display: flex;
        width: min(1000px, 100%);
        height: min(680px, calc(100vh - 48px));
        border-radius: 28px;
        overflow: hidden;
        box-shadow:
            0 50px 120px rgba(0,0,0,0.5),
            0 0 0 1px rgba(255,255,255,0.07);
        animation: cardIn .7s cubic-bezier(.22,1,.36,1) both;
    }

    @keyframes cardIn {
        from { opacity: 0; transform: translateY(28px) scale(.97); }
        to   { opacity: 1; transform: none; }
    }

    /* ============================================================
       LEFT PANEL  — blue gradient + diagonal lines
    ============================================================ */
    .left {
        flex: 1.05;
        position: relative;
        overflow: hidden;
        background: linear-gradient(140deg, #0a24dd 0%, #1740ff 40%, #3a6bff 75%, #5287ff 100%);
        display: flex;
        flex-direction: column;
        padding: 36px 40px;
    }

    /* Diagonal stripe overlay — key visual from reference */
    .left::before {
        content: '';
        position: absolute;
        inset: -50%;
        background: repeating-linear-gradient(
            55deg,
            transparent,
            transparent 38px,
            rgba(255,255,255,0.035) 38px,
            rgba(255,255,255,0.035) 76px
        );
        pointer-events: none;
    }

    /* Large glowing orb top-right */
    .left::after {
        content: '';
        position: absolute;
        top: -120px;
        right: -100px;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(100,160,255,0.28) 0%, transparent 70%);
        pointer-events: none;
    }

    /* orb bottom-left */
    .orb-bl {
        position: absolute;
        bottom: -80px;
        left: -60px;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0,212,255,0.18) 0%, transparent 70%);
        pointer-events: none;
    }

    /* ── Logo / badge ── */
    .left-logo {
        position: relative;
        z-index: 2;
    }

    .logo-pill {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.22);
        border-radius: 100px;
        padding: 7px 16px 7px 7px;
        backdrop-filter: blur(10px);
    }

    .logo-icon {
        width: 36px;
        height: 36px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .logo-icon svg { width: 20px; height: 20px; }

    .logo-text {
        font-family: 'Sora', sans-serif;
        font-size: 13px;
        font-weight: 700;
        color: white;
        letter-spacing: 0.4px;
    }

    .logo-sub {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 10px;
        font-weight: 400;
        color: rgba(255,255,255,0.65);
        letter-spacing: 0.2px;
    }

    /* ── Center illustration area ── */
    .left-center {
        position: relative;
        z-index: 2;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10px 0;
    }

    /* floating UI mockup card */
    .mock-card {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 18px;
        padding: 16px 18px;
        backdrop-filter: blur(12px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.18);
        margin-bottom: 12px;
        animation: floatY 5s ease-in-out infinite;
        max-width: 280px;
    }

    @keyframes floatY {
        0%,100% { transform: translateY(0); }
        50%      { transform: translateY(-8px); }
    }

    .mock-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
    }

    .mock-row:last-child { margin-bottom: 0; }

    .mock-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .mock-line {
        height: 8px;
        border-radius: 4px;
        background: rgba(255,255,255,0.35);
    }

    .mock-badge {
        padding: 3px 10px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.3px;
        flex-shrink: 0;
    }

    /* mini stat cards row */
    .mini-stats {
        display: flex;
        gap: 10px;
        animation: floatY 5s ease-in-out infinite;
        animation-delay: 0.5s;
        max-width: 280px;
    }

    .mini-stat {
        flex: 1;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.18);
        border-radius: 12px;
        padding: 12px 10px;
        backdrop-filter: blur(8px);
        text-align: center;
    }

    .mini-stat .num {
        font-family: 'Sora', sans-serif;
        font-size: 20px;
        font-weight: 700;
        color: white;
        line-height: 1;
    }

    .mini-stat .lbl {
        font-size: 9px;
        font-weight: 600;
        color: rgba(255,255,255,0.55);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 4px;
    }

    /* ── Bottom headline ── */
    .left-bottom {
        position: relative;
        z-index: 2;
    }

    .left-headline {
        font-family: 'Sora', sans-serif;
        font-size: 28px;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        letter-spacing: -0.6px;
        margin-bottom: 8px;
    }

    .left-sub {
        font-size: 13px;
        color: rgba(255,255,255,0.65);
        line-height: 1.5;
        max-width: 270px;
    }

    .left-dots {
        display: flex;
        gap: 6px;
        margin-top: 14px;
    }

    .left-dots span {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
    }

    .left-dots span:first-child {
        background: white;
        width: 20px;
        border-radius: 4px;
    }

    /* ============================================================
       RIGHT PANEL  — white form
    ============================================================ */
    .right {
        flex: 1;
        background: white;
        padding: 40px 48px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow-y: auto;
    }

    /* ── Form header ── */
    .fh-tag {
        font-family: 'Sora', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--blue-2);
        margin-bottom: 8px;
    }

    .fh-title {
        font-family: 'Sora', sans-serif;
        font-size: 26px;
        font-weight: 800;
        color: var(--txt);
        letter-spacing: -0.5px;
        line-height: 1.2;
        margin-bottom: 6px;
    }

    .fh-sub {
        font-size: 13.5px;
        color: var(--txt-2);
        margin-bottom: 24px;
    }

    /* ── Alerts ── */
    .alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 13px;
        margin-bottom: 20px;
        animation: alertIn .35s ease;
    }

    @keyframes alertIn {
        from { opacity: 0; transform: translateY(-6px); }
        to   { opacity: 1; transform: none; }
    }

    .alert-err {
        background: #fff1f1;
        border: 1px solid #fecaca;
        color: #b91c1c;
    }

    .alert-ok {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #15803d;
    }

    .alert ul { list-style: none; }
    .alert ul li::before { content: "• "; }

    /* ── Fields ── */
    .field { margin-bottom: 16px; }

    .field label {
        display: block;
        font-size: 12.5px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 7px;
        letter-spacing: 0.2px;
    }

    .input-box {
        position: relative;
    }

    .input-box .ico {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #c4c9d4;
        pointer-events: none;
        transition: color .2s;
        display: flex;
        align-items: center;
    }

    .input-box input {
        width: 100%;
        padding: 13px 16px 13px 44px;
        border: 1.5px solid var(--border);
        border-radius: var(--r);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        color: var(--txt);
        background: var(--surf);
        outline: none;
        transition: all .2s ease;
    }

    .input-box input::placeholder { color: #c4c9d4; font-size: 13px; }

    .input-box input:focus {
        border-color: var(--blue-2);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(30,71,255,0.09);
    }

    .input-box:focus-within .ico { color: var(--blue-2); }

    /* eye toggle */
    .eye-btn {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: #c4c9d4;
        display: flex;
        align-items: center;
        padding: 0;
        transition: color .2s;
    }
    .eye-btn:hover { color: var(--blue-2); }

    /* ── Row options (remember) ── */
    .row-opts {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .chk-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--txt-2);
        cursor: pointer;
        user-select: none;
    }

    /* custom checkbox */
    .chk-label input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        width: 18px; height: 18px;
        border: 1.5px solid var(--border);
        border-radius: 5px;
        background: var(--surf);
        cursor: pointer;
        position: relative;
        transition: all .2s;
        flex-shrink: 0;
    }

    .chk-label input[type="checkbox"]:checked {
        background: var(--blue-2);
        border-color: var(--blue-2);
    }

    .chk-label input[type="checkbox"]:checked::after {
        content: '';
        position: absolute;
        left: 4px; top: 1px;
        width: 6px; height: 10px;
        border: 2px solid white;
        border-top: none;
        border-left: none;
        transform: rotate(45deg);
    }

    /* ── Submit button ── */
    .btn-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, var(--blue-1) 0%, var(--blue-3) 100%);
        color: white;
        font-family: 'Sora', sans-serif;
        font-size: 14.5px;
        font-weight: 700;
        border: none;
        border-radius: var(--r);
        cursor: pointer;
        letter-spacing: 0.3px;
        transition: all .25s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(10,42,255,0.35);
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.18) 0%, transparent 60%);
        opacity: 0;
        transition: opacity .25s;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(10,42,255,0.45);
    }

    .btn-submit:hover::before { opacity: 1; }
    .btn-submit:active { transform: none; }

    /* ── Divider ── */
    .divider {
        display: flex;
        align-items: center;
        gap: 14px;
        margin: 16px 0;
    }

    .divider::before, .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #f0f0f5;
    }

    .divider span {
        font-size: 12px;
        color: #d1d5db;
        font-weight: 600;
        white-space: nowrap;
    }

    /* ── Register CTA ── */
    .reg-wrap {
        text-align: center;
    }

    .reg-wrap p {
        font-size: 13px;
        color: var(--txt-2);
        margin-bottom: 12px;
    }

    .btn-register {
        display: block;
        width: 100%;
        padding: 13px;
        background: transparent;
        border: 1.5px solid var(--border);
        border-radius: var(--r);
        font-family: 'Sora', sans-serif;
        font-size: 14px;
        font-weight: 700;
        color: var(--blue-2);
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: all .2s ease;
        letter-spacing: 0.2px;
    }

    .btn-register:hover {
        border-color: var(--blue-2);
        background: rgba(30,71,255,0.04);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(30,71,255,0.1);
    }

    /* ── Footer note ── */
    .foot-note {
        text-align: center;
        margin-top: 18px;
        font-size: 11.5px;
        color: #d1d5db;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .foot-note svg { color: #10b981; }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 720px) {
        .left { display: none; }
        .right { padding: 40px 28px; }
        .card  { border-radius: 20px; }
    }

    /* ── Loading spinner on submit ── */
    .btn-submit .spinner {
        display: none;
        width: 18px; height: 18px;
        border: 2.5px solid rgba(255,255,255,0.35);
        border-top-color: white;
        border-radius: 50%;
        animation: spin .6s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin { to { transform: rotate(360deg); } }
    </style>
</head>
<body>

<div class="card">

    {{-- =====================================================
         LEFT PANEL
    ===================================================== --}}
    <div class="left">
        <div class="orb-bl"></div>

        {{-- Logo --}}
        <div class="left-logo">
            <div class="logo-pill">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" stroke="#1740ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" stroke="#1740ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <div class="logo-text">BKPSDM</div>
                    <div class="logo-sub">OKU Timur</div>
                </div>
            </div>
        </div>

        {{-- Floating mock UI --}}
        <div class="left-center">

            <div class="mock-card">
                {{-- header --}}
                <div class="mock-row">
                    <div class="mock-dot" style="background:#00d4ff"></div>
                    <div class="mock-line" style="width:60%"></div>
                    <div class="mock-badge" style="background:rgba(0,212,255,0.2);color:#00d4ff">Live</div>
                </div>
                {{-- data rows --}}
                <div class="mock-row">
                    <div style="width:26px;height:26px;border-radius:50%;background:rgba(255,255,255,0.22);flex-shrink:0"></div>
                    <div style="flex:1">
                        <div class="mock-line" style="width:70%;margin-bottom:5px"></div>
                        <div class="mock-line" style="width:45%;background:rgba(255,255,255,0.18)"></div>
                    </div>
                    <div class="mock-badge" style="background:rgba(16,185,129,0.25);color:#6ee7b7">Aktif</div>
                </div>
                <div class="mock-row">
                    <div style="width:26px;height:26px;border-radius:50%;background:rgba(255,255,255,0.22);flex-shrink:0"></div>
                    <div style="flex:1">
                        <div class="mock-line" style="width:55%;margin-bottom:5px"></div>
                        <div class="mock-line" style="width:35%;background:rgba(255,255,255,0.18)"></div>
                    </div>
                    <div class="mock-badge" style="background:rgba(16,185,129,0.25);color:#6ee7b7">Aktif</div>
                </div>
                <div class="mock-row">
                    <div style="width:26px;height:26px;border-radius:50%;background:rgba(255,255,255,0.22);flex-shrink:0"></div>
                    <div style="flex:1">
                        <div class="mock-line" style="width:65%;margin-bottom:5px"></div>
                        <div class="mock-line" style="width:40%;background:rgba(255,255,255,0.18)"></div>
                    </div>
                    <div class="mock-badge" style="background:rgba(251,191,36,0.25);color:#fcd34d">Menunggu</div>
                </div>
            </div>

            <div class="mini-stats">
                <div class="mini-stat">
                    <div class="num">128</div>
                    <div class="lbl">Total Tamu</div>
                </div>
                <div class="mini-stat">
                    <div class="num" style="color:#00d4ff">12</div>
                    <div class="lbl">Hari Ini</div>
                </div>
                <div class="mini-stat">
                    <div class="num" style="color:#a5f3fc">50</div>
                    <div class="lbl">Pegawai</div>
                </div>
            </div>

        </div>

        {{-- Bottom headline --}}
        <div class="left-bottom">
            <h2 class="left-headline">Halo,<br>Selamat Datang!</h2>
            <p class="left-sub">Platform manajemen buku tamu BKPSDM yang terintegrasi, efisien, dan mudah digunakan.</p>
            <div class="left-dots">
                <span></span><span></span><span></span><span></span>
            </div>
        </div>
    </div>

    {{-- =====================================================
         RIGHT PANEL
    ===================================================== --}}
    <div class="right">

        <p class="fh-tag">Admin Portal</p>
        <h1 class="fh-title">Masuk ke Akun Anda</h1>
        <p class="fh-sub">Gunakan kredensial admin untuk melanjutkan</p>

        {{-- Alerts --}}
        @if ($errors->any())
        <div class="alert alert-err">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="flex-shrink:0;margin-top:1px">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                <path d="M12 8v4M12 16h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-err">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="flex-shrink:0;margin-top:1px">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                <path d="M12 8v4M12 16h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-ok">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="flex-shrink:0;margin-top:1px">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            {{-- Email --}}
            <div class="field">
                <label for="email">Alamat Email</label>
                <div class="input-box">
                    <span class="ico">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <input type="email" id="email" name="email"
                           placeholder="admin@bkpsdm.go.id"
                           value="{{ old('email') }}" required autofocus autocomplete="email">
                </div>
            </div>

            {{-- Password --}}
            <div class="field">
                <label for="password">Kata Sandi</label>
                <div class="input-box">
                    <span class="ico">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <input type="password" id="password" name="password"
                           placeholder="••••••••" required autocomplete="current-password">
                    <button type="button" class="eye-btn" id="eyeBtn" title="Tampilkan password">
                        <svg id="eyeOpen" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <svg id="eyeClose" width="16" height="16" viewBox="0 0 24 24" fill="none" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="1" y1="1" x2="23" y2="23" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Remember me --}}
            <div class="row-opts">
                <label class="chk-label">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Ingat saya
                </label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-submit" id="submitBtn">
                <span id="btnText">Masuk Sekarang</span>
                <div class="spinner" id="spinner"></div>
            </button>
        </form>

        <div class="divider"><span>atau</span></div>

        <div class="reg-wrap">
            <p>Belum punya akun?</p>
            <a href="{{ route('register') }}" class="btn-register">Daftar Sekarang</a>
        </div>

        <div class="foot-note">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                <rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Koneksi aman — BKPSDM OKU Timur &copy; {{ date('Y') }}
        </div>

    </div>
</div>

<script>
/* ── Toggle password visibility ── */
const eyeBtn   = document.getElementById('eyeBtn');
const pwdInput = document.getElementById('password');
const eyeOpen  = document.getElementById('eyeOpen');
const eyeClose = document.getElementById('eyeClose');

eyeBtn.addEventListener('click', function () {
    const isHidden = pwdInput.type === 'password';
    pwdInput.type  = isHidden ? 'text' : 'password';
    eyeOpen.style.display  = isHidden ? 'none'  : '';
    eyeClose.style.display = isHidden ? ''      : 'none';
});

/* ── Spinner on submit ── */
document.getElementById('loginForm').addEventListener('submit', function () {
    document.getElementById('btnText').style.display  = 'none';
    document.getElementById('spinner').style.display  = 'block';
    document.getElementById('submitBtn').disabled     = true;
});
</script>

</body>
</html>