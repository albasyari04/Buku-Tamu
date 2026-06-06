@extends('layouts.app')

@section('title', 'Dashboard - BKPSDM Buku Tamu')

@section('content')

{{-- ================================================================
     HELLO BANNER CARD - Premium Welcome Section
     ================================================================ --}}
<div class="row g-4 mb-4" data-aos="fade-up" data-aos-delay="50">
    <div class="col-12">
        <div class="welcome-card">
            <div class="welcome-card-bg"></div>
            <div class="welcome-card-dots"></div>
            <div class="welcome-card-content">
                <div class="welcome-text-section">
                    <div class="welcome-badge">
                        <i class="fas fa-shield-halved"></i>
                        <span>Administrator</span>
                    </div>
                    @php
                        $hour  = now()->hour;
                        $greet = $hour < 11 ? 'Selamat Pagi'
                               : ($hour < 15 ? 'Selamat Siang'
                               : ($hour < 18 ? 'Selamat Sore' : 'Selamat Malam'));
                    @endphp
                    <h1 class="welcome-title">
                        {{ $greet }},
                        @auth<strong class="welcome-name">{{ Auth::user()->name }}</strong>@else<strong class="welcome-name">Administrator</strong>@endauth
                        <span class="welcome-wave">👋</span>
                    </h1>
                    <p class="welcome-subtitle">
                        Kelola data kunjungan tamu BKPSDM OKU TIMUR dengan mudah dan efisien.
                    </p>
                    <a href="{{ route('tamu.create') }}" class="welcome-cta-btn">
                        <i class="fas fa-star me-2"></i>Semangat bekerja!
                    </a>
                    <div class="welcome-meta">
                        <div class="welcome-meta-item">
                            <i class="fas fa-calendar-days"></i>
                            <span>Hari ini: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <div class="welcome-meta-divider"></div>
                        <div class="welcome-meta-item">
                            <i class="fas fa-users-line"></i>
                            <span>Total kunjungan bulan ini: <strong>{{ number_format($totalTamu) }} tamu</strong></span>
                        </div>
                    </div>
                </div>
                <div class="welcome-illustration-wrap">
                    <div class="welcome-illustration">
                        <!-- Animated Dashboard Illustration SVG -->
                        <svg viewBox="0 0 220 180" xmlns="http://www.w3.org/2000/svg" class="welcome-svg">
                            <!-- Monitor -->
                            <rect x="30" y="20" width="160" height="110" rx="8" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.3)" stroke-width="1.5"/>
                            <rect x="38" y="28" width="144" height="86" rx="4" fill="rgba(255,255,255,0.1)"/>
                            <!-- Chart bars -->
                            <rect x="50" y="85" width="16" height="22" rx="3" fill="rgba(255,255,255,0.5)" class="bar-anim bar1"/>
                            <rect x="72" y="70" width="16" height="37" rx="3" fill="rgba(251,191,36,0.8)" class="bar-anim bar2"/>
                            <rect x="94" y="78" width="16" height="29" rx="3" fill="rgba(255,255,255,0.5)" class="bar-anim bar3"/>
                            <rect x="116" y="62" width="16" height="45" rx="3" fill="rgba(251,191,36,0.8)" class="bar-anim bar4"/>
                            <rect x="138" y="72" width="16" height="35" rx="3" fill="rgba(255,255,255,0.5)" class="bar-anim bar5"/>
                            <!-- Line chart -->
                            <polyline points="50,60 72,52 94,55 116,44 138,48 162,38" fill="none" stroke="rgba(251,191,36,0.9)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="line-anim"/>
                            <!-- Dots on line -->
                            <circle cx="116" cy="44" r="4" fill="#fbbf24"/>
                            <circle cx="162" cy="38" r="4" fill="#fbbf24"/>
                            <!-- Monitor stand -->
                            <rect x="95" y="130" width="30" height="8" rx="2" fill="rgba(255,255,255,0.2)"/>
                            <rect x="85" y="138" width="50" height="5" rx="2" fill="rgba(255,255,255,0.2)"/>
                            <!-- Floating stat bubble -->
                            <rect x="148" y="12" width="62" height="28" rx="8" fill="rgba(251,191,36,0.9)" class="float-anim"/>
                            <text x="164" y="22" font-size="7" fill="#1e293b" font-weight="700">↑ 12% Bulan</text>
                            <text x="164" y="33" font-size="7" fill="#1e293b">ini meningkat</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     STAT CARDS - 4 Column Premium Design
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon-wrap stat-blue">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-badge stat-badge-up">
                    <i class="fas fa-arrow-up"></i> 12%
                </div>
            </div>
            <div class="stat-card-body">
                <div class="stat-value-large">{{ number_format($totalTamu) }}</div>
                <div class="stat-label-text">TOTAL TAMU</div>
                <div class="stat-sparkline-wrap">
                    <svg viewBox="0 0 120 35" class="sparkline-svg">
                        <defs>
                            <linearGradient id="sg1" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.3"/>
                                <stop offset="100%" stop-color="#3b82f6" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <path d="M5,28 L22,22 L38,24 L55,14 L72,16 L90,10 L110,12" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"/>
                        <path d="M5,28 L22,22 L38,24 L55,14 L72,16 L90,10 L110,12 L110,35 L5,35Z" fill="url(#sg1)"/>
                    </svg>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="{{ route('tamu.index') }}" class="stat-footer-link">
                    Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon-wrap stat-green">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-badge stat-badge-cal">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </div>
            <div class="stat-card-body">
                <div class="stat-value-large">{{ number_format($tamuHariIni) }}</div>
                <div class="stat-label-text">TAMU HARI INI</div>
                <div class="stat-sparkline-wrap">
                    <svg viewBox="0 0 120 35" class="sparkline-svg">
                        <defs>
                            <linearGradient id="sg2" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#10b981" stop-opacity="0.3"/>
                                <stop offset="100%" stop-color="#10b981" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <path d="M5,24 L22,20 L38,17 L55,12 L72,14 L90,9 L110,7" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round"/>
                        <path d="M5,24 L22,20 L38,17 L55,12 L72,14 L90,9 L110,7 L110,35 L5,35Z" fill="url(#sg2)"/>
                    </svg>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="{{ route('tamu.create') }}" class="stat-footer-link">
                    Tambah Tamu <i class="fas fa-plus ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon-wrap stat-purple">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="stat-badge stat-badge-check">
                    <i class="fas fa-circle-check"></i>
                </div>
            </div>
            <div class="stat-card-body">
                <div class="stat-value-large">{{ number_format($totalPegawai) }}</div>
                <div class="stat-label-text">TOTAL PEGAWAI</div>
                <div class="stat-sparkline-wrap">
                    <svg viewBox="0 0 120 35" class="sparkline-svg">
                        <defs>
                            <linearGradient id="sg3" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#8b5cf6" stop-opacity="0.3"/>
                                <stop offset="100%" stop-color="#8b5cf6" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <path d="M5,20 L22,18 L38,16 L55,14 L72,12 L90,9 L110,7" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round"/>
                        <path d="M5,20 L22,18 L38,16 L55,14 L72,12 L90,9 L110,7 L110,35 L5,35Z" fill="url(#sg3)"/>
                    </svg>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="{{ route('pegawai.index') }}" class="stat-footer-link">
                    Kelola Pegawai <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon-wrap stat-orange">
                    <i class="fas fa-face-smile"></i>
                </div>
                <div class="stat-badge stat-badge-smile">
                    <i class="fas fa-smile"></i>
                </div>
            </div>
            <div class="stat-card-body">
                <div class="stat-value-large">94<span style="font-size:1.5rem;font-weight:600;">%</span></div>
                <div class="stat-label-text">KEPUASAN TAMU</div>
                <div class="stat-sparkline-wrap">
                    <svg viewBox="0 0 120 35" class="sparkline-svg">
                        <defs>
                            <linearGradient id="sg4" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#f59e0b" stop-opacity="0.3"/>
                                <stop offset="100%" stop-color="#f59e0b" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <path d="M5,22 L22,20 L38,18 L55,14 L72,11 L90,7 L110,5" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round"/>
                        <path d="M5,22 L22,20 L38,18 L55,14 L72,11 L90,7 L110,5 L110,35 L5,35Z" fill="url(#sg4)"/>
                    </svg>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="#" class="stat-footer-link">
                    Lihat Rating <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     CHARTS SECTION - Bar Chart + Donut Chart
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-8" data-aos="fade-right">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-icon-wrap icon-blue">
                        <i class="fas fa-chart-column"></i>
                    </div>
                    <div>
                        <h5 class="card-title-main">Statistik Kunjungan</h5>
                        <p class="card-subtitle-main">Grafik kunjungan tamu 7 hari terakhir</p>
                    </div>
                </div>
                <div class="card-header-right">
                    <div class="dropdown">
                        <button class="period-select-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-calendar-week me-1"></i> Minggu Ini
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item active" href="#">Minggu Ini</a></li>
                            <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                            <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="chart-area">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4" data-aos="fade-left">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-icon-wrap icon-green">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <div>
                        <h5 class="card-title-main">Tingkat Kepuasan</h5>
                        <p class="card-subtitle-main">Feedback dari tamu</p>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="donut-wrap">
                    <canvas id="satisfactionChart"></canvas>
                    <div class="donut-center">
                        <div class="donut-pct">94%</div>
                        <div class="donut-lbl">Kepuasan</div>
                    </div>
                </div>
                <div class="satisfaction-legend">
                    <div class="sat-row">
                        <span class="sat-dot" style="background:#10b981;"></span>
                        <span class="sat-name">Sangat Puas</span>
                        <span class="sat-pct">65%</span>
                    </div>
                    <div class="sat-row">
                        <span class="sat-dot" style="background:#3b82f6;"></span>
                        <span class="sat-name">Puas</span>
                        <span class="sat-pct">25%</span>
                    </div>
                    <div class="sat-row">
                        <span class="sat-dot" style="background:#f59e0b;"></span>
                        <span class="sat-name">Cukup</span>
                        <span class="sat-pct">7%</span>
                    </div>
                    <div class="sat-row">
                        <span class="sat-dot" style="background:#ef4444;"></span>
                        <span class="sat-name">Kurang</span>
                        <span class="sat-pct">3%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     POPULAR EMPLOYEES + INSTANSI STATS
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-5" data-aos="fade-right">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-icon-wrap icon-yellow">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div>
                        <h5 class="card-title-main">Pegawai Terpopuler</h5>
                        <p class="card-subtitle-main">Paling banyak dikunjungi bulan ini</p>
                    </div>
                </div>
                <span class="top5-badge">Top 5</span>
            </div>
            <div class="card-body-custom p-0">
                <div class="ranking-list">
                    @php
                        $rankColors = ['rank-gold','rank-silver','rank-bronze','rank-4','rank-5'];
                        $rankIcons  = ['fas fa-crown','2','3','4','5'];
                        $employees = [
                            ['name'=>'Dr. Ahmad Fauzi, M.Si.','pos'=>'Kepala Badan','visits'=>42,'avatar'=>'AF'],
                            ['name'=>'Drs. Budi Santoso','pos'=>'Sekretaris','visits'=>38,'avatar'=>'BS'],
                            ['name'=>'Siti Rahayu, S.Sos.','pos'=>'Bidang Mutasi','visits'=>35,'avatar'=>'SR'],
                            ['name'=>'Rina Andriani, S.Kom.','pos'=>'Bidang Pengadaan','visits'=>29,'avatar'=>'RA'],
                            ['name'=>'Joko Prasetyo, M.M.','pos'=>'Bidang Kompetensi','visits'=>24,'avatar'=>'JP'],
                        ];
                        $avatarColors = ['av-blue','av-teal','av-purple','av-orange','av-dark'];
                    @endphp
                    @foreach($employees as $i => $emp)
                    <div class="rank-item {{ $i === 0 ? 'rank-item-top' : '' }}">
                        <div class="rank-num-wrap {{ $rankColors[$i] }}">
                            @if($i === 0)
                                <i class="fas fa-crown"></i>
                            @else
                                {{ $i + 1 }}
                            @endif
                        </div>
                        <div class="rank-avatar {{ $avatarColors[$i] }}">
                            {{ $emp['avatar'] }}
                        </div>
                        <div class="rank-info">
                            <div class="rank-name">{{ $emp['name'] }}</div>
                            <div class="rank-pos">{{ $emp['pos'] }}</div>
                        </div>
                        <div class="rank-visits">
                            <div class="rank-count">{{ $emp['visits'] }}</div>
                            <div class="rank-count-lbl">Kunjungan</div>
                        </div>
                    </div>
                    @endforeach
                </div>

@push('styles')
<style>
    .perihal-row .perihal-icon-wrap {
        background-color: var(--bg-color);
        color: var(--color);
    }
    .perihal-row .perihal-fill {
        width: var(--pct);
        background-color: var(--color);
    }
</style>
@endpush
            </div>
        </div>
    </div>

    <div class="col-xl-7" data-aos="fade-left">
        <div class="row g-4 h-100 flex-column">
            {{-- Global Sales by Top Locations --}}
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <div class="card-header-left">
                            <div class="card-icon-wrap icon-cyan">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div>
                                <h5 class="card-title-main">Global Sales by Top Locations</h5>
                                <p class="card-subtitle-main">Penjualan global berdasarkan lokasi teratas</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom p-0">
                        <table class="locations-table">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Sales</th>
                                    <th>Average</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="flag-icon">🇩🇪</span> <span class="country-nm">Germany</span></td>
                                    <td class="sales-num">3,562</td>
                                    <td><div class="loc-progress-wrap"><div class="loc-progress-bar" style="width:56.23%"></div><span class="loc-pct">56.23%</span></div></td>
                                </tr>
                                <tr>
                                    <td><span class="flag-icon">🇺🇸</span> <span class="country-nm">USA</span></td>
                                    <td class="sales-num">2,650</td>
                                    <td><div class="loc-progress-wrap"><div class="loc-progress-bar" style="width:25.23%"></div><span class="loc-pct">25.23%</span></div></td>
                                </tr>
                                <tr>
                                    <td><span class="flag-icon">🇦🇺</span> <span class="country-nm">Australia</span></td>
                                    <td class="sales-num">956</td>
                                    <td><div class="loc-progress-wrap"><div class="loc-progress-bar" style="width:12.45%"></div><span class="loc-pct">12.45%</span></div></td>
                                </tr>
                                <tr>
                                    <td><span class="flag-icon">🇬🇧</span> <span class="country-nm">United Kingdom</span></td>
                                    <td class="sales-num">689</td>
                                    <td><div class="loc-progress-wrap"><div class="loc-progress-bar" style="width:8.65%"></div><span class="loc-pct">8.65%</span></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     QUICK ACTIONS + PERIHAL STATS
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-4" data-aos="fade-up">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-icon-wrap icon-red">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div>
                        <h5 class="card-title-main">Aksi Cepat</h5>
                        <p class="card-subtitle-main">Akses cepat menu utama</p>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="quick-grid">
                    <a href="{{ route('tamu.create') }}" class="quick-btn quick-btn-blue">
                        <div class="quick-btn-icon"><i class="fas fa-user-plus"></i></div>
                        <span>Tambah Tamu</span>
                    </a>
                    <a href="{{ route('tamu.index') }}" class="quick-btn quick-btn-green">
                        <div class="quick-btn-icon"><i class="fas fa-list-ul"></i></div>
                        <span>Data Tamu</span>
                    </a>
                    <a href="{{ route('pegawai.index') }}" class="quick-btn quick-btn-purple">
                        <div class="quick-btn-icon"><i class="fas fa-address-card"></i></div>
                        <span>Data Pegawai</span>
                    </a>
                    <a href="{{ route('dashboard.export.pdf') }}" class="quick-btn quick-btn-orange">
                        <div class="quick-btn-icon"><i class="fas fa-file-pdf"></i></div>
                        <span>Laporan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8" data-aos="fade-up" data-aos-delay="100">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-icon-wrap icon-teal">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div>
                        <h5 class="card-title-main">Statistik Perihal</h5>
                        <p class="card-subtitle-main">Top 5 keperluan kunjungan</p>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                @php
                    $perihals = [
                        ['label'=>'Kenaikan Pangkat','count'=>45,'pct'=>75,'icon'=>'fas fa-arrow-trend-up','color'=>'#3b82f6','bg'=>'rgba(59,130,246,0.1)'],
                        ['label'=>'Gaji Berkala','count'=>38,'pct'=>63,'icon'=>'fas fa-money-bill-wave','color'=>'#10b981','bg'=>'rgba(16,185,129,0.1)'],
                        ['label'=>'Mutasi Pegawai','count'=>32,'pct'=>53,'icon'=>'fas fa-arrows-left-right','color'=>'#06b6d4','bg'=>'rgba(6,182,212,0.1)'],
                        ['label'=>'Konsultasi','count'=>28,'pct'=>47,'icon'=>'fas fa-comments','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.1)'],
                        ['label'=>'Diklat ASN','count'=>22,'pct'=>37,'icon'=>'fas fa-graduation-cap','color'=>'#ef4444','bg'=>'rgba(239,68,68,0.1)'],
                    ];
                @endphp
                <div class="perihal-list">
                    @foreach($perihals as $p)
                    <div class="perihal-row" style="--bg-color: {{ $p['bg'] }}; --color: {{ $p['color'] }}; --pct: {{ $p['pct'] }}%;">
                        <div class="perihal-icon-wrap">
                            <i class="{{ $p['icon'] }}"></i>
                        </div>
                        <div class="perihal-details">
                            <div class="perihal-top">
                                <span class="perihal-lbl">{{ $p['label'] }}</span>
                                <span class="perihal-cnt">{{ $p['count'] }}</span>
                            </div>
                            <div class="perihal-track">
                                <div class="perihal-fill"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     RECENT TAMU TABLE - Enhanced Premium
     ================================================================ --}}
<div class="dashboard-card mb-4" data-aos="fade-up" data-aos-delay="200">
    <div class="card-header-custom">
        <div class="card-header-left">
            <div class="card-icon-wrap icon-blue">
                <i class="fas fa-clock-rotate-left"></i>
            </div>
            <div>
                <h5 class="card-title-main">Tamu Terbaru</h5>
                <p class="card-subtitle-main">5 kunjungan terakhir</p>
            </div>
        </div>
        <a href="{{ route('tamu.index') }}" class="view-all-btn">
            Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="card-body-custom p-0">
        <div class="table-responsive">
            <table class="tamu-table">
                <thead>
                    <tr>
                        <th class="th-num">#</th>
                        <th>Nama Tamu</th>
                        <th class="th-contact">Kontak</th>
                        <th class="th-inst">Instansi</th>
                        <th>Bertemu</th>
                        <th class="th-perihal">Perihal</th>
                        <th>Waktu</th>
                        <th class="th-aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tamuTerbaru as $index => $tamu)
                    <tr>
                        <td class="th-num">
                            <div class="tbl-num-badge">{{ $index + 1 }}</div>
                        </td>
                        <td>
                            <div class="tbl-visitor-cell">
                                <div class="tbl-avatar av-{{ ['blue','green','purple','orange','dark'][$index % 5] }}">
                                    {{ strtoupper(substr($tamu->nama, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="tbl-name">{{ $tamu->nama }}</div>
                                    <div class="tbl-id">{{ $tamu->nip_nik ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="th-contact">
                            @if($tamu->no_hp)
                            <span class="tbl-contact-chip">
                                <i class="fas fa-phone-flip"></i> {{ $tamu->no_hp }}
                            </span>
                            @else
                            <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="th-inst">
                            <span class="tbl-inst-text">{{ Str::limit($tamu->instansi ?? '—', 28) }}</span>
                        </td>
                        <td>
                            <span class="tbl-meet-badge">{{ $tamu->bertemu_dengan }}</span>
                        </td>
                        <td class="th-perihal">
                            <span class="tbl-purpose">{{ Str::limit($tamu->perihal ?? '—', 40) }}</span>
                        </td>
                        <td>
                            <div class="tbl-time">
                                <div class="tbl-date">{{ $tamu->tanggal_kunjungan->format('d/m/Y') }}</div>
                                <div class="tbl-hour">{{ $tamu->tanggal_kunjungan->format('H:i') }}</div>
                            </div>
                        </td>
                        <td class="th-aksi">
                            <div class="tbl-actions">
                                <a href="{{ route('tamu.show', $tamu->id) }}" class="tbl-btn tbl-btn-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('tamu.edit', $tamu->id) }}" class="tbl-btn tbl-btn-edit" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <div class="empty-icon-wrap">
                                    <i class="fas fa-inbox"></i>
                                </div>
                                <h6 class="empty-title">Belum Ada Data Tamu</h6>
                                <p class="empty-desc">Data kunjungan tamu akan muncul di sini</p>
                                <a href="{{ route('tamu.create') }}" class="empty-cta">
                                    <i class="fas fa-plus me-1"></i>Tambah Tamu Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
/* =============================================
   CSS VARIABLES & BASE
   ============================================= */
:root {
    --blue:    #3b82f6;
    --green:   #10b981;
    --purple:  #8b5cf6;
    --orange:  #f59e0b;
    --red:     #ef4444;
    --cyan:    #06b6d4;
    --teal:    #14b8a6;
    --dark:    #0f172a;
    --dark2:   #1e293b;
    --mid:     #334155;
    --muted:   #64748b;
    --light:   #94a3b8;
    --border:  #e2e8f0;
    --bg:      #f8fafc;
    --white:   #ffffff;

    --shadow-sm: 0 1px 3px rgba(0,0,0,.06);
    --shadow:    0 4px 12px rgba(0,0,0,.08);
    --shadow-md: 0 8px 24px rgba(0,0,0,.10);
    --shadow-lg: 0 16px 40px rgba(0,0,0,.12);
    --radius:    20px;
    --radius-sm: 12px;
}

*, *::before, *::after { box-sizing: border-box; margin:0; padding:0; }

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--dark2);
}

/* =============================================
   WELCOME CARD
   ============================================= */
.welcome-card {
    position: relative;
    background: linear-gradient(135deg, #1a56db 0%, #5b21b6 60%, #7c3aed 100%);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.welcome-card-bg {
    position: absolute; inset: 0;
    background:
        radial-gradient(ellipse at 80% 20%, rgba(251,191,36,.18) 0%, transparent 55%),
        radial-gradient(ellipse at 10% 80%, rgba(255,255,255,.10) 0%, transparent 50%);
}

.welcome-card-dots {
    position: absolute; inset: 0; pointer-events: none;
    background-image: radial-gradient(rgba(255,255,255,.1) 1px, transparent 1px);
    background-size: 28px 28px;
    mask-image: radial-gradient(ellipse at 70% 50%, black 30%, transparent 70%);
}

.welcome-card-content {
    position: relative;
    padding: 2.2rem 2.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    flex-wrap: wrap;
}

.welcome-text-section { flex: 1; min-width: 260px; }

.welcome-badge {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: rgba(255,255,255,.18);
    backdrop-filter: blur(8px);
    padding: .35rem .9rem;
    border-radius: 40px;
    color: rgba(255,255,255,.95);
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .4px;
    margin-bottom: 1rem;
    border: 1px solid rgba(255,255,255,.25);
}

.welcome-title {
    font-size: 1.9rem;
    font-weight: 800;
    color: white;
    margin-bottom: .6rem;
    letter-spacing: -.02em;
    line-height: 1.2;
}

.welcome-name {
    background: linear-gradient(90deg, #fff 40%, #fbbf24);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.welcome-wave {
    display: inline-block;
    animation: waveHand 1.2s ease-in-out infinite;
}
@keyframes waveHand {
    0%,100% { transform: rotate(0deg); }
    40%      { transform: rotate(18deg); }
    70%      { transform: rotate(-8deg); }
}

.welcome-subtitle {
    font-size: .88rem;
    color: rgba(255,255,255,.82);
    margin-bottom: 1.1rem;
    line-height: 1.6;
}

.welcome-cta-btn {
    display: inline-flex;
    align-items: center;
    background: rgba(255,255,255,.18);
    border: 1px solid rgba(255,255,255,.35);
    color: white;
    padding: .5rem 1.25rem;
    border-radius: 40px;
    font-size: .82rem;
    font-weight: 600;
    text-decoration: none;
    margin-bottom: 1.4rem;
    transition: all .25s;
    backdrop-filter: blur(8px);
}
.welcome-cta-btn:hover {
    background: rgba(255,255,255,.28);
    color: white;
    transform: translateY(-1px);
}

.welcome-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}
.welcome-meta-item {
    display: flex;
    align-items: center;
    gap: .45rem;
    color: rgba(255,255,255,.82);
    font-size: .78rem;
    font-weight: 500;
}
.welcome-meta-item i { color: #fbbf24; font-size: .85rem; }
.welcome-meta-item strong { color: white; }
.welcome-meta-divider {
    width: 1px; height: 18px;
    background: rgba(255,255,255,.3);
}

/* SVG Illustration */
.welcome-illustration-wrap { flex-shrink: 0; }
.welcome-svg { width: 220px; height: 180px; filter: drop-shadow(0 8px 24px rgba(0,0,0,.25)); }
.bar-anim { animation: barGrow .8s ease-out both; transform-origin: bottom; }
.bar1 { animation-delay: .1s; }
.bar2 { animation-delay: .2s; }
.bar3 { animation-delay: .3s; }
.bar4 { animation-delay: .4s; }
.bar5 { animation-delay: .5s; }
@keyframes barGrow { from { transform: scaleY(0); } to { transform: scaleY(1); } }
.line-anim { stroke-dasharray: 200; stroke-dashoffset: 200; animation: drawLine 1.2s ease-out .6s forwards; }
@keyframes drawLine { to { stroke-dashoffset: 0; } }
.float-anim { animation: floatBubble 3s ease-in-out infinite; }
@keyframes floatBubble { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-5px)} }
.donut-anim { animation: rotateDonut 2s linear infinite; transform-origin: center; transform-box: fill-box; }
@keyframes rotateDonut { from{stroke-dashoffset:25} to{stroke-dashoffset:-88} }

/* =============================================
   STAT CARDS
   ============================================= */
.stat-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    overflow: hidden;
    transition: all .3s ease;
}
.stat-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-3px);
}

.stat-card-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 1.25rem 1.25rem .5rem;
}

.stat-icon-wrap {
    width: 52px; height: 52px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem;
}
.stat-blue   { background: rgba(59,130,246,.12); color: var(--blue); }
.stat-green  { background: rgba(16,185,129,.12); color: var(--green); }
.stat-purple { background: rgba(139,92,246,.12); color: var(--purple); }
.stat-orange { background: rgba(245,158,11,.12); color: var(--orange); }

.stat-badge {
    display: inline-flex;
    align-items: center;
    gap: .25rem;
    padding: .25rem .6rem;
    border-radius: 20px;
    font-size: .72rem;
    font-weight: 600;
}
.stat-badge-up    { background: rgba(16,185,129,.12); color: var(--green); }
.stat-badge-cal   { background: rgba(59,130,246,.12); color: var(--blue); }
.stat-badge-check { background: rgba(139,92,246,.12); color: var(--purple); }
.stat-badge-smile { background: rgba(245,158,11,.12); color: var(--orange); }

.stat-card-body { padding: .25rem 1.25rem .75rem; }

.stat-value-large {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--dark);
    letter-spacing: -.03em;
    line-height: 1;
}
.stat-label-text {
    font-size: .68rem;
    font-weight: 700;
    color: var(--muted);
    letter-spacing: .08em;
    margin-top: .25rem;
}

.stat-sparkline-wrap { margin-top: .75rem; }
.sparkline-svg { width: 100%; height: 35px; }

.stat-card-footer {
    border-top: 1px solid var(--border);
    padding: .75rem 1.25rem;
}
.stat-footer-link {
    font-size: .75rem;
    font-weight: 600;
    color: var(--blue);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: .35rem;
    transition: gap .2s;
}
.stat-footer-link:hover { gap: .6rem; color: var(--blue); }

/* =============================================
   DASHBOARD CARD SHARED
   ============================================= */
.dashboard-card {
    background: var(--white);
    border-radius: var(--radius);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    transition: box-shadow .3s;
}
.dashboard-card:hover { box-shadow: var(--shadow); }

.card-header-custom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border);
    gap: .75rem;
}
.card-header-left {
    display: flex;
    align-items: center;
    gap: .9rem;
}

.card-icon-wrap {
    width: 42px; height: 42px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.05rem;
    flex-shrink: 0;
}
.icon-blue   { background: rgba(59,130,246,.12); color: var(--blue); }
.icon-green  { background: rgba(16,185,129,.12); color: var(--green); }
.icon-yellow { background: rgba(245,158,11,.12); color: var(--orange); }
.icon-cyan   { background: rgba(6,182,212,.12);  color: var(--cyan); }
.icon-teal   { background: rgba(20,184,166,.12); color: var(--teal); }
.icon-red    { background: rgba(239,68,68,.12);  color: var(--red); }
.icon-purple { background: rgba(139,92,246,.12); color: var(--purple); }

.card-title-main {
    font-size: .95rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}
.card-subtitle-main {
    font-size: .75rem;
    color: var(--muted);
    margin: .15rem 0 0;
}

.card-body-custom { padding: 1.25rem 1.5rem; }

/* =============================================
   PERIOD SELECT BUTTON
   ============================================= */
.period-select-btn {
    display: inline-flex;
    align-items: center;
    gap: .35rem;
    background: var(--bg);
    border: 1px solid var(--border);
    padding: .4rem 1rem;
    border-radius: 10px;
    font-size: .75rem;
    font-weight: 600;
    color: var(--muted);
    transition: all .2s;
    cursor: pointer;
}
.period-select-btn:hover { border-color: var(--blue); color: var(--blue); }
.dropdown-item.active, .dropdown-item:active { background: var(--blue); }

/* =============================================
   CHART AREAS
   ============================================= */
.chart-area { position: relative; height: 260px; }

.donut-wrap {
    position: relative;
    width: 170px; height: 170px;
    margin: 0 auto 1rem;
}
.donut-wrap canvas { width: 100% !important; height: 100% !important; }
.donut-center {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    pointer-events: none;
}
.donut-pct  { font-size: 1.7rem; font-weight: 800; color: var(--dark); }
.donut-lbl  { font-size: .72rem; color: var(--muted); font-weight: 600; }

.satisfaction-legend { display: flex; flex-direction: column; gap: .6rem; }
.sat-row {
    display: flex;
    align-items: center;
    gap: .6rem;
}
.sat-dot {
    width: 10px; height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
}
.sat-name { flex: 1; font-size: .78rem; color: var(--dark2); font-weight: 500; }
.sat-pct  { font-size: .78rem; font-weight: 700; color: var(--dark); }

/* =============================================
   RANKING LIST
   ============================================= */
.ranking-list { padding: 0; }

.rank-item {
    display: flex;
    align-items: center;
    gap: .85rem;
    padding: .9rem 1.25rem;
    border-bottom: 1px solid var(--border);
    transition: background .2s;
}
.rank-item:last-child { border-bottom: 0; }
.rank-item:hover { background: var(--bg); }
.rank-item-top { background: linear-gradient(135deg,rgba(245,158,11,.05),rgba(251,191,36,.02)); }

.rank-num-wrap {
    width: 30px; height: 30px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .75rem;
    font-weight: 700;
    flex-shrink: 0;
}
.rank-gold   { background: linear-gradient(135deg,#f59e0b,#fbbf24); color: white; }
.rank-silver { background: #cbd5e1; color: #64748b; }
.rank-bronze { background: linear-gradient(135deg,#d97706,#b45309); color: white; }
.rank-4      { background: var(--bg); color: var(--muted); }
.rank-5      { background: var(--bg); color: var(--muted); }

.rank-avatar {
    width: 38px; height: 38px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .75rem;
    font-weight: 700;
    color: white;
    flex-shrink: 0;
}
.av-blue   { background: linear-gradient(135deg,#3b82f6,#1d4ed8); }
.av-teal   { background: linear-gradient(135deg,#14b8a6,#0f766e); }
.av-purple { background: linear-gradient(135deg,#8b5cf6,#6d28d9); }
.av-orange { background: linear-gradient(135deg,#f59e0b,#d97706); }
.av-dark   { background: linear-gradient(135deg,#475569,#334155); }

.rank-info { flex: 1; min-width: 0; }
.rank-name {
    font-size: .82rem;
    font-weight: 700;
    color: var(--dark);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.rank-pos { font-size: .72rem; color: var(--muted); margin-top: .1rem; }

.rank-visits { text-align: right; }
.rank-count { font-size: 1.1rem; font-weight: 800; color: var(--blue); }
.rank-count-lbl { font-size: .65rem; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: .05em; }

.top5-badge {
    display: inline-flex;
    padding: .25rem .75rem;
    background: rgba(245,158,11,.12);
    color: var(--orange);
    border-radius: 20px;
    font-size: .7rem;
    font-weight: 700;
    border: 1px solid rgba(245,158,11,.25);
}

/* =============================================
   LOCATIONS TABLE
   ============================================= */
.locations-table {
    width: 100%;
    border-collapse: collapse;
}
.locations-table thead tr {
    background: var(--bg);
}
.locations-table thead th {
    padding: .75rem 1.25rem;
    font-size: .68rem;
    font-weight: 700;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .08em;
    text-align: left;
    border-bottom: 1px solid var(--border);
}
.locations-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background .2s;
}
.locations-table tbody tr:last-child { border-bottom: 0; }
.locations-table tbody tr:hover { background: var(--bg); }
.locations-table tbody td {
    padding: .85rem 1.25rem;
    font-size: .82rem;
    vertical-align: middle;
}

.flag-icon { font-size: 1.1rem; margin-right: .5rem; }
.country-nm { font-weight: 600; color: var(--dark); }
.sales-num  { font-weight: 700; color: var(--dark2); }

.loc-progress-wrap {
    display: flex;
    align-items: center;
    gap: .6rem;
}
.loc-progress-bar {
    flex: 1;
    height: 6px;
    background: var(--blue);
    border-radius: 10px;
    max-width: 120px;
}
.loc-pct { font-size: .72rem; font-weight: 700; color: var(--muted); white-space: nowrap; }

/* =============================================
   QUICK ACTIONS GRID
   ============================================= */
.quick-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.quick-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: .6rem;
    padding: 1.25rem .75rem;
    border-radius: 16px;
    text-decoration: none;
    font-size: .78rem;
    font-weight: 700;
    color: var(--dark2);
    border: 1px solid var(--border);
    background: var(--bg);
    transition: all .25s;
}
.quick-btn:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--dark2); }

.quick-btn-icon {
    width: 48px; height: 48px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.25rem;
}
.quick-btn-blue   .quick-btn-icon { background: rgba(59,130,246,.12); color: var(--blue); }
.quick-btn-green  .quick-btn-icon { background: rgba(16,185,129,.12); color: var(--green); }
.quick-btn-purple .quick-btn-icon { background: rgba(139,92,246,.12); color: var(--purple); }
.quick-btn-orange .quick-btn-icon { background: rgba(245,158,11,.12); color: var(--orange); }

.quick-btn-blue:hover   { border-color: var(--blue); }
.quick-btn-green:hover  { border-color: var(--green); }
.quick-btn-purple:hover { border-color: var(--purple); }
.quick-btn-orange:hover { border-color: var(--orange); }

/* =============================================
   PERIHAL STATS
   ============================================= */
.perihal-list { display: flex; flex-direction: column; gap: 1rem; }

.perihal-row {
    display: flex;
    align-items: center;
    gap: .85rem;
}
.perihal-icon-wrap {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: .9rem;
    flex-shrink: 0;
}
.perihal-details { flex: 1; }
.perihal-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: .4rem;
}
.perihal-lbl { font-size: .8rem; font-weight: 600; color: var(--dark2); }
.perihal-cnt { font-size: .8rem; font-weight: 700; color: var(--dark); }
.perihal-track {
    height: 6px;
    background: var(--border);
    border-radius: 10px;
    overflow: hidden;
}
.perihal-fill {
    height: 100%;
    border-radius: 10px;
    transition: width 1s ease;
}

/* =============================================
   TAMU TABLE
   ============================================= */
.view-all-btn {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: linear-gradient(135deg, var(--blue), #1d4ed8);
    color: white;
    padding: .5rem 1.1rem;
    border-radius: 10px;
    font-size: .75rem;
    font-weight: 700;
    text-decoration: none;
    transition: all .25s;
}
.view-all-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(59,130,246,.4); color: white; }

.tamu-table {
    width: 100%;
    border-collapse: collapse;
}
.tamu-table thead tr { background: var(--bg); }
.tamu-table thead th {
    padding: .8rem 1rem;
    font-size: .68rem;
    font-weight: 700;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .07em;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}
.tamu-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background .15s;
}
.tamu-table tbody tr:last-child { border-bottom: 0; }
.tamu-table tbody tr:hover { background: rgba(59,130,246,.03); }
.tamu-table tbody td { padding: .9rem 1rem; font-size: .82rem; vertical-align: middle; }

.th-num    { width: 50px; text-align: center; }
.th-contact, .th-inst, .th-perihal { display: table-cell; }
.th-aksi   { width: 80px; text-align: center; }

.tbl-num-badge {
    width: 28px; height: 28px;
    border-radius: 8px;
    background: var(--bg);
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: .72rem;
    font-weight: 700;
    color: var(--muted);
    margin: 0 auto;
}

.tbl-visitor-cell { display: flex; align-items: center; gap: .7rem; }

.tbl-avatar {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem;
    font-weight: 700;
    color: white;
    flex-shrink: 0;
}
.av-blue   { background: linear-gradient(135deg,#3b82f6,#2563eb); }
.av-green  { background: linear-gradient(135deg,#10b981,#059669); }
.av-purple { background: linear-gradient(135deg,#8b5cf6,#7c3aed); }
.av-orange { background: linear-gradient(135deg,#f59e0b,#d97706); }
.av-dark   { background: linear-gradient(135deg,#475569,#334155); }

.tbl-name { font-weight: 700; font-size: .82rem; color: var(--dark); }
.tbl-id   { font-size: .7rem; color: var(--muted); margin-top: .1rem; }

.tbl-contact-chip {
    display: inline-flex;
    align-items: center;
    gap: .35rem;
    background: rgba(59,130,246,.08);
    color: var(--blue);
    padding: .25rem .65rem;
    border-radius: 20px;
    font-size: .72rem;
    font-weight: 600;
    white-space: nowrap;
}

.tbl-inst-text { font-size: .78rem; color: var(--dark2); }

.tbl-meet-badge {
    display: inline-block;
    background: rgba(59,130,246,.1);
    color: var(--blue);
    padding: .25rem .65rem;
    border-radius: 8px;
    font-size: .72rem;
    font-weight: 600;
    white-space: nowrap;
}

.tbl-purpose { font-size: .78rem; color: var(--muted); }

.tbl-date { font-size: .78rem; font-weight: 700; color: var(--dark2); }
.tbl-hour { font-size: .68rem; color: var(--muted); margin-top: .1rem; }

.tbl-actions { display: flex; gap: .4rem; justify-content: center; }
.tbl-btn {
    width: 30px; height: 30px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: .75rem;
    text-decoration: none;
    background: var(--bg);
    color: var(--muted);
    border: 1px solid var(--border);
    transition: all .2s;
}
.tbl-btn-view:hover { background: var(--blue); color: white; border-color: var(--blue); }
.tbl-btn-edit:hover { background: var(--orange); color: white; border-color: var(--orange); }

/* Empty State */
.empty-state { padding: 3rem; text-align: center; }
.empty-icon-wrap {
    width: 70px; height: 70px;
    margin: 0 auto 1rem;
    background: var(--bg);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.8rem;
    color: var(--light);
}
.empty-title { font-size: .95rem; font-weight: 700; color: var(--dark); margin-bottom: .4rem; }
.empty-desc  { font-size: .82rem; color: var(--muted); margin-bottom: 1.25rem; }
.empty-cta {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: linear-gradient(135deg,var(--blue),#1d4ed8);
    color: white;
    padding: .55rem 1.25rem;
    border-radius: 10px;
    font-size: .82rem;
    font-weight: 700;
    text-decoration: none;
    transition: all .25s;
}
.empty-cta:hover { transform: translateY(-2px); box-shadow: 0 4px 14px rgba(59,130,246,.4); color: white; }

/* =============================================
   RESPONSIVE
   ============================================= */
@media (max-width: 1200px) {
    .th-contact, .th-inst, .th-perihal { display: none; }
}
@media (max-width: 768px) {
    .welcome-card-content { flex-direction: column; }
    .welcome-svg { width: 160px; height: 130px; }
    .welcome-title { font-size: 1.4rem; }
    .quick-grid { grid-template-columns: 1fr 1fr; }
    .welcome-meta { flex-direction: column; gap: .5rem; }
    .welcome-meta-divider { display: none; }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

    /* ──────────────────────────────
       Bar Chart - Visitor Stats
    ────────────────────────────── */
    const vCtx = document.getElementById('visitorChart');
    if (vCtx) {
        new Chart(vCtx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Jumlah Tamu',
                    data: [12, 19, 15, 17, 14, 8, 10],
                    backgroundColor: function(ctx) {
                        const chart = ctx.chart;
                        const { ctx: c, chartArea } = chart;
                        if (!chartArea) return '#3b82f6';
                        const gradient = c.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                        gradient.addColorStop(0, '#3b82f6');
                        gradient.addColorStop(1, 'rgba(59,130,246,0.55)');
                        return gradient;
                    },
                    borderRadius: { topLeft: 8, topRight: 8 },
                    borderSkipped: false,
                    barThickness: 36,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleColor: '#94a3b8',
                        bodyColor: '#f8fafc',
                        padding: 12,
                        borderRadius: 12,
                        callbacks: {
                            label: ctx => ` ${ctx.parsed.y} Kunjungan`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9', drawBorder: false },
                        ticks: {
                            stepSize: 5,
                            color: '#94a3b8',
                            font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' }
                        },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: '#64748b',
                            font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' }
                        },
                        border: { display: false }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });
    }

    /* ──────────────────────────────
       Donut Chart - Satisfaction
    ────────────────────────────── */
    const sCtx = document.getElementById('satisfactionChart');
    if (sCtx) {
        new Chart(sCtx, {
            type: 'doughnut',
            data: {
                labels: ['Sangat Puas', 'Puas', 'Cukup', 'Kurang'],
                datasets: [{
                    data: [65, 25, 7, 3],
                    backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#ef4444'],
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: false,
                cutout: '72%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        padding: 10,
                        borderRadius: 10,
                        callbacks: {
                            label: ctx => ` ${ctx.label}: ${ctx.parsed}%`
                        }
                    }
                },
                animation: { animateRotate: true, duration: 1200 }
            }
        });
    }

    /* ──────────────────────────────
       Animate perihal progress bars
    ────────────────────────────── */
    setTimeout(() => {
        document.querySelectorAll('.perihal-fill').forEach(el => {
            const w = el.style.width;
            el.style.width = '0';
            requestAnimationFrame(() => { el.style.width = w; });
        });
    }, 400);
});
</script>
@endpush