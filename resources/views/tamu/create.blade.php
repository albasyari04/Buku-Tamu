@extends('layouts.app')

@section('content')
{{-- ============================================================
     TAMU CREATE — Professional Form View
     Enhanced with modern card design, floating labels & icons
     ============================================================ --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* ============================================================
   CSS VARIABLES (consistent with index)
   ============================================================ */
:root {
    --pri:           #4F46E5;
    --pri-dark:      #4338CA;
    --pri-light:     #EEF2FF;
    --pri-mid:       #E0E7FF;
    --cyan:          #06B6D4;
    --success:       #10B981;
    --success-light: #D1FAE5;
    --warning:       #F59E0B;
    --warning-light: #FEF3C7;
    --danger:        #EF4444;
    --danger-light:  #FEE2E2;
    --purple:        #8B5CF6;
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

/* ============================================================
   BASE
   ============================================================ */
.pg * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
.pg { background: #F0F2F9; min-height: 100vh; }

/* ============================================================
   HERO BANNER
   ============================================================ */
.hero-banner {
    background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 60%, #6D28D9 100%);
    padding: 28px 32px 80px;
    position: relative;
    overflow: hidden;
}
.hero-banner::before {
    content: '';
    position: absolute; inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.hero-banner::after {
    content: '';
    position: absolute;
    right: -80px; top: -80px;
    width: 360px; height: 360px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    pointer-events: none;
}
.hero-inner {
    display: flex; align-items: flex-start; justify-content: space-between;
    flex-wrap: wrap; gap: 20px; position: relative; z-index: 1;
}
.hero-bread {
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; color: rgba(255,255,255,.65); margin-bottom: 10px;
}
.hero-bread a { color: rgba(255,255,255,.85); text-decoration: none; transition: color .2s; }
.hero-bread a:hover { color: #fff; }
.hero-bread .sep { font-size: 10px; }
.hero-title {
    font-size: 30px; font-weight: 800; color: #fff;
    margin: 0 0 8px; letter-spacing: -0.5px;
    display: flex; align-items: center; gap: 12px;
}
.hero-title .ico-wrap {
    width: 44px; height: 44px; background: rgba(255,255,255,.15);
    border-radius: var(--r-md); display: flex; align-items: center; justify-content: center;
    font-size: 20px; backdrop-filter: blur(4px);
}
.hero-sub {
    font-size: 14px; color: rgba(255,255,255,.75);
    display: flex; align-items: center; gap: 8px;
}
.hero-right {
    display: flex; align-items: center; gap: 10px; padding-top: 4px;
}
.btn-hero-back {
    display: inline-flex; align-items: center; gap: 9px;
    background: rgba(255,255,255,.15); color: #fff !important;
    padding: 11px 20px; border-radius: var(--r-md);
    font-size: 14px; font-weight: 600; text-decoration: none !important;
    border: 1px solid rgba(255,255,255,.25); cursor: pointer;
    transition: all .25s ease; backdrop-filter: blur(4px);
}
.btn-hero-back:hover { background: rgba(255,255,255,.22); transform: translateY(-2px); }

/* ============================================================
   CONTENT AREA
   ============================================================ */
.content-area {
    padding: 0 32px 40px;
    margin-top: -56px;
    position: relative; z-index: 2;
}

/* ============================================================
   FORM CARD
   ============================================================ */
.form-card {
    background: var(--surf);
    border-radius: var(--r-xl);
    border: 1px solid var(--border);
    box-shadow: var(--sh-md);
    overflow: hidden;
}
.card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 20px 28px;
    background: linear-gradient(to bottom, #FEFEFE, var(--surf));
    border-bottom: 2px solid var(--pri-light);
}
.card-header-icon {
    width: 52px;
    height: 52px;
    background: linear-gradient(135deg, var(--pri-light), var(--pri-mid));
    border-radius: var(--r-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: var(--pri);
}
.card-header-title {
    flex: 1;
}
.card-header-title h2 {
    font-size: 20px;
    font-weight: 800;
    color: var(--txt);
    margin: 0 0 4px;
}
.card-header-title p {
    font-size: 13px;
    color: var(--txt-3);
    margin: 0;
}
.required-badge {
    background: var(--danger-light);
    color: var(--danger);
    padding: 4px 12px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}
.required-badge i {
    margin-right: 5px;
}

/* ============================================================
   FORM STYLES
   ============================================================ */
.form-body {
    padding: 28px;
}
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}
@media (max-width: 768px) {
    .form-grid { grid-template-columns: 1fr; }
    .form-body { padding: 20px; }
    .hero-banner { padding: 20px 18px 70px; }
    .content-area { padding: 0 14px 28px; }
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.form-group-full {
    grid-column: span 2;
}
@media (max-width: 768px) {
    .form-group-full { grid-column: span 1; }
}

.form-label {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: var(--txt-2);
    display: flex;
    align-items: center;
    gap: 8px;
}
.form-label i {
    color: var(--pri);
    font-size: 13px;
    width: 18px;
}
.required-star {
    color: var(--danger);
    font-size: 14px;
    margin-left: 4px;
}

/* ============================================================
   CUSTOM SELECT STYLES (Professional & Modern)
   ============================================================ */
.select-wrapper {
    position: relative;
    width: 100%;
}
.select-wrapper .form-select {
    width: 100%;
    padding: 12px 40px 12px 42px;
    border: 1.5px solid var(--border);
    border-radius: var(--r-md);
    font-size: 14px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--txt);
    background: var(--surf-2);
    transition: all .2s ease;
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
}
.select-wrapper .form-select:focus {
    border-color: var(--pri);
    background: var(--surf);
    box-shadow: 0 0 0 3px rgba(79,70,229,.1);
}
.select-wrapper .form-select:hover {
    border-color: var(--pri-mid);
    background: var(--surf);
}
.select-wrapper .form-select.is-invalid {
    border-color: var(--danger);
    background: var(--danger-light);
}
.select-icon-left {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--txt-3);
    font-size: 15px;
    pointer-events: none;
    z-index: 1;
}
.select-icon-right {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--txt-3);
    font-size: 14px;
    pointer-events: none;
    transition: transform 0.2s ease;
    z-index: 1;
}
.select-wrapper .form-select:focus ~ .select-icon-right {
    color: var(--pri);
}
.select-wrapper .form-select:hover ~ .select-icon-right {
    color: var(--pri);
}
/* Dropdown option styling (native browser but enhanced) */
.form-select option {
    padding: 12px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--surf);
    color: var(--txt);
}
.form-select optgroup {
    font-weight: 700;
    color: var(--pri);
}

/* ============================================================
   INPUT & TEXTAREA STYLES
   ============================================================ */
.input-icon-wrapper {
    position: relative;
    width: 100%;
}

/* Regular input styling */
.input-icon-wrapper .form-input {
    width: 100%;
    padding: 12px 16px 12px 42px;
    border: 1.5px solid var(--border);
    border-radius: var(--r-md);
    font-size: 14px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--txt);
    background: var(--surf-2);
    transition: all .2s ease;
    outline: none;
}
.input-icon-wrapper .form-input:focus {
    border-color: var(--pri);
    background: var(--surf);
    box-shadow: 0 0 0 3px rgba(79,70,229,.1);
}
.input-icon-wrapper .form-input:hover {
    border-color: var(--pri-mid);
}
.input-icon-wrapper .form-input.is-invalid {
    border-color: var(--danger);
    background: var(--danger-light);
}

/* Textarea styling */
.input-icon-wrapper .form-textarea {
    width: 100%;
    padding: 12px 16px 12px 42px;
    border: 1.5px solid var(--border);
    border-radius: var(--r-md);
    font-size: 14px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--txt);
    background: var(--surf-2);
    transition: all .2s ease;
    outline: none;
    resize: vertical;
    min-height: 90px;
    line-height: 1.5;
}
.input-icon-wrapper .form-textarea:focus {
    border-color: var(--pri);
    background: var(--surf);
    box-shadow: 0 0 0 3px rgba(79,70,229,.1);
}
.input-icon-wrapper .form-textarea:hover {
    border-color: var(--pri-mid);
}
.input-icon-wrapper .form-textarea.is-invalid {
    border-color: var(--danger);
    background: var(--danger-light);
}

/* Icon positioning - specifically for textarea (top alignment) */
.input-icon-wrapper.textarea-icon .input-icon {
    position: absolute;
    left: 14px;
    top: 14px;
    color: var(--txt-3);
    font-size: 15px;
    pointer-events: none;
    z-index: 1;
}

/* For regular input, icon stays centered */
.input-icon-wrapper:not(.textarea-icon) .input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--txt-3);
    font-size: 15px;
    pointer-events: none;
    z-index: 1;
}

/* Error styling */
.error-feedback {
    font-size: 11px;
    color: var(--danger);
    margin-top: 4px;
    display: flex;
    align-items: center;
    gap: 5px;
}
.error-feedback i {
    font-size: 10px;
}

/* Help text */
.help-text {
    font-size: 11px;
    color: var(--txt-3);
    margin-top: 4px;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* ============================================================
   ACTION BUTTONS
   ============================================================ */
.form-actions {
    margin-top: 32px;
    padding-top: 24px;
    border-top: 1px solid var(--border-lt);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 16px;
    flex-wrap: wrap;
}
.btn-submit {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 28px;
    background: linear-gradient(135deg, var(--pri), var(--pri-dark));
    color: #fff;
    border: none;
    border-radius: var(--r-md);
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all .25s ease;
}
.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,.3);
}
.btn-submit:active {
    transform: translateY(0);
}
.btn-reset {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: var(--surf-2);
    border: 1.5px solid var(--border);
    border-radius: var(--r-md);
    font-size: 13px;
    font-weight: 600;
    color: var(--txt-2);
    cursor: pointer;
    transition: all .2s ease;
}
.btn-reset:hover {
    background: var(--surf-3);
    border-color: var(--txt-3);
}
.btn-cancel {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: transparent;
    border: 1.5px solid var(--border);
    border-radius: var(--r-md);
    font-size: 13px;
    font-weight: 600;
    color: var(--txt-2);
    text-decoration: none;
    transition: all .2s ease;
}
.btn-cancel:hover {
    background: var(--surf-2);
    border-color: var(--txt-3);
    color: var(--txt);
}

/* ============================================================
   ALERT
   ============================================================ */
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
.alert-mod.ok  .am-icon { color: var(--success); }
.alert-mod.err .am-icon { color: var(--danger);  }
.am-body { flex: 1; }
.am-title { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
.alert-mod.ok  .am-title { color: #065F46; }
.alert-mod.err .am-title { color: #991B1B; }
.am-text  { font-size: 13px; color: var(--txt-2); margin: 0; }
.am-close { background: none; border: none; color: var(--txt-3); cursor: pointer; font-size: 14px; padding: 2px 4px; }
.am-close:hover { color: var(--txt); }

/* Small info card */
.info-tip {
    background: linear-gradient(135deg, var(--pri-light), #F8FAFF);
    border-radius: var(--r-md);
    padding: 14px 18px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-left: 3px solid var(--pri);
}
.info-tip i {
    font-size: 20px;
    color: var(--pri);
}
.info-tip-content {
    flex: 1;
}
.info-tip-content strong {
    color: var(--pri);
    font-size: 13px;
}
.info-tip-content p {
    margin: 4px 0 0;
    font-size: 12px;
    color: var(--txt-2);
}
</style>

{{-- ============================================================
     HERO BANNER
     ============================================================ --}}
<div class="hero-banner">
    <div class="hero-inner">
        <div class="hero-left">
            <div class="hero-bread">
                <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <i class="fas fa-chevron-right sep"></i>
                <a href="{{ route('tamu.index') }}"><i class="fas fa-users"></i> Data Tamu</a>
                <i class="fas fa-chevron-right sep"></i>
                <span><i class="fas fa-plus-circle"></i> Tambah Tamu</span>
            </div>
            <h1 class="hero-title">
                <div class="ico-wrap"><i class="fas fa-user-plus"></i></div>
                Tambah Kunjungan Tamu
            </h1>
            <p class="hero-sub">
                <i class="fas fa-edit"></i>
                Isi formulir di bawah untuk mencatat kunjungan tamu baru &mdash; BKPSDM OKU Timur
            </p>
        </div>
        <div class="hero-right">
            <a href="{{ route('tamu.index') }}" class="btn-hero-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

{{-- ============================================================
     CONTENT AREA
     ============================================================ --}}
<div class="content-area">

    {{-- Alerts --}}
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
    @if($errors->any())
    <div class="alert-mod err">
        <div class="am-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div class="am-body">
            <div class="am-title">Validasi Gagal</div>
            <p class="am-text">Silakan periksa kembali data yang Anda masukkan.</p>
        </div>
        <button class="am-close" onclick="this.closest('.alert-mod').remove()"><i class="fas fa-times"></i></button>
    </div>
    @endif

    {{-- Info Tip --}}
    <div class="info-tip">
        <i class="fas fa-info-circle"></i>
        <div class="info-tip-content">
            <strong>Informasi Pengisian</strong>
            <p>Field dengan tanda <span style="color:#EF4444">*</span> wajib diisi. Data akan tersimpan di database buku tamu.</p>
        </div>
    </div>

    {{-- Main Form Card --}}
    <div class="form-card">
        <div class="card-header">
            <div class="card-header-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="card-header-title">
                <h2>Formulir Data Kunjungan</h2>
                <p>Lengkapi data tamu dengan informasi yang akurat</p>
            </div>
            <div class="required-badge">
                <i class="fas fa-asterisk"></i> Required Fields
            </div>
        </div>

        <form action="{{ route('tamu.store') }}" method="POST" id="tamuForm">
            @csrf

            <div class="form-body">
                <div class="form-grid">

                    {{-- NIP/NIK --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-id-card"></i>
                            NIP / NIK
                            <span class="required-star">*</span>
                        </label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-hashtag input-icon"></i>
                            <input type="text"
                                   name="nip_nik"
                                   class="form-input @error('nip_nik') is-invalid @enderror"
                                   value="{{ old('nip_nik') }}"
                                   placeholder="Contoh: 197501012005011002"
                                   autocomplete="off">
                        </div>
                        @error('nip_nik')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @else
                            <div class="help-text"><i class="fas fa-question-circle"></i> NIP untuk ASN / NIK untuk non-ASN</div>
                        @enderror
                    </div>

                    {{-- Nama Lengkap --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i>
                            Nama Lengkap
                            <span class="required-star">*</span>
                        </label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text"
                                   name="nama"
                                   class="form-input @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}"
                                   placeholder="Contoh: Ahmad Sudrajat, S.IP"
                                   autocomplete="off">
                        </div>
                        @error('nama')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    {{-- No HP --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone-alt"></i>
                            Nomor Telepon / HP
                        </label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-phone input-icon"></i>
                            <input type="text"
                                   name="no_hp"
                                   class="form-input @error('no_hp') is-invalid @enderror"
                                   value="{{ old('no_hp') }}"
                                   placeholder="Contoh: 081234567890">
                        </div>
                        @error('no_hp')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @else
                            <div class="help-text"><i class="fas fa-info-circle"></i> Aktif untuk kebutuhan konfirmasi</div>
                        @enderror
                    </div>

                    {{-- Tanggal Kunjungan --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal & Waktu Kunjungan
                        </label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-day input-icon"></i>
                            <input type="datetime-local"
                                   name="tanggal_kunjungan"
                                   class="form-input @error('tanggal_kunjungan') is-invalid @enderror"
                                   value="{{ old('tanggal_kunjungan', now()->format('Y-m-d\TH:i')) }}">
                        </div>
                        @error('tanggal_kunjungan')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @else
                            <div class="help-text"><i class="fas fa-clock"></i> Kosongkan untuk menggunakan waktu sekarang</div>
                        @enderror
                    </div>

                    {{-- Instansi --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-building"></i>
                            Instansi / Asal
                            <span class="required-star">*</span>
                        </label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-building input-icon"></i>
                            <input type="text"
                                   name="instansi"
                                   class="form-input @error('instansi') is-invalid @enderror"
                                   value="{{ old('instansi') }}"
                                   placeholder="Contoh: Dinas Pendidikan OKU Timur">
                        </div>
                        @error('instansi')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat (Textarea with icon aligned to top) --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map-marker-alt"></i>
                            Alamat
                            <span class="required-star">*</span>
                        </label>
                        <div class="input-icon-wrapper textarea-icon">
                            <i class="fas fa-location-dot input-icon"></i>
                            <textarea name="alamat"
                                      class="form-textarea @error('alamat') is-invalid @enderror"
                                      placeholder="Contoh: Jl. Lintas Timur No. 123, Martapura...">{{ old('alamat') }}</textarea>
                        </div>
                        @error('alamat')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @else
                            <div class="help-text"><i class="fas fa-info-circle"></i> Masukkan alamat lengkap dan jelas</div>
                        @enderror
                    </div>

                    {{-- Bertemu Dengan (Custom Select with Dropdown Icon) --}}
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-tie"></i>
                            Bertemu Dengan
                            <span class="required-star">*</span>
                        </label>
                        <div class="select-wrapper">
                            <i class="fas fa-handshake select-icon-left"></i>
                            <select name="bertemu_dengan" class="form-select @error('bertemu_dengan') is-invalid @enderror">
                                <option value="">Pilih Pegawai Yang Dituju</option>
                                @foreach($bertemu_dengan as $bidang)
                                    <option value="{{ $bidang }}" {{ old('bertemu_dengan') == $bidang ? 'selected' : '' }}>
                                        {{ $bidang }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down select-icon-right"></i>
                        </div>
                        @error('bertemu_dengan')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @else
                            <div class="help-text"><i class="fas fa-info-circle"></i> Pilih pejabat/pegawai yang akan ditemui</div>
                        @enderror
                    </div>

                    {{-- Perihal / Keperluan (Custom Select with Dropdown Icon - Same styling) --}}
                    <div class="form-group form-group-full">
                        <label class="form-label">
                            <i class="fas fa-file-alt"></i>
                            Perihal / Keperluan
                            <span class="required-star">*</span>
                        </label>
                        <div class="select-wrapper">
                            <i class="fas fa-tasks select-icon-left"></i>
                            <select name="perihal" class="form-select @error('perihal') is-invalid @enderror">
                                <option value="">Pilih Keperluan Kunjungan</option>
                                @foreach($perihal_options as $perihal)
                                    <option value="{{ $perihal }}" {{ old('perihal') == $perihal ? 'selected' : '' }}>
                                        {{ $perihal }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down select-icon-right"></i>
                        </div>
                        @error('perihal')
                            <div class="error-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @else
                            <div class="help-text"><i class="fas fa-lightbulb"></i> Pilih keperluan yang paling sesuai</div>
                        @enderror
                    </div>

                </div>

                {{-- Action Buttons --}}
                <div class="form-actions">
                    <a href="{{ route('tamu.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="reset" class="btn-reset" onclick="return confirmReset(event)">
                        <i class="fas fa-undo-alt"></i> Reset
                    </button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Data Tamu
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
/* Auto-dismiss alerts */
setTimeout(function () {
    ['al-ok', 'al-err'].forEach(function (aid) {
        var el = document.getElementById(aid);
        if (!el) return;
        el.style.transition = 'opacity .5s ease';
        el.style.opacity = '0';
        setTimeout(function () { if (el && el.parentNode) el.remove(); }, 500);
    });
}, 5000);

/* Confirm reset */
function confirmReset(event) {
    event.preventDefault();
    if (confirm('Apakah Anda yakin ingin mereset semua field form?')) {
        document.getElementById('tamuForm').reset();
        // Reset datetime-local to current time
        const dtInput = document.querySelector('input[name="tanggal_kunjungan"]');
        if (dtInput) {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            dtInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
        }
    }
    return false;
}
</script>
@endsection