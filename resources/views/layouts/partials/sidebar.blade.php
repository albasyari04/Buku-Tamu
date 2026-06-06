{{-- layouts/partials/sidebar.blade.php --}}
{{--
    NOTE: Sidebar ini dirender di dalam app.blade.php.
    Jika Anda menggunakan sidebar sebagai partial terpisah (via @include),
    pastikan CSS variabel sudah di-load dari app.blade.php terlebih dahulu.
--}}

<aside class="main-sidebar" id="mainSidebar">

    {{-- Brand Box --}}
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

    {{-- User Block --}}
    <div class="sidebar-user-block">
        <div class="sidebar-user-avatar">
            @auth
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            @else
                <i class="fas fa-user fa-xs"></i>
            @endauth
        </div>
        <div class="sidebar-user-info">
            <div class="sidebar-user-name">
                @auth {{ Auth::user()->name }} @else Guest @endauth
            </div>
            <div class="sidebar-user-role">Administrator</div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">

        {{-- Main Menu --}}
        <div class="nav-section">
            <div class="nav-section-title">Main Menu</div>

            <div class="nav-item">
                <a class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}"
                   title="Dashboard">
                    <div class="nav-icon"><i class="fas fa-chart-line"></i></div>
                    <span class="nav-label">Dashboard</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom {{ request()->routeIs('tamu.*') ? 'active' : '' }}"
                   href="{{ route('tamu.index') }}"
                   title="Data Tamu">
                    <div class="nav-icon"><i class="fas fa-users"></i></div>
                    <span class="nav-label">Visitors</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="#" title="Notifications">
                    <div class="nav-icon"><i class="fas fa-bell"></i></div>
                    <span class="nav-label">Notifications</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="#" title="Message">
                    <div class="nav-icon"><i class="fas fa-comment-dots"></i></div>
                    <span class="nav-label">Message</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom {{ request()->routeIs('pegawai.*') ? 'active' : '' }}"
                   href="{{ route('pegawai.index') }}"
                   title="Kelola Pegawai">
                    <div class="nav-icon"><i class="fas fa-user-tie"></i></div>
                    <span class="nav-label">Manage Visitors</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="#" title="Kepuasan Tamu">
                    <div class="nav-icon"><i class="fas fa-star"></i></div>
                    <span class="nav-label">Kepuasan Tamu</span>
                    <span class="nav-badge">New</span>
                </a>
            </div>
        </div>

        {{-- Laporan --}}
        <div class="nav-section">
            <div class="nav-section-title">Laporan</div>

            <div class="nav-item">
                <a class="nav-link-custom" href="{{ route('tamu.export.pdf') }}" title="Export PDF">
                    <div class="nav-icon"><i class="fas fa-file-pdf"></i></div>
                    <span class="nav-label">Export PDF</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="{{ route('dashboard.print') }}" target="_blank" title="Cetak Laporan">
                    <div class="nav-icon"><i class="fas fa-print"></i></div>
                    <span class="nav-label">Cetak Laporan</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="{{ route('tamu.import.form') }}" title="Import Data Tamu">
                    <div class="nav-icon"><i class="fas fa-file-excel"></i></div>
                    <span class="nav-label">Import Data Tamu</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="{{ route('tamu.formulir.print') }}" target="_blank" title="Cetak Formulir Tamu">
                    <div class="nav-icon"><i class="fas fa-file-alt"></i></div>
                    <span class="nav-label">Cetak Formulir Tamu</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="#" title="Statistik">
                    <div class="nav-icon"><i class="fas fa-chart-bar"></i></div>
                    <span class="nav-label">Statistik</span>
                </a>
            </div>
        </div>

        {{-- Pengaturan --}}
        <div class="nav-section">
            <div class="nav-section-title">Pengaturan</div>

            <div class="nav-item">
                <a class="nav-link-custom" href="#" title="Devices">
                    <div class="nav-icon"><i class="fas fa-desktop"></i></div>
                    <span class="nav-label">Devices</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link-custom" href="#" title="Settings">
                    <div class="nav-icon"><i class="fas fa-cog"></i></div>
                    <span class="nav-label">Settings</span>
                </a>
            </div>
        </div>
    </nav>

    {{-- Footer Help Card --}}
    <div class="sidebar-footer">
        <div class="sidebar-help-card">
            <div class="help-icon">
                <i class="fas fa-question"></i>
            </div>
            <div class="help-title">Help Centre</div>
            <div class="help-sub">Getting trouble? Consult and solve your problem</div>
            <a href="#" class="btn-help">Consult Now</a>
        </div>
    </div>

</aside>