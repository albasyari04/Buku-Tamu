@extends('layouts.app')

@section('title', 'Dashboard - BKPSDM Buku Tamu')

@section('content')


{{-- ================================================================
     HELLO BANNER CARD - Modern Welcome Section
     ================================================================ --}}
<div class="row g-4 mb-4" data-aos="fade-up" data-aos-delay="50">
    <div class="col-12">
        <div class="welcome-card">
            <div class="welcome-card-gradient"></div>
            <div class="welcome-card-content">
                <div class="welcome-text-section">
                    <div class="welcome-badge">
                        <i class="fas fa-user-shield"></i>
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
                        @auth<strong class="welcome-name">{{ Auth::user()->name }}</strong>@else<strong>Administrator</strong>@endauth
                        <span class="welcome-wave">👋</span>
                    </h1>
                    <p class="welcome-subtitle">
                        Kelola data kunjungan tamu BKPSDM OKU TIMUR dengan mudah dan efisien.
                        <span class="welcome-highlight">Semangat bekerja!</span>
                    </p>
                    <div class="welcome-stats">
                        <div class="welcome-stat-item">
                            <i class="fas fa-calendar-check"></i>
                            <span>Hari ini: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <div class="welcome-stat-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Total kunjungan bulan ini: {{ number_format($totalTamu) }} tamu</span>
                        </div>
                    </div>
                </div>
                <div class="welcome-illustration">
                    <div class="welcome-animation">
                        <div class="welcome-circle welcome-circle-1"></div>
                        <div class="welcome-circle welcome-circle-2"></div>
                        <div class="welcome-circle welcome-circle-3"></div>
                        <i class="fas fa-chart-simple welcome-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     STAT CARDS - Modern Professional Design
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-card stat-card-blue">
            <div class="stat-card-inner">
                <div class="stat-card-left">
                    <div class="stat-icon stat-icon-blue">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ number_format($totalTamu) }}</h3>
                        <p class="stat-label">Total Tamu</p>
                    </div>
                </div>
                <div class="stat-trend stat-trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>12%</span>
                </div>
            </div>
            <div class="stat-footer">
                <a href="{{ route('tamu.index') }}" class="stat-link">
                    Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                </a>
                <div class="stat-chart">
                    <svg viewBox="0 0 100 30" class="stat-sparkline">
                        <path d="M5,25 L20,20 L35,22 L50,12 L65,15 L80,8 L95,10" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card stat-card-green">
            <div class="stat-card-inner">
                <div class="stat-card-left">
                    <div class="stat-icon stat-icon-green">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ number_format($tamuHariIni) }}</h3>
                        <p class="stat-label">Tamu Hari Ini</p>
                    </div>
                </div>
                <div class="stat-trend stat-trend-up">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </div>
            <div class="stat-footer">
                <a href="{{ route('tamu.create') }}" class="stat-link">
                    Tambah Tamu <i class="fas fa-plus ms-1"></i>
                </a>
                <div class="stat-chart">
                    <svg viewBox="0 0 100 30" class="stat-sparkline">
                        <path d="M5,22 L20,18 L35,15 L50,10 L65,12 L80,8 L95,6" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="stat-card stat-card-purple">
            <div class="stat-card-inner">
                <div class="stat-card-left">
                    <div class="stat-icon stat-icon-purple">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ number_format($totalPegawai) }}</h3>
                        <p class="stat-label">Total Pegawai</p>
                    </div>
                </div>
                <div class="stat-trend stat-trend-neutral">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-footer">
                <a href="{{ route('pegawai.index') }}" class="stat-link">
                    Kelola Pegawai <i class="fas fa-arrow-right ms-1"></i>
                </a>
                <div class="stat-chart">
                    <svg viewBox="0 0 100 30" class="stat-sparkline">
                        <path d="M5,18 L20,16 L35,14 L50,12 L65,10 L80,8 L95,6" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="stat-card stat-card-orange">
            <div class="stat-card-inner">
                <div class="stat-card-left">
                    <div class="stat-icon stat-icon-orange">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">94<span class="stat-percent">%</span></h3>
                        <p class="stat-label">Kepuasan Tamu</p>
                    </div>
                </div>
                <div class="stat-trend stat-trend-up">
                    <i class="fas fa-smile"></i>
                </div>
            </div>
            <div class="stat-footer">
                <a href="#" class="stat-link">
                    Lihat Rating <i class="fas fa-arrow-right ms-1"></i>
                </a>
                <div class="stat-chart">
                    <svg viewBox="0 0 100 30" class="stat-sparkline">
                        <path d="M5,20 L20,18 L35,16 L50,12 L65,10 L80,6 L95,4" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     MAIN CHARTS SECTION - Global Sales Style
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-8" data-aos="fade-right">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-header-icon icon-primary">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Statistik Kunjungan</h5>
                        <p class="card-subtitle">Grafik kunjungan tamu 7 hari terakhir</p>
                    </div>
                </div>
                <div class="card-header-right">
                    <div class="dropdown">
                        <button class="period-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-calendar-week me-1"></i> Minggu Ini
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item active" href="#">Minggu Ini</a></li>
                            <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                            <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="chart-container">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4" data-aos="fade-left">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-header-icon icon-success">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Tingkat Kepuasan</h5>
                        <p class="card-subtitle">Feedback dari tamu</p>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="donut-chart-wrapper">
                    <canvas id="satisfactionChart" width="200" height="200"></canvas>
                    <div class="donut-center-text">
                        <div class="donut-percentage">94%</div>
                        <div class="donut-label">Kepuasan</div>
                    </div>
                </div>
                <div class="satisfaction-stats">
                    <div class="sat-stat">
                        <span class="sat-dot sat-dot-success"></span>
                        <span class="sat-label">Sangat Puas</span>
                        <span class="sat-value">65%</span>
                    </div>
                    <div class="sat-stat">
                        <span class="sat-dot sat-dot-primary"></span>
                        <span class="sat-label">Puas</span>
                        <span class="sat-value">25%</span>
                    </div>
                    <div class="sat-stat">
                        <span class="sat-dot sat-dot-warning"></span>
                        <span class="sat-label">Cukup</span>
                        <span class="sat-value">7%</span>
                    </div>
                    <div class="sat-stat">
                        <span class="sat-dot sat-dot-danger"></span>
                        <span class="sat-label">Kurang</span>
                        <span class="sat-value">3%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     GLOBAL SALES TABLE & TOP LOCATIONS STYLE
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-5" data-aos="fade-right">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-header-icon icon-warning">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Pegawai Terpopuler</h5>
                        <p class="card-subtitle">Paling banyak dikunjungi bulan ini</p>
                    </div>
                </div>
                <span class="top-badge">TOP 5</span>
            </div>
            <div class="card-body-custom p-0">
                <div class="ranking-list">
                    <div class="ranking-item ranking-1">
                        <div class="ranking-number">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="ranking-avatar avatar-primary">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="ranking-info">
                            <div class="ranking-name">Dr. Ahmad Fauzi, M.Si.</div>
                            <div class="ranking-position">Kepala Badan</div>
                        </div>
                        <div class="ranking-stats">
                            <div class="ranking-count">42</div>
                            <div class="ranking-label">kunjungan</div>
                        </div>
                    </div>
                    <div class="ranking-item">
                        <div class="ranking-number">2</div>
                        <div class="ranking-avatar avatar-secondary">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="ranking-info">
                            <div class="ranking-name">Drs. Budi Santoso</div>
                            <div class="ranking-position">Sekretaris</div>
                        </div>
                        <div class="ranking-stats">
                            <div class="ranking-count">38</div>
                            <div class="ranking-label">kunjungan</div>
                        </div>
                    </div>
                    <div class="ranking-item">
                        <div class="ranking-number">3</div>
                        <div class="ranking-avatar avatar-purple">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="ranking-info">
                            <div class="ranking-name">Siti Rahayu, S.Sos.</div>
                            <div class="ranking-position">Bidang Mutasi</div>
                        </div>
                        <div class="ranking-stats">
                            <div class="ranking-count">35</div>
                            <div class="ranking-label">kunjungan</div>
                        </div>
                    </div>
                    <div class="ranking-item">
                        <div class="ranking-number">4</div>
                        <div class="ranking-avatar avatar-warning">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="ranking-info">
                            <div class="ranking-name">Rina Andriani, S.Kom.</div>
                            <div class="ranking-position">Bidang Pengadaan</div>
                        </div>
                        <div class="ranking-stats">
                            <div class="ranking-count">29</div>
                            <div class="ranking-label">kunjungan</div>
                        </div>
                    </div>
                    <div class="ranking-item">
                        <div class="ranking-number">5</div>
                        <div class="ranking-avatar avatar-dark">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="ranking-info">
                            <div class="ranking-name">Joko Prasetyo, M.M.</div>
                            <div class="ranking-position">Bidang Kompetensi</div>
                        </div>
                        <div class="ranking-stats">
                            <div class="ranking-count">24</div>
                            <div class="ranking-label">kunjungan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-7" data-aos="fade-left">
        <div class="row g-4 h-100">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <div class="card-header-left">
                            <div class="card-header-icon icon-info">
                                <i class="fas fa-globe-asia"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Global Sales by Top Locations</h5>
                                <p class="card-subtitle">Penjualan global berdasarkan lokasi teratas</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom p-0">
                        <div class="global-sales-table">
                            <table class="sales-table">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Sales</th>
                                        <th>Average</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="country-cell">
                                                <span class="country-flag de"></span>
                                                <span class="country-name">Germany</span>
                                            </div>
                                        </td>
                                        <td class="sales-value">3,562</td>
                                        <td class="average-value">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 56.23%"></div>
                                            </div>
                                            <span class="average-percent">56.23%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="country-cell">
                                                <span class="country-flag us"></span>
                                                <span class="country-name">USA</span>
                                            </div>
                                        </td>
                                        <td class="sales-value">2,650</td>
                                        <td class="average-value">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 25.23%"></div>
                                            </div>
                                            <span class="average-percent">25.23%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="country-cell">
                                                <span class="country-flag au"></span>
                                                <span class="country-name">Australia</span>
                                            </div>
                                        </td>
                                        <td class="sales-value">956</td>
                                        <td class="average-value">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 12.45%"></div>
                                            </div>
                                            <span class="average-percent">12.45%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="country-cell">
                                                <span class="country-flag uk"></span>
                                                <span class="country-name">United Kingdom</span>
                                            </div>
                                        </td>
                                        <td class="sales-value">689</td>
                                        <td class="average-value">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 8.65%"></div>
                                            </div>
                                            <span class="average-percent">8.65%</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     QUICK ACTIONS & PERIHAL STATS
     ================================================================ --}}
<div class="row g-4 mb-4">
    <div class="col-xl-4" data-aos="fade-up">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-header-icon icon-danger">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Aksi Cepat</h5>
                        <p class="card-subtitle">Akses cepat menu utama</p>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="quick-actions-grid">
                    <a href="{{ route('tamu.create') }}" class="quick-action-card action-primary">
                        <div class="action-icon"><i class="fas fa-user-plus"></i></div>
                        <span class="action-label">Tambah Tamu</span>
                    </a>
                    <a href="{{ route('tamu.index') }}" class="quick-action-card action-success">
                        <div class="action-icon"><i class="fas fa-list-ul"></i></div>
                        <span class="action-label">Data Tamu</span>
                    </a>
                    <a href="{{ route('pegawai.index') }}" class="quick-action-card action-purple">
                        <div class="action-icon"><i class="fas fa-address-card"></i></div>
                        <span class="action-label">Data Pegawai</span>
                    </a>
                    <a href="{{ route('dashboard.export.pdf') }}" class="quick-action-card action-warning">
                        <div class="action-icon"><i class="fas fa-file-alt"></i></div>
                        <span class="action-label">Laporan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8" data-aos="fade-up" data-aos-delay="100">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="card-header-left">
                    <div class="card-header-icon icon-cyan">
                        <i class="fas fa-chart-simple"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Statistik Perihal</h5>
                        <p class="card-subtitle">Top 5 keperluan kunjungan</p>
                    </div>
                </div>
            </div>
            <div class="card-body-custom">
                <div class="perihal-stats">
                    <div class="perihal-item">
                        <div class="perihal-icon perihal-primary">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div class="perihal-content">
                            <div class="perihal-header">
                                <span class="perihal-name">Kenaikan Pangkat</span>
                                <span class="perihal-count">45</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill-primary" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="perihal-item">
                        <div class="perihal-icon perihal-success">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <div class="perihal-content">
                            <div class="perihal-header">
                                <span class="perihal-name">Gaji Berkala</span>
                                <span class="perihal-count">38</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill-success" style="width: 63%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="perihal-item">
                        <div class="perihal-icon perihal-info">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="perihal-content">
                            <div class="perihal-header">
                                <span class="perihal-name">Mutasi Pegawai</span>
                                <span class="perihal-count">32</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill-info" style="width: 53%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="perihal-item">
                        <div class="perihal-icon perihal-warning">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="perihal-content">
                            <div class="perihal-header">
                                <span class="perihal-name">Konsultasi</span>
                                <span class="perihal-count">28</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill-warning" style="width: 47%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="perihal-item">
                        <div class="perihal-icon perihal-danger">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="perihal-content">
                            <div class="perihal-header">
                                <span class="perihal-name">Diklat ASN</span>
                                <span class="perihal-count">22</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill-danger" style="width: 37%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     RECENT VISITORS TABLE - Enhanced
     ================================================================ --}}
<div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
    <div class="card-header-custom">
        <div class="card-header-left">
            <div class="card-header-icon icon-primary">
                <i class="fas fa-clock-rotate-left"></i>
            </div>
            <div>
                <h5 class="card-title">Tamu Terbaru</h5>
                <p class="card-subtitle">5 kunjungan terakhir</p>
            </div>
        </div>
        <a href="{{ route('tamu.index') }}" class="view-all-link">
            Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="card-body-custom p-0">
        <div class="table-responsive">
            <table class="visitors-table">
                <thead>
                    <tr>
                        <th class="col-number">#</th>
                        <th>Nama Tamu</th>
                        <th class="col-contact">Kontak</th>
                        <th class="col-institution">Instansi</th>
                        <th>Bertemu</th>
                        <th class="col-purpose">Perihal</th>
                        <th>Waktu</th>
                        <th class="col-actions">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tamuTerbaru as $index => $tamu)
                    <tr>
                        <td class="col-number">
                            <div class="table-number">{{ $index + 1 }}</div>
                        </td>
                        <td>
                            <div class="visitor-cell">
                                <div class="visitor-avatar avatar-{{ ['primary', 'success', 'purple', 'warning', 'dark'][$index % 5] }}">
                                    {{ strtoupper(substr($tamu->nama, 0, 1)) }}
                                </div>
                                <div class="visitor-info">
                                    <div class="visitor-name">{{ $tamu->nama }}</div>
                                    <div class="visitor-id">{{ $tamu->nip_nik ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="col-contact">
                            @if($tamu->no_hp)
                            <span class="contact-badge">
                                <i class="fas fa-phone-alt"></i> {{ $tamu->no_hp }}
                            </span>
                            @else
                            <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="col-institution">
                            <span class="institution-text">{{ Str::limit($tamu->instansi ?? '—', 30) }}</span>
                        </td>
                        <td>
                            <span class="meet-badge">{{ $tamu->bertemu_dengan }}</span>
                        </td>
                        <td class="col-purpose">
                            <span class="purpose-text">{{ Str::limit($tamu->perihal ?? '—', 40) }}</span>
                        </td>
                        <td>
                            <div class="visit-time">
                                <div class="visit-date">{{ $tamu->tanggal_kunjungan->format('d/m/Y') }}</div>
                                <div class="visit-hour">{{ $tamu->tanggal_kunjungan->format('H:i') }}</div>
                            </div>
                        </td>
                        <td class="col-actions">
                            <div class="action-buttons">
                                <a href="{{ route('tamu.show', $tamu->id) }}" class="action-btn action-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('tamu.edit', $tamu->id) }}" class="action-btn action-edit" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-inbox"></i>
                                </div>
                                <h6 class="empty-title">Belum Ada Data Tamu</h6>
                                <p class="empty-text">Data kunjungan tamu akan muncul di sini</p>
                                <a href="{{ route('tamu.create') }}" class="empty-button">
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
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
:root {
    --primary: #1a56db;
    --primary-dark: #1342b2;
    --success: #059669;
    --success-dark: #047857;
    --purple: #7c3aed;
    --purple-dark: #5b21b6;
    --warning: #d97706;
    --warning-dark: #b45309;
    --danger: #dc2626;
    --info: #0891b2;
    --dark: #1e293b;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
}

/* Welcome Card - Modern Design */
.welcome-card {
    background: linear-gradient(135deg, #1a56db 0%, #7c3aed 100%);
    border-radius: 24px;
    overflow: hidden;
    position: relative;
    box-shadow: var(--shadow-xl);
}

.welcome-card-gradient {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.15) 0%, transparent 70%);
    pointer-events: none;
}

.welcome-card-content {
    position: relative;
    padding: 2rem 2.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.welcome-text-section {
    flex: 1;
    min-width: 280px;
}

.welcome-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 0.4rem 1rem;
    border-radius: 40px;
    color: white;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-bottom: 1rem;
}

.welcome-badge i {
    font-size: 0.8rem;
}

.welcome-title {
    font-size: 2rem;
    font-weight: 800;
    color: white;
    margin-bottom: 0.75rem;
    letter-spacing: -0.02em;
}

.welcome-name {
    background: linear-gradient(135deg, #fff, #fbbf24);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
}

.welcome-wave {
    display: inline-block;
    animation: wave 1s ease-in-out infinite;
    margin-left: 0.5rem;
}

@keyframes wave {
    0%, 100% { transform: rotate(0deg); }
    50% { transform: rotate(15deg); }
}

.welcome-subtitle {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.9);
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.welcome-highlight {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    padding: 0.2rem 0.6rem;
    border-radius: 20px;
    font-weight: 500;
}

.welcome-stats {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.welcome-stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255,255,255,0.85);
    font-size: 0.8rem;
    font-weight: 500;
}

.welcome-stat-item i {
    font-size: 0.9rem;
    color: #fbbf24;
}

.welcome-illustration {
    flex-shrink: 0;
}

.welcome-animation {
    position: relative;
    width: 120px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.welcome-circle {
    position: absolute;
    border-radius: 50%;
    animation: pulse 2s ease-in-out infinite;
}

.welcome-circle-1 {
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.1);
    animation-delay: 0s;
}

.welcome-circle-2 {
    width: 80px;
    height: 80px;
    background: rgba(255,255,255,0.15);
    animation-delay: 0.4s;
}

.welcome-circle-3 {
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.2);
    animation-delay: 0.8s;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(0.9);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.1);
        opacity: 1;
    }
}

.welcome-icon {
    position: relative;
    z-index: 1;
    font-size: 2.5rem;
    color: #fbbf24;
    animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-8px);
    }
}

/* Dashboard Header */
.dash-header {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    border-radius: 20px;
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    box-shadow: var(--shadow-md);
    position: relative;
    overflow: hidden;
}

.dash-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    border-radius: 50%;
}

.dash-header-right {
    display: flex;
    gap: 0.75rem;
    position: relative;
    z-index: 1;
}

.dash-date-chip {
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1rem;
    border-radius: 12px;
    color: white;
    font-size: 0.875rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.dash-export-btn {
    background: white;
    color: var(--primary);
    border: none;
    padding: 0.5rem 1.25rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.dash-export-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Stat Cards */
.stat-card {
    background: white;
    border-radius: 20px;
    padding: 1.25rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
}

.stat-card-blue::before { background: linear-gradient(90deg, var(--primary), var(--info)); }
.stat-card-green::before { background: linear-gradient(90deg, var(--success), #34d399); }
.stat-card-purple::before { background: linear-gradient(90deg, var(--purple), #a78bfa); }
.stat-card-orange::before { background: linear-gradient(90deg, var(--warning), #fbbf24); }

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.stat-card-inner {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.stat-card-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-icon-blue { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
.stat-icon-green { background: linear-gradient(135deg, var(--success), var(--success-dark)); color: white; }
.stat-icon-purple { background: linear-gradient(135deg, var(--purple), var(--purple-dark)); color: white; }
.stat-icon-orange { background: linear-gradient(135deg, var(--warning), var(--warning-dark)); color: white; }

.stat-value {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 0.25rem;
}

.stat-percent {
    font-size: 1rem;
    font-weight: 600;
}

.stat-label {
    font-size: 0.75rem;
    color: var(--gray-500);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-trend {
    padding: 0.25rem 0.5rem;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 600;
}

.stat-trend-up {
    background: #d1fae5;
    color: var(--success);
}

.stat-trend-neutral {
    background: #e0e7ff;
    color: var(--primary);
}

.stat-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-100);
}

.stat-link {
    color: var(--gray-500);
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.stat-link:hover {
    color: var(--primary);
}

.stat-chart {
    width: 100px;
    height: 30px;
}

.stat-sparkline {
    width: 100%;
    height: 100%;
}

/* Dashboard Cards */
.dashboard-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.dashboard-card:hover {
    box-shadow: var(--shadow-xl);
}

.card-header-custom {
    padding: 1.25rem 1.5rem;
    background: var(--gray-50);
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.card-header-left {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-header-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.icon-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
.icon-success { background: linear-gradient(135deg, var(--success), var(--success-dark)); color: white; }
.icon-warning { background: linear-gradient(135deg, var(--warning), var(--warning-dark)); color: white; }
.icon-info { background: linear-gradient(135deg, var(--info), #06b6d4); color: white; }
.icon-danger { background: linear-gradient(135deg, var(--danger), #ef4444); color: white; }
.icon-cyan { background: linear-gradient(135deg, #06b6d4, #0891b2); color: white; }

.card-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.25rem;
}

.card-subtitle {
    font-size: 0.75rem;
    color: var(--gray-500);
}

.card-body-custom {
    padding: 1.5rem;
}

/* Chart Container */
.chart-container {
    height: 320px;
    position: relative;
}

/* Donut Chart */
.donut-chart-wrapper {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto 1.5rem;
}

.donut-center-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.donut-percentage {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--dark);
}

.donut-label {
    font-size: 0.7rem;
    color: var(--gray-500);
    font-weight: 500;
}

/* Satisfaction Stats */
.satisfaction-stats {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.sat-stat {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0.75rem;
    background: var(--gray-50);
    border-radius: 10px;
    transition: all 0.3s ease;
}

.sat-stat:hover {
    background: var(--gray-100);
}

.sat-dot {
    width: 10px;
    height: 10px;
    border-radius: 3px;
}

.sat-dot-success { background: #10b981; }
.sat-dot-primary { background: var(--primary); }
.sat-dot-warning { background: var(--warning); }
.sat-dot-danger { background: var(--danger); }

.sat-label {
    flex: 1;
    font-size: 0.875rem;
    color: var(--gray-600);
    font-weight: 500;
}

.sat-value {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--dark);
}

/* Global Sales Table */
.global-sales-table {
    overflow-x: auto;
}

.sales-table {
    width: 100%;
    border-collapse: collapse;
}

.sales-table thead th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--gray-500);
    background: var(--gray-50);
    border-bottom: 1px solid var(--gray-200);
}

.sales-table tbody td {
    padding: 0.875rem 1.25rem;
    border-bottom: 1px solid var(--gray-100);
    font-size: 0.875rem;
}

.country-cell {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.country-flag {
    width: 24px;
    height: 18px;
    border-radius: 2px;
    display: inline-block;
}

.country-flag.de { background: linear-gradient(135deg, #000, #ff0000); }
.country-flag.us { background: linear-gradient(135deg, #002868, #bf0a30); }
.country-flag.au { background: linear-gradient(135deg, #012169, #ffffff); }
.country-flag.uk { background: linear-gradient(135deg, #012169, #ffffff); }

.country-name {
    font-weight: 500;
    color: var(--gray-700);
}

.sales-value {
    font-weight: 700;
    color: var(--dark);
}

.average-value {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.progress-bar {
    flex: 1;
    height: 6px;
    background: var(--gray-200);
    border-radius: 3px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary), var(--info));
    border-radius: 3px;
}

.average-percent {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--gray-500);
    min-width: 50px;
}

/* Ranking List */
.ranking-list {
    padding: 0.5rem 0;
}

.ranking-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem 1.5rem;
    border-bottom: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}

.ranking-item:hover {
    background: var(--gray-50);
}

.ranking-number {
    width: 32px;
    height: 32px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    font-weight: 700;
    background: var(--gray-100);
    color: var(--gray-600);
}

.ranking-1 .ranking-number {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
}

.ranking-avatar {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
}

.avatar-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
.avatar-secondary { background: linear-gradient(135deg, var(--gray-400), var(--gray-500)); }
.avatar-purple { background: linear-gradient(135deg, var(--purple), var(--purple-dark)); }
.avatar-warning { background: linear-gradient(135deg, var(--warning), var(--warning-dark)); }
.avatar-dark { background: linear-gradient(135deg, var(--dark), #0f172a); }

.ranking-info {
    flex: 1;
}

.ranking-name {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.125rem;
}

.ranking-position {
    font-size: 0.7rem;
    color: var(--gray-500);
}

.ranking-stats {
    text-align: right;
}

.ranking-count {
    font-size: 1.125rem;
    font-weight: 800;
    color: var(--primary);
}

.ranking-label {
    font-size: 0.65rem;
    color: var(--gray-500);
    text-transform: uppercase;
}

.top-badge {
    background: linear-gradient(135deg, var(--warning), var(--warning-dark));
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 700;
}

/* Quick Actions Grid */
.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
}

.quick-action-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    padding: 1.25rem;
    background: var(--gray-50);
    border-radius: 14px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.quick-action-card:hover {
    transform: translateY(-4px);
    border-color: currentColor;
}

.action-primary:hover { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
.action-success:hover { background: linear-gradient(135deg, var(--success), var(--success-dark)); }
.action-purple:hover { background: linear-gradient(135deg, var(--purple), var(--purple-dark)); }
.action-warning:hover { background: linear-gradient(135deg, var(--warning), var(--warning-dark)); }

.action-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    background: white;
    transition: all 0.3s ease;
}

.action-primary .action-icon { color: var(--primary); }
.action-success .action-icon { color: var(--success); }
.action-purple .action-icon { color: var(--purple); }
.action-warning .action-icon { color: var(--warning); }

.quick-action-card:hover .action-icon {
    background: rgba(255,255,255,0.2);
    color: white;
}

.action-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--gray-600);
    text-align: center;
}

.quick-action-card:hover .action-label {
    color: white;
}

/* Perihal Stats */
.perihal-stats {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.perihal-item {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.perihal-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.perihal-primary { background: rgba(26,86,219,0.1); color: var(--primary); }
.perihal-success { background: rgba(5,150,105,0.1); color: var(--success); }
.perihal-info { background: rgba(8,145,178,0.1); color: var(--info); }
.perihal-warning { background: rgba(217,119,6,0.1); color: var(--warning); }
.perihal-danger { background: rgba(220,38,38,0.1); color: var(--danger); }

.perihal-content {
    flex: 1;
}

.perihal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.perihal-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-600);
}

.perihal-count {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--dark);
}

.progress-track {
    height: 6px;
    background: var(--gray-200);
    border-radius: 3px;
    overflow: hidden;
}

.progress-fill-primary { height: 100%; background: linear-gradient(90deg, var(--primary), var(--info)); border-radius: 3px; }
.progress-fill-success { height: 100%; background: linear-gradient(90deg, var(--success), #34d399); border-radius: 3px; }
.progress-fill-info { height: 100%; background: linear-gradient(90deg, var(--info), #06b6d4); border-radius: 3px; }
.progress-fill-warning { height: 100%; background: linear-gradient(90deg, var(--warning), #fbbf24); border-radius: 3px; }
.progress-fill-danger { height: 100%; background: linear-gradient(90deg, var(--danger), #ef4444); border-radius: 3px; }

/* Visitors Table */
.visitors-table {
    width: 100%;
    border-collapse: collapse;
}

.visitors-table thead th {
    padding: 0.875rem 1rem;
    background: var(--gray-50);
    border-bottom: 1px solid var(--gray-200);
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--gray-500);
    text-align: left;
}

.visitors-table tbody td {
    padding: 0.875rem 1rem;
    border-bottom: 1px solid var(--gray-100);
    vertical-align: middle;
    font-size: 0.875rem;
}

.col-number { width: 60px; }
.col-contact { width: 140px; }
.col-institution { width: 180px; }
.col-purpose { width: 200px; }
.col-actions { width: 100px; }

.table-number {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
}

.visitor-cell {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.visitor-avatar {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.875rem;
    font-weight: 700;
}

.visitor-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.125rem;
}

.visitor-id {
    font-size: 0.7rem;
    color: var(--gray-500);
}

.contact-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.25rem 0.625rem;
    background: var(--gray-100);
    border-radius: 6px;
    font-size: 0.75rem;
    color: var(--gray-600);
}

.meet-badge {
    display: inline-block;
    padding: 0.25rem 0.625rem;
    background: rgba(26,86,219,0.1);
    color: var(--primary);
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
}

.visit-time {
    text-align: left;
}

.visit-date {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--dark);
}

.visit-hour {
    font-size: 0.7rem;
    color: var(--gray-500);
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.action-btn {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    background: var(--gray-100);
    color: var(--gray-600);
}

.action-view:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.05);
}

.action-edit:hover {
    background: var(--warning);
    color: white;
    transform: scale(1.05);
}

.view-all-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.view-all-link:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.period-btn {
    background: white;
    border: 1px solid var(--gray-200);
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--gray-600);
    transition: all 0.3s ease;
}

.period-btn:hover {
    border-color: var(--primary);
    color: var(--primary);
}

/* Empty State */
.empty-state {
    padding: 3rem;
    text-align: center;
}

.empty-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1rem;
    background: var(--gray-100);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: var(--gray-400);
}

.empty-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.empty-text {
    font-size: 0.875rem;
    color: var(--gray-500);
    margin-bottom: 1.5rem;
}

.empty-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.empty-button:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Responsive */
@media (max-width: 1200px) {
    .welcome-title { font-size: 1.5rem; }
    .col-contact, .col-institution, .col-purpose { display: none; }
}

@media (max-width: 768px) {
    .welcome-card-content { padding: 1.5rem; flex-direction: column; text-align: center; }
    .welcome-stats { justify-content: center; }
    .dash-header { flex-direction: column; align-items: stretch; }
    .dash-header-right { justify-content: center; }
    .stat-card-inner { flex-direction: column; gap: 1rem; }
    .quick-actions-grid { grid-template-columns: repeat(2, 1fr); }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({ duration: 800, once: true });
    
    // Visitor Chart
    const vCtx = document.getElementById('visitorChart');
    if(vCtx) {
        new Chart(vCtx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Jumlah Tamu',
                    data: [12, 19, 15, 17, 14, 8, 10],
                    backgroundColor: 'rgba(26, 86, 219, 0.8)',
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { backgroundColor: '#1e293b', padding: 12, borderRadius: 10 }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#e2e8f0' }, ticks: { stepSize: 5 } },
                    x: { grid: { display: false } }
                }
            }
        });
    }
    
    // Satisfaction Chart
    const sCtx = document.getElementById('satisfactionChart');
    if(sCtx) {
        new Chart(sCtx, {
            type: 'doughnut',
            data: {
                labels: ['Sangat Puas', 'Puas', 'Cukup', 'Kurang'],
                datasets: [{
                    data: [65, 25, 7, 3],
                    backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });
    }
});
</script>
@endpush