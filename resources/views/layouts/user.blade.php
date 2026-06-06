<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Tamu — BKPSDM OKU Timur')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* =============================================
           DESIGN TOKENS — selaras dengan app.blade.php
        ============================================= */
        :root {
            --primary:       #4F46E5;
            --primary-dark:  #4338CA;
            --primary-light: #EEF2FF;
            --primary-mid:   #E0E7FF;
            --primary-glow:  rgba(79,70,229,.18);

            --success:       #10b981;
            --warning:       #f59e0b;
            --danger:        #ef4444;

            --body-bg:       #F0F2F9;
            --card-bg:       #ffffff;
            --border:        #E2E8F0;
            --border-lt:     #F1F5F9;

            --text-primary:  #0F172A;
            --text-secondary:#475569;
            --text-muted:    #94A3B8;

            --shadow-sm:  0 2px 8px rgba(0,0,0,.06);
            --shadow-md:  0 8px 28px rgba(0,0,0,.10);

            --radius-sm: 8px;
            --radius:    12px;
            --radius-lg: 16px;
            --radius-xl: 20px;

            --font-body:    'Plus Jakarta Sans', system-ui, sans-serif;
            --font-heading: 'Nunito', system-ui, sans-serif;
            --transition:   all 0.22s cubic-bezier(0.4, 0, 0.2, 1);

            --nav-height: 64px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: var(--font-body);
            background: var(--body-bg);
            color: var(--text-primary);
            min-height: 100vh;
            font-size: 0.9rem;
            line-height: 1.55;
        }

        h1,h2,h3,h4,h5,h6 {
            font-family: var(--font-heading);
            font-weight: 700;
        }

        ::-webkit-scrollbar { width:5px; }
        ::-webkit-scrollbar-thumb { background:#d1d5db; border-radius:10px; }

        /* =============================================
           TOPNAV
        ============================================= */
        .user-topnav {
            position: sticky;
            top: 0;
            z-index: 1000;
            height: var(--nav-height);
            background: #fff;
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            gap: 1rem;
        }

        .topnav-brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            flex-shrink: 0;
        }
        .topnav-brand img {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            object-fit: contain;
        }
        .topnav-brand-name {
            font-family: var(--font-heading);
            font-size: 0.82rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.2;
        }
        .topnav-brand-name span {
            display: block;
            font-size: 0.62rem;
            font-weight: 500;
            color: var(--text-muted);
            letter-spacing: 0.04em;
        }

        .topnav-divider {
            width: 1px;
            height: 28px;
            background: var(--border);
            flex-shrink: 0;
        }

        /* Nav links */
        .topnav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            flex: 1;
            justify-content: flex-end;
            overflow-x: auto;
            margin-left: auto;
        }
        .topnav-links::-webkit-scrollbar { display: none; }

        .nav-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.45rem 0.9rem;
            border-radius: 30px;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-secondary);
            text-decoration: none;
            white-space: nowrap;
            transition: var(--transition);
        }
        .nav-pill:hover {
            background: var(--primary-light);
            color: var(--primary);
        }
        .nav-pill.active {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            box-shadow: 0 4px 12px var(--primary-glow);
        }
        .nav-pill i { font-size: 0.78rem; }

        /* Right actions */
        .topnav-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-shrink: 0;
            margin-left: auto;
        }

        .user-avatar-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary-light);
            border: none;
            border-radius: 30px;
            padding: 0.35rem 0.85rem 0.35rem 0.35rem;
            cursor: pointer;
            transition: var(--transition);
        }
        .user-avatar-btn:hover { background: var(--primary-mid); }

        .avatar-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .avatar-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
        }

        /* =============================================
           PAGE WRAPPER
        ============================================= */
        .page-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* =============================================
           ALERT
        ============================================= */
        .alert-modern {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border: none;
            border-radius: var(--radius);
            padding: 0.85rem 1.1rem;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
        }
        .alert-modern.alert-success { background:#d1fae5; color:#065f46; }
        .alert-modern.alert-danger  { background:#fee2e2; color:#991b1b; }
        .alert-modern.alert-warning { background:#fef3c7; color:#92400e; }

        /* =============================================
           FOOTER
        ============================================= */
        .user-footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.75rem;
            color: var(--text-muted);
            border-top: 1px solid var(--border);
            margin-top: 3rem;
        }

        /* =============================================
           FADE IN
        ============================================= */
        .fade-in {
            animation: fadeIn .35s ease both;
        }
        @keyframes fadeIn {
            from { opacity:0; transform:translateY(10px); }
            to   { opacity:1; transform:translateY(0); }
        }

        /* =============================================
           MOBILE RESPONSIVE
        ============================================= */
        @media (max-width: 576px) {
            .page-wrapper { padding: 1rem; }
            .topnav-brand-name span { display: none; }
            .avatar-name { display: none; }
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ================================================================
         TOPNAV
    ================================================================ --}}
    <nav class="user-topnav">

        {{-- Brand --}}
        <a href="{{ route('user.dashboard') }}" class="topnav-brand">
            <img src="{{ asset('images/logo_bkpsdm.jpg') }}" alt="Logo BKPSDM">
            <div class="topnav-brand-name">
                BUKU TAMU
                <span>BKPSDM OKU TIMUR</span>
            </div>
        </a>

        <div class="topnav-divider d-none d-md-block"></div>

        {{-- Nav Links --}}
        <div class="topnav-links d-none d-md-flex me-2">
            <a href="{{ route('user.dashboard') }}"
               class="nav-pill {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('user.form') }}"
               class="nav-pill {{ request()->routeIs('user.form') ? 'active' : '' }}">
                <i class="fas fa-pen-to-square"></i> Isi Buku Tamu
            </a>
            <a href="{{ route('user.riwayat') }}"
               class="nav-pill {{ request()->routeIs('user.riwayat') ? 'active' : '' }}">
                <i class="fas fa-clock-rotate-left"></i> Riwayat
            </a>
        </div>

        {{-- Right --}}
        <div class="topnav-actions ms-2">
            @auth
            <div class="dropdown">
                <button class="user-avatar-btn dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="border: none; outline: none;">
                    <div class="avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="avatar-name">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0"
                    style="border-radius:var(--radius);min-width:200px;padding:0.5rem;margin-top:0.5rem;">
                    <li>
                        <div style="padding:0.7rem 1rem;border-bottom:1px solid var(--border);margin-bottom:0.25rem;">
                            <div style="font-size:0.85rem;font-weight:700;color:var(--text-primary);">
                                {{ Auth::user()->name }}
                            </div>
                            <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.2rem;">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="{{ route('user.dashboard') }}"
                           style="font-size:0.84rem;">
                            <i class="fas fa-home me-2" style="color:var(--primary);width:16px;"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="{{ route('user.form') }}"
                           style="font-size:0.84rem;">
                            <i class="fas fa-pen-to-square me-2" style="color:var(--primary);width:16px;"></i>
                            Isi Buku Tamu
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="{{ route('user.riwayat') }}"
                           style="font-size:0.84rem;">
                            <i class="fas fa-clock-rotate-left me-2" style="color:var(--primary);width:16px;"></i>
                            Riwayat Kunjungan
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form-user">
                            @csrf
                            <a class="dropdown-item rounded-2 py-2 text-danger" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();"
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

        {{-- Mobile Hamburger --}}
        <button class="btn btn-sm d-md-none ms-2"
                style="background:var(--primary-light);border:none;border-radius:var(--radius-sm);color:var(--primary);padding:0.4rem 0.6rem;"
                data-bs-toggle="offcanvas" data-bs-target="#mobileNav">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    {{-- Mobile Offcanvas Nav --}}
    <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileNav"
         style="width:260px;border-right:1px solid var(--border);">
        <div class="offcanvas-header" style="border-bottom:1px solid var(--border);">
            <h6 class="offcanvas-title" style="font-weight:800;color:var(--primary);">
                <i class="fas fa-book-open me-2"></i> Menu Portal Tamu
            </h6>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-3">
            <div class="d-flex flex-column gap-1">
                <a href="{{ route('user.dashboard') }}"
                   class="nav-pill {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <a href="{{ route('user.form') }}"
                   class="nav-pill {{ request()->routeIs('user.form') ? 'active' : '' }}">
                    <i class="fas fa-pen-to-square"></i> Isi Buku Tamu
                </a>
                <a href="{{ route('user.riwayat') }}"
                   class="nav-pill {{ request()->routeIs('user.riwayat') ? 'active' : '' }}">
                    <i class="fas fa-clock-rotate-left"></i> Riwayat Kunjungan
                </a>
                <hr style="border-color:var(--border);">
                <form method="POST" action="{{ route('logout') }}" id="logout-offcanvas">
                    @csrf
                    <a class="nav-pill text-danger" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-offcanvas').submit();">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                </form>
            </div>
        </div>
    </div>

    {{-- ================================================================
         MAIN CONTENT
    ================================================================ --}}
    <main>
        <div class="page-wrapper fade-in">

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-modern alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle fa-lg"></i>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-modern alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle fa-lg"></i>
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-modern alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle fa-lg"></i>
                    <span>{{ session('warning') }}</span>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    {{-- ================================================================
         FOOTER
    ================================================================ --}}
    <footer class="user-footer">
        &copy; {{ date('Y') }} <strong>BKPSDM OKU TIMUR</strong> — Sistem Buku Tamu Digital.
        Koneksi Aman &nbsp;<i class="fas fa-shield-alt"></i>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Auto-dismiss alert setelah 5 detik
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(el => {
                    try { bootstrap.Alert.getOrCreateInstance(el).close(); } catch(e) {}
                });
            }, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>