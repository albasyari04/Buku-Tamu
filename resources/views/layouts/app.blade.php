<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buku Tamu BKPSDM OKU TIMUR')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        /* =============================================
           DESIGN TOKENS
        ============================================= */
        :root {
            --primary:        #6c5ce7;
            --primary-dark:   #5849c4;
            --primary-light:  #a29bfe;
            --primary-bg:     #f0eeff;
            --primary-glow:   rgba(108, 92, 231, 0.18);

            --success:        #00b894;
            --warning:        #fdcb6e;
            --danger:         #d63031;

            --sidebar-width:      240px;
            --sidebar-mini-width: 72px;
            --header-height:      64px;

            --sidebar-bg:     #ffffff;
            --body-bg:        #f8f9fc;
            --card-bg:        #ffffff;
            --border:         #eaecf0;
            --border-light:   #f2f4f7;

            --text-primary:   #1a1d2e;
            --text-secondary: #6b7280;
            --text-muted:     #adb5bd;

            --shadow-xs: 0 1px 2px rgba(0,0,0,0.04);
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow-md: 0 8px 28px rgba(0,0,0,0.10);

            --radius-sm: 8px;
            --radius:    12px;
            --radius-lg: 16px;

            --font-body:    'Plus Jakarta Sans', system-ui, sans-serif;
            --font-heading: 'Nunito', system-ui, sans-serif;
            --transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* =============================================
           BASE
        ============================================= */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: var(--font-body);
            background: var(--body-bg);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.55;
            font-size: 0.9rem;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #9ca3af; }
        ::selection { background: var(--primary-bg); color: var(--primary); }

        /* =============================================
           SIDEBAR
        ============================================= */
        .main-sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border);
            z-index: 1030;
            display: flex;
            flex-direction: column;
            transition: width 0.3s cubic-bezier(0.4,0,0.2,1),
                        transform 0.3s cubic-bezier(0.4,0,0.2,1);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        /* Brand Box */
        .sidebar-brand-box {
            height: var(--header-height);
            display: flex; align-items: center;
            padding: 0 0.9rem;
            border-bottom: 1px solid var(--border-light);
            flex-shrink: 0; gap: 0.6rem;
        }

        .sidebar-toggle-btn {
            width: 32px; height: 32px;
            border-radius: var(--radius-sm);
            border: none; background: var(--body-bg);
            color: var(--text-secondary);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: var(--transition); flex-shrink: 0;
        }
        .sidebar-toggle-btn:hover { background: var(--primary-bg); color: var(--primary); }

        .sidebar-brand-link {
            display: flex; align-items: center; gap: 0.55rem;
            text-decoration: none; overflow: hidden; flex: 1;
        }
        .sidebar-brand-logo {
            width: 34px; height: 34px;
            border-radius: var(--radius-sm);
            object-fit: contain; flex-shrink: 0;
        }
        .sidebar-brand-name {
            font-family: var(--font-heading);
            font-size: 0.82rem; font-weight: 800;
            color: var(--text-primary); white-space: nowrap;
            transition: var(--transition); line-height: 1.2;
        }
        .sidebar-brand-name span {
            display: block; font-size: 0.62rem; font-weight: 500;
            color: var(--text-muted); letter-spacing: 0.04em;
        }

        /* Navigation */
        .sidebar-nav {
            flex: 1; overflow-y: auto; overflow-x: hidden; padding: 0.65rem 0;
        }
        .sidebar-nav::-webkit-scrollbar { width: 3px; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 3px; }

        .nav-section { padding: 0 0.65rem; margin-bottom: 0.35rem; }
        .nav-section-title {
            font-size: 0.62rem; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--text-muted); padding: 0.55rem 0.6rem 0.3rem;
            white-space: nowrap; overflow: hidden; transition: opacity 0.2s;
        }

        .nav-link-custom {
            display: flex; align-items: center; gap: 0.7rem;
            padding: 0.58rem 0.7rem;
            border-radius: var(--radius-sm);
            text-decoration: none; color: var(--text-secondary);
            font-size: 0.84rem; font-weight: 500;
            transition: var(--transition); white-space: nowrap;
            position: relative; margin-bottom: 2px;
        }
        .nav-link-custom:hover { background: var(--primary-bg); color: var(--primary); }
        .nav-link-custom.active {
            background: var(--primary); color: #fff;
            font-weight: 600; box-shadow: 0 4px 12px var(--primary-glow);
        }
        .nav-link-custom.active .nav-icon { color: #fff; }

        .nav-icon {
            width: 30px; height: 30px; border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; flex-shrink: 0; transition: var(--transition);
            color: var(--text-secondary);
        }
        .nav-link-custom:hover .nav-icon { color: var(--primary); }
        .nav-link-custom.active .nav-icon { color: #fff; }
        .nav-label { flex: 1; transition: opacity 0.2s; }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 0.75rem 0.9rem;
            border-top: 1px solid var(--border-light); flex-shrink: 0;
        }
        .sidebar-help-card {
            background: var(--primary-bg); border-radius: var(--radius);
            padding: 0.8rem 0.9rem; text-align: center;
        }
        .sidebar-help-card .help-icon {
            width: 34px; height: 34px; border-radius: 50%;
            background: var(--primary); color: #fff;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 0.45rem; font-size: 0.82rem;
        }
        .sidebar-help-card .help-title {
            font-weight: 700; font-size: 0.78rem; color: var(--text-primary);
        }
        .sidebar-help-card .help-sub {
            font-size: 0.68rem; color: var(--text-secondary);
            margin: 0.2rem 0 0.55rem; line-height: 1.4;
        }
        .btn-help {
            display: block; width: 100%; padding: 0.38rem;
            background: var(--primary); color: #fff;
            border-radius: var(--radius-sm); font-size: 0.73rem; font-weight: 600;
            text-align: center; text-decoration: none; transition: var(--transition);
        }
        .btn-help:hover { background: var(--primary-dark); color: #fff; }

        /* Collapsed sidebar */
        body.sidebar-collapsed .main-sidebar { width: var(--sidebar-mini-width); }
        body.sidebar-collapsed .nav-label { opacity: 0; width: 0; overflow: hidden; }
        body.sidebar-collapsed .nav-section-title { opacity: 0; }
        body.sidebar-collapsed .sidebar-brand-name { opacity: 0; width: 0; overflow: hidden; }
        body.sidebar-collapsed .sidebar-help-card { display: none; }
        body.sidebar-collapsed .nav-link-custom {
            padding: 0.58rem; justify-content: center;
        }
        body.sidebar-collapsed .nav-link-custom .nav-icon {
            width: 34px; height: 34px; font-size: 0.88rem;
        }

        /* Tooltip saat collapsed */
        body.sidebar-collapsed .nav-link-custom { position: relative; }
        body.sidebar-collapsed .nav-link-custom:hover::after {
            content: attr(title);
            position: absolute; left: calc(100% + 12px); top: 50%;
            transform: translateY(-50%);
            background: var(--text-primary); color: #fff;
            padding: 0.38rem 0.75rem; border-radius: var(--radius-sm);
            font-size: 0.76rem; font-weight: 500; white-space: nowrap;
            z-index: 9999; box-shadow: var(--shadow-md); pointer-events: none;
        }
        body.sidebar-collapsed .nav-link-custom:hover::before {
            content: ''; position: absolute;
            left: calc(100% + 6px); top: 50%; transform: translateY(-50%);
            border: 6px solid transparent;
            border-right-color: var(--text-primary);
            z-index: 9999; pointer-events: none;
        }

        /* =============================================
           HEADER
        ============================================= */
        .main-header {
            position: fixed; top: 0;
            left: var(--sidebar-width); right: 0;
            height: var(--header-height);
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            z-index: 1020;
            display: flex; align-items: center;
            padding: 0 1.4rem; gap: 1rem;
            transition: left 0.3s cubic-bezier(0.4,0,0.2,1);
            box-shadow: var(--shadow-xs);
        }
        body.sidebar-collapsed .main-header { left: var(--sidebar-mini-width); }

        .header-greeting { flex: 1; min-width: 0; }
        .header-greeting .greeting-title {
            font-family: var(--font-heading); font-size: 0.97rem;
            font-weight: 700; color: var(--text-primary); line-height: 1.2;
        }
        .header-greeting .greeting-sub {
            font-size: 0.73rem; color: var(--text-secondary); margin-top: 1px;
        }

        .header-actions { display: flex; align-items: center; gap: 0.45rem; flex-shrink: 0; }

        .header-icon-btn {
            width: 36px; height: 36px; border-radius: var(--radius-sm);
            background: var(--body-bg); border: 1.5px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            color: var(--text-secondary); cursor: pointer;
            transition: var(--transition); position: relative; text-decoration: none;
        }
        .header-icon-btn:hover {
            background: var(--primary-bg);
            border-color: var(--primary-light); color: var(--primary);
        }
        .header-icon-btn .badge-dot {
            position: absolute; top: 6px; right: 6px;
            width: 7px; height: 7px; background: #ef4444;
            border-radius: 50%; border: 2px solid #fff;
        }
        .notification-badge {
            position: absolute; top: -4px; right: -4px;
            min-width: 16px; height: 16px; padding: 0 4px;
            border-radius: 999px; background: #ef4444; color: #fff;
            font-size: 0.65rem; font-weight: 700; display: inline-flex;
            align-items: center; justify-content: center; line-height: 1;
        }

        .header-user-pill {
            display: flex; align-items: center; gap: 0.55rem;
            padding: 0.28rem 0.7rem 0.28rem 0.28rem;
            border-radius: 40px; border: 1.5px solid var(--border);
            background: var(--body-bg); cursor: pointer; transition: var(--transition);
        }
        .header-user-pill:hover {
            border-color: var(--primary-light); background: var(--primary-bg);
        }
        .user-avatar-sm {
            width: 28px; height: 28px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff; display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 0.72rem; flex-shrink: 0;
        }
        .user-pill-info .user-name-sm {
            font-size: 0.76rem; font-weight: 600;
            color: var(--text-primary); line-height: 1.1;
        }
        .user-pill-info .user-role-sm { font-size: 0.63rem; color: var(--text-muted); }

        /* =============================================
           MAIN CONTENT
        ============================================= */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 1.5rem;
            min-height: calc(100vh - var(--header-height));
            transition: margin-left 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        body.sidebar-collapsed .main-content { margin-left: var(--sidebar-mini-width); }

        @media (max-width: 991px) {
            .main-sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
            .main-sidebar.mobile-open { transform: translateX(0); }
            .main-content { margin-left: 0 !important; }
            .main-header { left: 0 !important; }
        }

        .sidebar-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.45); z-index: 1029; backdrop-filter: blur(2px);
        }
        .sidebar-overlay.active { display: block; }

        /* =============================================
           UTILITIES
        ============================================= */
        .fade-in { animation: fadeInUp 0.35s ease-out both; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-modern {
            border: none; border-radius: var(--radius);
            padding: 0.85rem 1.2rem; font-size: 0.85rem; font-weight: 500;
            display: flex; align-items: center; gap: 0.7rem;
            box-shadow: var(--shadow-sm); margin-bottom: 1.2rem;
        }

        .card-modern {
            background: var(--card-bg); border-radius: var(--radius-lg);
            border: 1px solid var(--border); box-shadow: var(--shadow-sm);
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ================================================================
         SIDEBAR
         Menu disesuaikan dengan routes yang terdaftar di web.php:
           dashboard
           tamu.index / tamu.*
           pegawai.index / pegawai.*
           tamu.export.pdf
           dashboard.print
    ================================================================ --}}
    <aside class="main-sidebar" id="mainSidebar">

        {{-- Brand --}}
        <div class="sidebar-brand-box">
            <button class="sidebar-toggle-btn" onclick="toggleSidebar()" title="Toggle Sidebar">
                <i class="fas fa-bars fa-sm"></i>
            </button>
            <a href="{{ route('dashboard') }}" class="sidebar-brand-link" title="BKPSDM OKU TIMUR">
                <img src="{{ asset('images/logo_bkpsdm.jpg') }}" alt="Logo BKPSDM" class="sidebar-brand-logo">
                <div class="sidebar-brand-name">
                    BUKU TAMU
                    <span>BKPSDM OKU TIMUR</span>
                </div>
            </a>
        </div>

        {{-- Navigation --}}
        <nav class="sidebar-nav">

            {{-- ── MENU UTAMA ── --}}
            <div class="nav-section">
                <div class="nav-section-title">Menu Utama</div>

                {{-- Dashboard --}}
                <div class="nav-item">
                    <a class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}"
                       title="Dashboard">
                        <div class="nav-icon"><i class="fas fa-chart-line"></i></div>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </div>

                {{-- Data Tamu --}}
                <div class="nav-item">
                    <a class="nav-link-custom {{ request()->routeIs('tamu.*') ? 'active' : '' }}"
                       href="{{ route('tamu.index') }}"
                       title="Data Tamu">
                        <div class="nav-icon"><i class="fas fa-users"></i></div>
                        <span class="nav-label">Data Tamu</span>
                    </a>
                </div>

                {{-- Data Pegawai --}}
                <div class="nav-item">
                    <a class="nav-link-custom {{ request()->routeIs('pegawai.*') ? 'active' : '' }}"
                       href="{{ route('pegawai.index') }}"
                       title="Data Pegawai">
                        <div class="nav-icon"><i class="fas fa-user-tie"></i></div>
                        <span class="nav-label">Data Pegawai</span>
                    </a>
                </div>
            </div>

            {{-- ── LAPORAN ── --}}
            <div class="nav-section">
                <div class="nav-section-title">Laporan</div>

                {{-- Export PDF Data Tamu --}}
                <div class="nav-item">
                    <a class="nav-link-custom"
                       href="{{ route('tamu.export.pdf') }}"
                       title="Export PDF Tamu">
                        <div class="nav-icon"><i class="fas fa-file-pdf"></i></div>
                        <span class="nav-label">Export PDF Tamu</span>
                    </a>
                </div>

                {{-- Import Data Tamu --}}
                <div class="nav-item">
                    <a class="nav-link-custom"
                       href="{{ route('tamu.import.form') }}"
                       title="Import Data Tamu">
                        <div class="nav-icon"><i class="fas fa-file-excel"></i></div>
                        <span class="nav-label">Import Data Tamu</span>
                    </a>
                </div>

                {{-- Cetak Formulir Tamu --}}
                <div class="nav-item">
                    <a class="nav-link-custom"
                       href="{{ route('tamu.formulir.print') }}"
                       target="_blank"
                       title="Cetak Formulir Tamu">
                        <div class="nav-icon"><i class="fas fa-file-alt"></i></div>
                        <span class="nav-label">Cetak Formulir Tamu</span>
                    </a>
                </div>

                {{-- Cetak Laporan --}}
                <div class="nav-item">
                    <a class="nav-link-custom"
                       href="{{ route('dashboard.print') }}"
                       target="_blank"
                       title="Cetak Laporan">
                        <div class="nav-icon"><i class="fas fa-print"></i></div>
                        <span class="nav-label">Cetak Laporan</span>
                    </a>
                </div>
            </div>

        </nav>

        {{-- Help Card Footer --}}
        <div class="sidebar-footer">
            <div class="sidebar-help-card">
                <div class="help-icon"><i class="fas fa-question"></i></div>
                <div class="help-title">Help Centre</div>
                <div class="help-sub">Butuh bantuan? Konsultasikan masalah Anda kepada kami.</div>
                <a href="#" class="btn-help">Hubungi Kami</a>
            </div>
        </div>

    </aside>

    {{-- Mobile Overlay --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleMobileSidebar()"></div>

    {{-- ================================================================
         HEADER
    ================================================================ --}}
    <header class="main-header" id="mainHeader">

        {{-- Mobile hamburger --}}
        <button class="sidebar-toggle-btn d-lg-none" onclick="toggleMobileSidebar()" style="flex-shrink:0;">
            <i class="fas fa-bars fa-sm"></i>
        </button>

        {{-- Right Actions --}}
        <div class="header-actions ms-auto">

            {{-- Notifikasi --}}
            @auth
            <div class="dropdown">
                <div class="header-icon-btn" title="Notifikasi" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-bell fa-sm"></i>
                    @php($unreadCount = Auth::user()->unreadNotifications()->count())
                    @if($unreadCount > 0)
                        <span class="badge-dot"></span>
                        <span class="notification-badge">{{ $unreadCount }}</span>
                    @endif
                </div>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0"
                    style="min-width:320px;border-radius:var(--radius);padding:0.45rem;margin-top:0.45rem;">
                    <li class="px-3 py-2 border-bottom">
                        <div class="fw-semibold text-primary">Notifikasi Baru</div>
                        <div class="small text-muted">Ada {{ $unreadCount }} tamu yang menunggu perhatian.</div>
                    </li>

                    @forelse(Auth::user()->unreadNotifications()->latest()->take(5)->get() as $notification)
                        <li>
                            <a class="dropdown-item rounded-2 py-2" href="{{ $notification->data['url'] ?? route('tamu.index') }}">
                                <div class="fw-semibold text-dark">{{ $notification->data['message'] ?? 'Ada data tamu baru.' }}</div>
                                <div class="small text-muted">{{ $notification->data['nama'] ?? '-' }} • {{ $notification->data['instansi'] ?? '-' }}</div>
                            </a>
                        </li>
                    @empty
                        <li class="px-3 py-2 text-muted small">Belum ada notifikasi baru.</li>
                    @endforelse

                    @if($unreadCount > 0)
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <form method="POST" action="{{ route('notifications.read.all') }}" id="mark-notifications">
                                @csrf
                                <a class="dropdown-item rounded-2 py-2 text-primary" href="#"
                                   onclick="event.preventDefault(); document.getElementById('mark-notifications').submit();">
                                    Tandai semua sudah dibaca
                                </a>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            @endauth

            {{-- User Dropdown --}}
            @auth
            <div class="dropdown">
                <div class="header-user-pill dropdown-toggle"
                     data-bs-toggle="dropdown" role="button" aria-expanded="false">
                    <div class="user-avatar-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="user-pill-info d-none d-sm-block">
                        <div class="user-name-sm">{{ Auth::user()->name }}</div>
                        <div class="user-role-sm">Admin</div>
                    </div>

                </div>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0"
                    style="border-radius:var(--radius);min-width:210px;
                           padding:0.5rem;margin-top:0.5rem;">
                    <li>
                        <div style="padding:0.7rem 1rem;
                                    border-bottom:1px solid var(--border);
                                    margin-bottom:0.25rem;">
                            <div style="font-size:0.85rem;font-weight:700;color:var(--text-primary);">
                                {{ Auth::user()->name }}
                            </div>
                            <div style="font-size:0.71rem;color:var(--text-muted);
                                        display:flex;align-items:center;
                                        gap:0.35rem;margin-top:0.15rem;">
                                <span style="width:6px;height:6px;background:#10b981;
                                             border-radius:50%;display:inline-block;
                                             box-shadow:0 0 4px #10b981;"></span>
                                Administrator
                            </div>
                        </div>
                    </li>
                    <li>
                    <a class="dropdown-item rounded-2 py-2" href="{{ route('profile.index') }}" style="font-size:0.84rem;">
                        <i class="fas fa-user-circle me-2" style="color:var(--primary);width:16px;"></i>
                            Profil Saya
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form-main">
                            @csrf
                            <a class="dropdown-item rounded-2 py-2 text-danger" href="#"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form-main').submit();"
                               style="font-size:0.84rem;">
                                <i class="fas fa-sign-out-alt me-2" style="width:16px;"></i>
                                Keluar
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth

        </div>
    </header>

    {{-- ================================================================
         MAIN CONTENT
    ================================================================ --}}
    <main class="main-content">

        @if(session('success'))
            <div class="alert alert-success alert-modern alert-dismissible fade show fade-in" role="alert">
                <i class="fas fa-check-circle fa-lg"></i>
                <span>{{ session('success') }}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-modern alert-dismissible fade show fade-in" role="alert">
                <i class="fas fa-exclamation-circle fa-lg"></i>
                <span>{{ session('error') }}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-modern alert-dismissible fade show fade-in" role="alert">
                <i class="fas fa-exclamation-triangle fa-lg"></i>
                <span>{{ session('warning') }}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="fade-in">
            @yield('content')
        </div>
    </main>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle sidebar collapse (desktop)
        function toggleSidebar() {
            document.body.classList.toggle('sidebar-collapsed');
            localStorage.setItem('sidebarCollapsed',
                document.body.classList.contains('sidebar-collapsed'));
        }

        // Toggle sidebar mobile
        function toggleMobileSidebar() {
            const sidebar = document.querySelector('.main-sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('active');
            document.body.style.overflow =
                sidebar.classList.contains('mobile-open') ? 'hidden' : '';
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Restore sidebar state dari localStorage
            if (localStorage.getItem('sidebarCollapsed') === 'true'
                && window.innerWidth > 991) {
                document.body.classList.add('sidebar-collapsed');
            }

            // Auto-dismiss alert setelah 5 detik
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(el => {
                    try { bootstrap.Alert.getOrCreateInstance(el).close(); }
                    catch (e) {}
                });
            }, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>