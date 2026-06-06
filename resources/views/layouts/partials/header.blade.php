{{-- layouts/partials/header.blade.php --}}
{{--
    Header ini dirender di dalam app.blade.php.
    Semua CSS header sudah ada di app.blade.php.
    Jika Anda meng-include file ini secara terpisah,
    tambahkan style di bawah atau pastikan app.blade.php di-load.
--}}

<header class="main-header" id="mainHeader">

    {{-- Mobile: toggle sidebar --}}
    <button class="sidebar-toggle-btn d-lg-none me-1" onclick="toggleMobileSidebar()" style="flex-shrink:0;">
        <i class="fas fa-bars fa-sm"></i>
    </button>

    {{-- Greeting (desktop) --}}
    <div class="header-greeting d-none d-md-block" style="flex:1;min-width:0;">
        @php
            $hour   = now()->hour;
            $greet  = $hour < 11
                        ? 'Good Morning'
                        : ($hour < 15 ? 'Good Afternoon' : ($hour < 18 ? 'Good Evening' : 'Good Night'));
        @endphp
        <div class="greeting-title">
            {{ $greet }},
            @auth
                <strong>{{ Auth::user()->name }}</strong> 👋
            @else
                <strong>Selamat Datang</strong>
            @endauth
        </div>
        <div class="greeting-sub">
            Manage your visitors with BKPSDM system by leveraging well-tested process.
        </div>
    </div>

    {{-- Right actions --}}
    <div class="header-actions">

        {{-- Language toggle (desktop) --}}
        <div class="header-icon-btn d-none d-lg-flex"
             style="width:auto;padding:0 0.7rem;gap:0.35rem;font-size:0.78rem;font-weight:600;color:var(--text-secondary);">
            <i class="fas fa-globe fa-sm"></i>
            <span>Indonesia</span>
        </div>

        {{-- Notification bell --}}
        <div class="header-icon-btn" title="Notifikasi" role="button">
            <i class="far fa-bell fa-sm"></i>
            <span class="badge-dot"></span>
        </div>

        {{-- User dropdown --}}
        @auth
        <div class="dropdown">
            <div class="header-user-pill dropdown-toggle" data-bs-toggle="dropdown" role="button"
                 aria-expanded="false">
                <div class="user-avatar-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="user-pill-info d-none d-sm-block">
                    <div class="user-name-sm">{{ Auth::user()->name }}</div>
                    <div class="user-role-sm">Admin</div>
                </div>
                <i class="fas fa-chevron-down ms-1"
                   style="font-size:0.6rem;color:var(--text-muted);"></i>
            </div>

            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0"
                style="border-radius:var(--radius);min-width:210px;padding:0.5rem;margin-top:0.5rem;">
                <li>
                    <div style="padding:0.7rem 1rem;border-bottom:1px solid var(--border);margin-bottom:0.25rem;">
                        <div style="font-size:0.85rem;font-weight:700;color:var(--text-primary);">
                            {{ Auth::user()->name }}
                        </div>
                        <div style="font-size:0.72rem;color:var(--text-muted);
                                    display:flex;align-items:center;gap:0.35rem;margin-top:0.15rem;">
                            <span style="width:6px;height:6px;background:#10b981;
                                         border-radius:50%;display:inline-block;
                                         box-shadow:0 0 4px #10b981;"></span>
                            Administrator
                        </div>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item rounded-2 py-2" href="#"
                       style="font-size:0.85rem;">
                        <i class="fas fa-user-circle me-2"
                           style="color:var(--primary);width:16px;"></i>
                        Profil Saya
                    </a>
                </li>
                <li>
                    <a class="dropdown-item rounded-2 py-2" href="#"
                       style="font-size:0.85rem;">
                        <i class="fas fa-cog me-2"
                           style="color:var(--text-secondary);width:16px;"></i>
                        Pengaturan
                    </a>
                </li>
                <li><hr class="dropdown-divider my-1"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form-header">
                        @csrf
                        <a class="dropdown-item rounded-2 py-2 text-danger" href="#"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form-header').submit();"
                           style="font-size:0.85rem;">
                            <i class="fas fa-sign-out-alt me-2" style="width:16px;"></i>
                            Keluar
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        @endauth

    </div>{{-- /.header-actions --}}

</header>