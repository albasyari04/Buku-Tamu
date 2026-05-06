@extends('layouts.app')

@section('content')
{{-- Edit Data Tamu — Professional Dashboard View --}}

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
.btn-hero-cancel {
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
.btn-hero-cancel:hover { background: rgba(239,68,68,0.3); border-color: rgba(239,68,68,0.5); transform: translateY(-2px); }
.btn-hero-update {
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
.btn-hero-update:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.2); }

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
.edit-grid {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 48px;
}
@media (max-width: 1024px) {
    .edit-grid { grid-template-columns: 1fr; }
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

/* FORM STYLES */
.form-modern {
    width: 100%;
}
.form-group {
    margin-bottom: 20px;
}
.form-label {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--txt-2);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.form-label i {
    color: var(--pri);
    font-size: 12px;
    width: 16px;
}
.form-label .required {
    color: var(--danger);
    font-size: 14px;
}
.form-control, .form-select {
    width: 100%;
    padding: 12px 16px;
    font-size: 14px;
    font-weight: 500;
    color: var(--txt);
    background-color: var(--surf);
    border: 1.5px solid var(--border);
    border-radius: var(--r-md);
    transition: all 0.25s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.form-control:focus, .form-select:focus {
    outline: none;
    border-color: var(--pri);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}
.form-control.is-invalid, .form-select.is-invalid {
    border-color: var(--danger);
    background-color: var(--danger-light);
}
.invalid-feedback {
    font-size: 11px;
    color: var(--danger);
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 4px;
}
.form-text {
    font-size: 11px;
    color: var(--txt-3);
    margin-top: 6px;
}
textarea.form-control {
    resize: vertical;
    min-height: 100px;
}
.row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}
@media (max-width: 640px) {
    .row {
        grid-template-columns: 1fr;
        gap: 0;
    }
}

/* FORM ACTIONS */
.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 24px;
    margin-top: 8px;
    border-top: 1px solid var(--border-lt);
}
.btn-group-left {
    display: flex;
    gap: 12px;
}
.btn-modern {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px 20px;
    border-radius: var(--r-md);
    font-size: 13px;
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
.btn-modern-secondary {
    background: linear-gradient(135deg, var(--txt-2), #334155);
    color: #fff;
}
.btn-modern-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(51,65,85,0.3);
}
.btn-modern-outline {
    background: transparent;
    border: 1.5px solid var(--border);
    color: var(--txt-2);
}
.btn-modern-outline:hover {
    border-color: var(--pri);
    color: var(--pri);
    background: var(--pri-light);
    transform: translateY(-2px);
}
.btn-modern-danger-outline {
    background: transparent;
    border: 1.5px solid var(--danger);
    color: var(--danger);
}
.btn-modern-danger-outline:hover {
    background: var(--danger-light);
    transform: translateY(-2px);
}

/* SIDEBAR INFO */
.info-item {
    padding: 12px 0;
    border-bottom: 1px solid var(--border-lt);
}
.info-item:last-child {
    border-bottom: none;
}
.info-item label {
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--txt-3);
    margin-bottom: 6px;
    display: block;
}
.info-item .value {
    font-size: 14px;
    font-weight: 600;
    color: var(--txt);
    word-break: break-word;
    display: flex;
    align-items: center;
    gap: 8px;
}
.info-item .value i {
    color: var(--pri);
    width: 20px;
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
    background: var(--warning-light);
    color: #92400E;
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

/* TIMESTAMP */
.timestamp {
    font-family: 'DM Mono', monospace;
    font-size: 12px;
    color: var(--txt-3);
}

/* BADGES */
.badge-modern {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
}
.badge-warning {
    background: linear-gradient(135deg, #FEF3C7, #FDE68A);
    color: #92400E;
}

/* DIVIDER */
.divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--border), transparent);
    margin: 20px 0;
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
                <a href="{{ route('tamu.show', $tamu->id) }}"><i class="fas fa-user-circle"></i> Detail Tamu</a>
                <i class="fas fa-chevron-right sep"></i>
                <span><i class="fas fa-pen"></i> Edit Tamu</span>
            </div>
            <h1 class="hero-title">
                <div class="ico-wrap"><i class="fas fa-pen"></i></div>
                Edit Data Tamu
            </h1>
            <p class="hero-sub">
                <i class="fas fa-edit"></i>
                Perbarui informasi kunjungan tamu - {{ $tamu->nama }}
            </p>
        </div>
        <div class="hero-right">
            <a href="{{ route('tamu.show', $tamu->id) }}" class="btn-hero-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" form="editForm" class="btn-hero-update">
                <i class="fas fa-save"></i> Update Data
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

    <div class="edit-grid">
        {{-- LEFT COLUMN: Form Edit --}}
        <div>
            <div class="modern-card">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-edit"></i>
                        Form Edit Tamu
                    </h5>
                    <span class="timestamp">
                        <i class="fas fa-clock"></i>
                        ID: #{{ $tamu->id }}
                    </span>
                </div>
                <div class="card-body">
                    <form id="editForm" action="{{ route('tamu.update', $tamu->id) }}" method="POST" class="form-modern">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-id-card"></i>
                                    NIP/NIK <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('nip_nik') is-invalid @enderror" 
                                       name="nip_nik" 
                                       value="{{ old('nip_nik', $tamu->nip_nik) }}" 
                                       placeholder="Masukkan NIP atau NIK"
                                       required>
                                @error('nip_nik')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    Nama Tamu <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('nama') is-invalid @enderror" 
                                       name="nama" 
                                       value="{{ old('nama', $tamu->nama) }}" 
                                       placeholder="Masukkan nama tamu"
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-phone-alt"></i>
                                    No. HP/Telepon
                                </label>
                                <input type="text" 
                                       class="form-control @error('no_hp') is-invalid @enderror" 
                                       name="no_hp" 
                                       value="{{ old('no_hp', $tamu->no_hp) }}" 
                                       placeholder="Contoh: 081234567890">
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-building"></i>
                                    Instansi/Perusahaan <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('instansi') is-invalid @enderror" 
                                       name="instansi" 
                                       value="{{ old('instansi', $tamu->instansi) }}" 
                                       placeholder="Masukkan nama instansi"
                                       required>
                                @error('instansi')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Alamat <span class="required">*</span>
                            </label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      name="alamat" 
                                      rows="3" 
                                      placeholder="Masukkan alamat lengkap tamu"
                                      required>{{ old('alamat', $tamu->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user-tie"></i>
                                    Bertemu Dengan <span class="required">*</span>
                                </label>
                                <select class="form-select @error('bertemu_dengan') is-invalid @enderror" 
                                        name="bertemu_dengan" 
                                        required>
                                    <option value="">Pilih Bertemu Dengan</option>
                                    @foreach($bertemu_dengan as $bidang)
                                        <option value="{{ $bidang }}" 
                                            {{ old('bertemu_dengan', $tamu->bertemu_dengan) == $bidang ? 'selected' : '' }}>
                                            {{ $bidang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bertemu_dengan')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar-alt"></i>
                                    Tanggal Kunjungan
                                </label>
                                <input type="datetime-local" 
                                       class="form-control @error('tanggal_kunjungan') is-invalid @enderror" 
                                       name="tanggal_kunjungan" 
                                       value="{{ old('tanggal_kunjungan', $tamu->tanggal_kunjungan ? $tamu->tanggal_kunjungan->format('Y-m-d\TH:i') : '') }}">
                                <div class="form-text">
                                    <i class="fas fa-info-circle"></i> Kosongkan untuk menggunakan waktu saat ini
                                </div>
                                @error('tanggal_kunjungan')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                Perihal <span class="required">*</span>
                            </label>
                            <select class="form-select @error('perihal') is-invalid @enderror" 
                                    name="perihal" 
                                    required>
                                <option value="">Pilih Perihal Kunjungan</option>
                                @foreach($perihal_options as $perihal)
                                    <option value="{{ $perihal }}" 
                                        {{ old('perihal', $tamu->perihal) == $perihal ? 'selected' : '' }}>
                                        {{ $perihal }}
                                    </option>
                                @endforeach
                            </select>
                            @error('perihal')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <div class="btn-group-left">
                                <a href="{{ route('tamu.show', $tamu->id) }}" class="btn-modern btn-modern-outline">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <a href="{{ route('tamu.index') }}" class="btn-modern btn-modern-secondary">
                                    <i class="fas fa-list"></i> Data Tamu
                                </a>
                            </div>
                            <button type="submit" class="btn-modern btn-modern-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Informasi & Preview --}}
        <div>
            {{-- Avatar Card --}}
            <div class="modern-card" style="margin-bottom: 24px;">
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
                        <i class="fas fa-pen"></i> Sedang Diedit
                    </div>
                </div>
            </div>

            {{-- Informasi Data Card --}}
            <div class="modern-card" style="margin-bottom: 24px;">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-info-circle"></i>
                        Informasi Data
                    </h5>
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <label><i class="fas fa-calendar-plus"></i> Dibuat Pada</label>
                        <div class="value">
                            <i class="fas fa-clock"></i>
                            {{ $tamu->created_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                    <div class="info-item">
                        <label><i class="fas fa-calendar-edit"></i> Terakhir Diupdate</label>
                        <div class="value">
                            <i class="fas fa-sync-alt"></i>
                            {{ $tamu->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                    <div class="info-item">
                        <label><i class="fas fa-barcode"></i> ID Data</label>
                        <div class="value">
                            <i class="fas fa-hashtag"></i>
                            #{{ $tamu->id }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pratinjau Data Card --}}
            <div class="modern-card">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-eye"></i>
                        Pratinjau Data
                    </h5>
                </div>
                <div class="card-body">
                    <div class="info-list">
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">NIP/NIK</div>
                                <div class="info-list-value">{{ $tamu->nip_nik }}</div>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">No. HP/Telepon</div>
                                <div class="info-list-value">{{ $tamu->no_hp ?: '-' }}</div>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">Bertemu Dengan</div>
                                <div class="info-list-value">{{ $tamu->bertemu_dengan }}</div>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <div class="info-list-icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="info-list-content">
                                <div class="info-list-label">Tanggal Kunjungan</div>
                                <div class="info-list-value">
                                    {{ $tamu->tanggal_kunjungan->format('d/m/Y H:i') }} WIB
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="info-list-item" style="padding: 0;">
                        <div class="info-list-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div class="info-list-content">
                            <div class="info-list-label">Status</div>
                            <div class="info-list-value">
                                <span class="badge-modern badge-warning">
                                    <i class="fas fa-pen"></i> Mode Edit
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Apply dynamic avatar background dari data-* attribute
    var avatar = document.getElementById('avatar-dynamic');
    if (avatar) {
        avatar.style.background = avatar.getAttribute('data-bg');
        avatar.style.color      = avatar.getAttribute('data-color');
    }

    // Auto dismiss alerts after 5 seconds
    setTimeout(function () {
        var alerts = document.querySelectorAll('.alert-mod');
        alerts.forEach(function(el) {
            el.style.transition = 'opacity .5s ease';
            el.style.opacity = '0';
            setTimeout(function () { if (el && el.parentNode) el.remove(); }, 500);
        });
    }, 5000);

    // Optional: Add form dirty check (warning before leave)
    let formChanged = false;
    const form = document.getElementById('editForm');
    const formInputs = form.querySelectorAll('input, select, textarea');
    
    formInputs.forEach(input => {
        input.addEventListener('change', () => { formChanged = true; });
        input.addEventListener('input', () => { formChanged = true; });
    });
    
    window.addEventListener('beforeunload', function (e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = 'Anda belum menyimpan perubahan. Yakin ingin meninggalkan halaman?';
            return e.returnValue;
        }
    });
    
    form.addEventListener('submit', function() {
        formChanged = false;
    });
});
</script>

@endsection