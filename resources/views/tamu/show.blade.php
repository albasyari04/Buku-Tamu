@extends('layouts.app')

@section('content')
{{-- Detail Data Tamu — Professional Dashboard View --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* CSS VARIABLES */
:root {
    --pri:           #4F46E5;
    --pri-dark:      #4338CA;
    --pri-light:     #EEF2FF;
    --pri-mid:       #E0E7FF;
    --cyan:          #06B6D4;
    --cyan-light:    #ECFEFF;
    --success:       #10B981;
    --success-light: #D1FAE5;
    --warning:       #F59E0B;
    --warning-light: #FEF3C7;
    --danger:        #EF4444;
    --danger-light:  #FEE2E2;
    --purple:        #8B5CF6;
    --purple-light:  #F5F3FF;
    --surf:          #FFFFFF;
    --surf-2:        #F8FAFC;
    --surf-3:        #F1F5F9;
    --border:        #E2E8F0;
    --border-lt:     #F1F5F9;
    --txt:           #0F172A;
    --txt-2:         #475569;
    --txt-3:         #94A3B8;
    --r-sm:          8px;
    --r-md:          12px;
    --r-lg:          16px;
    --r-xl:          20px;
    --sh-sm:         0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
    --sh-md:         0 4px 16px rgba(0,0,0,.08);
    --sh-lg:         0 10px 40px rgba(0,0,0,.12);
}

/* BASE */
.pg * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
.pg { background: #F0F2F9; min-height: 100vh; }

/* HERO BANNER */
.hero-banner {
    background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 60%, #6D28D9 100%);
    padding: 28px 32px 80px;
    position: relative;
    overflow: hidden;
}
.hero-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.hero-banner::after {
    content: "";
    position: absolute;
    right: -80px;
    top: -80px;
    width: 360px;
    height: 360px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    pointer-events: none;
}
.hero-inner {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    z-index: 1;
}
.hero-bread {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: rgba(255,255,255,0.65);
    margin-bottom: 10px;
}
.hero-bread a { color: rgba(255,255,255,0.85); text-decoration: none; transition: color .2s; }
.hero-bread a:hover { color: #fff; }
.hero-bread .sep { font-size: 10px; }
.hero-title {
    font-size: 30px;
    font-weight: 800;
    color: #fff;
    margin: 0 0 8px;
    letter-spacing: -0.5px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.hero-title .ico-wrap {
    width: 44px;
    height: 44px;
    background: rgba(255,255,255,0.15);
    border-radius: var(--r-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    backdrop-filter: blur(4px);
}
.hero-sub {
    font-size: 14px;
    color: rgba(255,255,255,0.75);
    display: flex;
    align-items: center;
    gap: 8px;
}
.hero-right { display: flex; align-items: center; gap: 10px; padding-top: 4px; }
.btn-hero-back {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: rgba(255,255,255,0.15);
    color: #fff;
    padding: 11px 22px;
    border-radius: var(--r-md);
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border: 1px solid rgba(255,255,255,0.25);
    cursor: pointer;
    transition: all .25s ease;
    backdrop-filter: blur(4px);
}
.btn-hero-back:hover { background: rgba(255,255,255,0.22); transform: translateY(-2px); }
.btn-hero-edit {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: #fff;
    color: var(--pri);
    padding: 11px 22px;
    border-radius: var(--r-md);
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
    transition: all .25s ease;
    border: none;
    cursor: pointer;
}
.btn-hero-edit:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.2); }
.btn-hero-delete {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: rgba(239,68,68,0.15);
    color: #FEE2E2;
    padding: 11px 22px;
    border-radius: var(--r-md);
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border: 1px solid rgba(239,68,68,0.4);
    cursor: pointer;
    transition: all .25s ease;
    backdrop-filter: blur(4px);
}
.btn-hero-delete:hover { background: rgba(239,68,68,0.25); transform: translateY(-2px); }

/* CONTENT AREA */
.content-area {
    padding: 0 32px 40px;
    margin-top: -56px;
    position: relative;
    z-index: 2;
}

/* ALERT */
.alert-mod {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 14px 18px;
    border-radius: var(--r-md);
    margin-bottom: 20px;
    border: 1px solid transparent;
}
.alert-mod.ok  { background: #F0FDF4; border-color: #86EFAC; }
.alert-mod.err { background: #FEF2F2; border-color: #FECACA; }
.am-icon { font-size: 17px; margin-top: 1px; }
.alert-mod.ok .am-icon { color: var(--success); }
.alert-mod.err .am-icon { color: var(--danger);  }
.am-body { flex: 1; }
.am-title { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
.alert-mod.ok .am-title { color: #065F46; }
.alert-mod.err .am-title { color: #991B1B; }
.am-text  { font-size: 13px; color: var(--txt-2); margin: 0; }
.am-close { background: none; border: none; color: var(--txt-3); cursor: pointer; font-size: 14px; padding: 2px 4px; }
.am-close:hover { color: var(--txt); }

/* TWO COLUMN GRID */
.detail-grid {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 48px;
}
@media (max-width: 1024px) {
    .detail-grid { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
    .content-area { padding: 0 14px 28px; }
    .hero-banner { padding: 20px 18px 70px; }
}

/* MODERN CARD */
.modern-card {
    background: var(--surf);
    border-radius: var(--r-xl);
    border: 1px solid var(--border);
    box-shadow: var(--sh-sm);
    overflow: hidden;
    transition: transform .25s ease, box-shadow .25s ease;
}
.modern-card:hover { transform: translateY(-2px); box-shadow: var(--sh-md); }

.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 24px;
    border-bottom: 1px solid var(--border-lt);
    background: linear-gradient(to bottom, #FEFEFE, var(--surf));
}
.card-header h5 {
    font-size: 17px;
    font-weight: 800;
    color: var(--txt);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}
.card-header h5 i { color: var(--pri); font-size: 18px; }
.card-body { padding: 24px; }

/* INFO GRID */
.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}
@media (max-width: 640px) {
    .info-grid { grid-template-columns: 1fr; }
}

.info-item {
    position: relative;
    padding-bottom: 4px;
}
.info-item label {
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--txt-3);
    margin-bottom: 8px;
    display: block;
}
.info-value {
    font-size: 15px;
    font-weight: 600;
    color: var(--txt);
    word-break: break-word;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}
.info-value i { color: var(--pri); font-size: 14px; width: 20px; }
.info-value small { font-size: 12px; font-weight: 400; color: var(--txt-3); }
.full-width { grid-column: span 2; }
@media (max-width: 640px) {
    .full-width { grid-column: span 1; }
}

/* BADGES & PILLS */
.badge-modern {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
}
.badge-primary { background: linear-gradient(135deg, #EEF2FF, #E0E7FF); color: #4338CA; }
.badge-success { background: linear-gradient(135deg, #D1FAE5, #A7F3D0); color: #065F46; }
.badge-warning { background: linear-gradient(135deg, #FEF3C7, #FDE68A); color: #92400E; }
.badge-info    { background: linear-gradient(135deg, #ECFEFF, #CFFAFE); color: #0E7490; }
.badge-purple  { background: linear-gradient(135deg, #F5F3FF, #EDE9FE); color: #5B21B6; }

.pill-tujuan {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 40px;
    background: linear-gradient(135deg, var(--pri-light), var(--pri-mid));
    color: var(--pri);
    font-weight: 700;
    font-size: 14px;
}

/* PROFILE AVATAR SECTION */
.profile-avatar {
    text-align: center;
    margin-bottom: 24px;
    padding-bottom: 24px;
    border-bottom: 1px solid var(--border-lt);
}
.avatar-large {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--pri-light), var(--pri-mid));
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    font-weight: 700;
    color: var(--pri);
    margin-bottom: 16px;
    box-shadow: var(--sh-md);
}
.profile-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 30px;
    background: var(--success-light);
    color: #065F46;
    font-size: 11px;
    font-weight: 700;
    margin-top: 8px;
}

/* INFO LIST (SIDEBAR) */
.info-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.info-list-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-lt);
}
.info-list-item:last-child { border-bottom: none; }
.info-list-icon {
    width: 40px;
    height: 40px;
    background: var(--surf-2);
    border-radius: var(--r-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--pri);
    font-size: 16px;
    flex-shrink: 0;
}
.info-list-content { flex: 1; }
.info-list-label {
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--txt-3);
    margin-bottom: 4px;
}
.info-list-value {
    font-size: 14px;
    font-weight: 600;
    color: var(--txt);
    word-break: break-word;
}

/* QUICK ACTIONS BUTTONS */
.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.btn-modern {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px 20px;
    border-radius: var(--r-md);
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all .25s ease;
    cursor: pointer;
    border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.btn-modern-primary {
    background: linear-gradient(135deg, var(--pri), #6D28D9);
    color: #fff;
    box-shadow: 0 4px 12px rgba(79,70,229,0.35);
}
.btn-modern-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,0.45);
}
.btn-modern-warning {
    background: linear-gradient(135deg, #F59E0B, #D97706);
    color: #fff;
    box-shadow: 0 4px 12px rgba(245,158,11,0.3);
}
.btn-modern-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(245,158,11,0.4);
}
.btn-modern-outline {
    background: transparent;
    border: 1px solid var(--border);
    color: var(--txt-2);
}
.btn-modern-outline:hover {
    border-color: var(--pri);
    color: var(--pri);
    background: var(--pri-light);
    transform: translateY(-2px);
}

/* PERIHAL BOX */
.perihal-box {
    background: var(--surf-2);
    border-radius: var(--r-md);
    padding: 16px;
    border-left: 4px solid var(--pri);
    margin-top: 16px;
}
.perihal-box p {
    margin: 0;
    font-size: 14px;
    color: var(--txt-2);
    line-height: 1.6;
}

/* DIVIDER */
.divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--border), transparent);
    margin: 20px 0;
}

/* TIMESTAMP */
.timestamp {
    font-family: 'DM Mono', monospace;
    font-size: 12px;
    color: var(--txt-3);
}

/* MODAL */
.modal-modern .modal-content {
    border-radius: var(--r-xl);
    border: none;
    box-shadow: var(--sh-lg);
    overflow: hidden;
}
.modal-modern .modal-header {
    background: linear-gradient(135deg, #FEF2F2, #FEE2E2);
    border-bottom: 1px solid #FECACA;
    padding: 20px 24px;
}
.modal-modern .modal-title {
    font-weight: 800;
    color: #991B1B;
}
.modal-modern .modal-body {
    padding: 24px;
}
.modal-modern .modal-footer {
    padding: 16px 24px;
    border-top: 1px solid var(--border-lt);
}

/* Print Styles */
@media print {
    .hero-banner .btn-hero-back,
    .hero-banner .btn-hero-edit,
    .hero-banner .btn-hero-delete,
    .quick-actions,
    .modal,
    .am-close {
        display: none !important;
    }
    .hero-banner {
        background: #4F46E5;
        padding: 20px;
    }
    .modern-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ddd;
    }
    .content-area {
        margin-top: 0;
        padding: 20px;
    }
}
</style>

<div class="hero-banner">
    <div class="hero-inner">
        <div class="hero-left">
            <div class="hero-bread">
                <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <i class="fas fa-chevron-right sep"></i>
                <a href="{{ route('tamu.index') }}"><i class="fas fa-users"></i> Data Tamu</a>
                <i class="fas fa-chevron-right sep"></i>
                <span><i class="fas fa-user-circle"></i> Detail Tamu</span>
            </div>
            <h1 class="hero-title">
                <div class="ico-wrap"><i class="fas fa-address-card"></i></div>
                Detail Data Tamu
            </h1>
            <p class="hero-sub">
                <i class="fas fa-info-circle"></i>
                Informasi lengkap kunjungan tamu - {{ $tamu->nama }}
            </p>
        </div>
        <div class="hero-right">
            <a href="{{ route('tamu.index') }}" class="btn-hero-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('tamu.edit', $tamu->id) }}" class="btn-hero-edit">
                <i class="fas fa-pen"></i> Edit Data
            </a>
            <button type="button" class="btn-hero-delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </div>
    </div>
</div>

<div class="content-area">
    @if(session('success'))
    <div class="alert-mod ok" id="al-ok">
        <div class="am-icon"><i class="fas fa-check-circle"></i></div>
        <div class="am-body">
            <div class="am-title">Berhasil!</div>
            <p class="am-text">{{ session('success') }}</p>
        </div>
        <button class="am-close" onclick="this.closest('.alert-mod').remove()"><i class="fas fa-times"></i></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert-mod err" id="al-err">
        <div class="am-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="am-body">
            <div class="am-title">Error!</div>
            <p class="am-text">{{ session('error') }}</p>
        </div>
        <button class="am-close" onclick="this.closest('.alert-mod').remove()"><i class="fas fa-times"></i></button>
    </div>
    @endif

    <div class="detail-grid">
        {{-- LEFT COLUMN: Informasi Tamu --}}
        <div>
            <div class="modern-card mb-4">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-user"></i>
                        Informasi Tamu
                    </h5>
                    <span class="timestamp">
                        <i class="fas fa-clock"></i>
                        Input: {{ $tamu->created_at->format('d/m/Y H:i') }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <label><i class="fas fa-id-card"></i> NIP/NIK</label>
                            <div class="info-value">
                                <i class="fas fa-qrcode"></i>
                                {{ $tamu->nip_nik }}
                            </div>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-user"></i> Nama Lengkap</label>
                            <div class="info-value">
                                <i class="fas fa-user-circle"></i>
                                {{ $tamu->nama }}
                            </div>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-building"></i> Instansi / Perusahaan</label>
                            <div class="info-value">
                                <i class="fas fa-building"></i>
                                {{ $tamu->instansi }}
                            </div>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-phone"></i> No. HP / Telepon</label>
                            <div class="info-value">
                                <i class="fas fa-phone-alt"></i>
                                {{ $tamu->no_hp ?: '-' }}
                            </div>
                        </div>
                        <div class="info-item full-width">
                            <label><i class="fas fa-map-marker-alt"></i> Alamat</label>
                            <div class="info-value">
                                <i class="fas fa-location-dot"></i>
                                {{ $tamu->alamat }}
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="info-item">
                        <label><i class="fas fa-file-alt"></i> Perihal Kunjungan</label>
                        <div class="perihal-box">
                            <p>{{ $tamu->perihal ?: 'Tidak ada keterangan' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modern-card">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-handshake"></i>
                        Informasi Pertemuan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <label><i class="fas fa-user-tie"></i> Bertemu Dengan</label>
                            <div class="info-value">
                                <span class="pill-tujuan">
                                    <i class="fas fa-user-check"></i>
                                    {{ $tamu->bertemu_dengan }}
                                </span>
                            </div>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-calendar-alt"></i> Tanggal Kunjungan</label>
                            <div class="info-value">
                                <i class="fas fa-calendar-day"></i>
                                {{ $tamu->tanggal_kunjungan->translatedFormat('d F Y') }}
                                <br>
                                <small>
                                    <i class="fas fa-clock"></i>
                                    {{ $tamu->tanggal_kunjungan->format('H:i') }} WIB
                                </small>
                            </div>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-flag-checkered"></i> Status</label>
                            <div class="info-value">
                                <span class="badge-modern badge-success">
                                    <i class="fas fa-check-circle"></i>
                                    Telah Berkunjung
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Profile & Quick Actions --}}
        <div>
            {{-- CARD AVATAR (LINGKARAN) dengan margin-bottom yang lebih besar --}}
            <div class="modern-card" style="margin-bottom: 40px;">
                <div class="profile-avatar">
                    @php
                        $initials = strtoupper(mb_substr($tamu->nama, 0, 2));
                        $colorIndex = abs(crc32($tamu->nama)) % 7;
                        $avatarColors = [
                            'linear-gradient(135deg, #EEF2FF, #E0E7FF)',
                            'linear-gradient(135deg, #ECFEFF, #CFFAFE)',
                            'linear-gradient(135deg, #D1FAE5, #A7F3D0)',
                            'linear-gradient(135deg, #FEF3C7, #FDE68A)',
                            'linear-gradient(135deg, #F5F3FF, #EDE9FE)',
                            'linear-gradient(135deg, #FEE2E2, #FECACA)',
                            'linear-gradient(135deg, #FCE7F3, #FBCFE8)'
                        ];
                        $avatarTextColors = ['#4338CA','#0E7490','#065F46','#92400E','#5B21B6','#991B1B','#9D174D'];
                        $avatarColor     = $avatarColors[$colorIndex];
                        $avatarTextColor = $avatarTextColors[$colorIndex];
                    @endphp
                    <div class="avatar-large"
                         id="avatar-dynamic"
                         data-bg="{{ $avatarColor }}"
                         data-color="{{ $avatarTextColor }}">
                        {{ $initials }}
                    </div>
                    <h5 class="mb-1" style="font-weight: 800;">{{ $tamu->nama }}</h5>
                    <p class="text-muted small mb-2">{{ $tamu->instansi }}</p>
                    <div class="profile-status">
                        <i class="fas fa-check-circle"></i> Terverifikasi
                    </div>
                </div>
            </div>

            {{-- CARD RINGKASAN KUNJUNGAN (PERSEGI PANJANG) dengan margin-top tambahan --}}
            <div class="modern-card" style="margin-bottom: 24px;">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-chart-simple"></i>
                        Ringkasan Kunjungan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="info-list">
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-calendar-week"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">Tanggal Kunjungan</div>
                                <div class="info-list-value">
                                    {{ $tamu->tanggal_kunjungan->translatedFormat('d F Y') }}
                                </div>
                                <div class="timestamp">
                                    {{ $tamu->tanggal_kunjungan->format('H:i') }} WIB
                                </div>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">Ditujukan Kepada</div>
                                <div class="info-list-value">{{ $tamu->bertemu_dengan }}</div>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">Asal Instansi</div>
                                <div class="info-list-value">{{ Str::limit($tamu->instansi, 40) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modern-card">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-bolt"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="quick-actions">
                        <a href="{{ route('tamu.create') }}" class="btn-modern btn-modern-primary">
                            <i class="fas fa-user-plus"></i> Tambah Tamu Baru
                        </a>
                        <a href="{{ route('tamu.edit', $tamu->id) }}" class="btn-modern btn-modern-warning">
                            <i class="fas fa-edit"></i> Edit Data Ini
                        </a>
                        <a href="{{ route('tamu.exportDetailPDF', $tamu->id) }}" class="btn-modern btn-modern-outline">
                            <i class="fas fa-file-pdf"></i> Export ke PDF
                        </a>
                        <button type="button" class="btn-modern btn-modern-outline" onclick="window.print()">
                            <i class="fas fa-print"></i> Cetak Halaman
                        </button>
                        <a href="{{ route('tamu.index') }}" class="btn-modern btn-modern-outline">
                            <i class="fas fa-list"></i> Lihat Semua Tamu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-modern" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Konfirmasi Hapus Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3">
                    <i class="fas fa-trash-alt" style="font-size: 48px; color: var(--danger); opacity: 0.7;"></i>
                </div>
                <p class="mb-2">Apakah Anda yakin ingin menghapus data tamu ini?</p>
                <p class="fw-bold text-dark" id="tamuName" style="font-size: 16px;">{{ $tamu->nama }}</p>
                <p class="text-danger small mb-0">
                    <i class="fas fa-ban"></i> Data yang dihapus tidak dapat dikembalikan!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modern btn-modern-outline" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Batal
                </button>
                <form id="deleteForm" method="POST" action="{{ route('tamu.destroy', $tamu->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modern" style="background: linear-gradient(135deg, #EF4444, #DC2626); color: #fff; border: none; padding: 12px 24px;">
                        <i class="fas fa-trash"></i> Ya, Hapus!
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Apply dynamic avatar background dari data-* attribute (menghindari CSS linter VS Code)
    var avatar = document.getElementById('avatar-dynamic');
    if (avatar) {
        avatar.style.background = avatar.getAttribute('data-bg');
        avatar.style.color      = avatar.getAttribute('data-color');
    }

    setTimeout(function () {
        var alerts = document.querySelectorAll('.alert-mod');
        alerts.forEach(function(el) {
            el.style.transition = 'opacity .5s ease';
            el.style.opacity = '0';
            setTimeout(function () { if (el && el.parentNode) el.remove(); }, 500);
        });
    }, 5000);
});
</script>

@endsection