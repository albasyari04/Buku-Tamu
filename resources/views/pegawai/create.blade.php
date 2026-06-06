@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')

<style>
    /* ─── CSS Variables ─── */
    :root {
        --primary: #1a56db;
        --primary-dark: #1e429f;
        --primary-light: #ebf5ff;
        --accent: #0ea5e9;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --surface: #ffffff;
        --surface-2: #f8fafc;
        --border: #e2e8f0;
        --border-focus: #1a56db;
        --text-primary: #0f172a;
        --text-secondary: #64748b;
        --text-muted: #94a3b8;
        --shadow-sm: 0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
        --shadow-md: 0 4px 16px rgba(0,0,0,.08);
        --shadow-lg: 0 10px 40px rgba(0,0,0,.12);
        --radius: 14px;
        --radius-sm: 8px;
        --radius-xs: 6px;
    }

    /* ─── Page Layout ─── */
    .create-page-wrapper {
        min-height: 100vh;
        background: linear-gradient(135deg, #f0f4ff 0%, #f8fafc 50%, #eef9f4 100%);
        padding: 0 0 60px 0;
        font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
    }

    /* ─── Hero Header ─── */
    .page-hero {
        background: linear-gradient(135deg, #1a56db 0%, #1e429f 50%, #1e3a6e 100%);
        position: relative;
        overflow: hidden;
        padding: 36px 40px 80px;
        margin-bottom: -50px;
    }

    .page-hero::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 320px; height: 320px;
        background: rgba(255,255,255,.06);
        border-radius: 50%;
    }
    .page-hero::after {
        content: '';
        position: absolute;
        bottom: -100px; left: -60px;
        width: 260px; height: 260px;
        background: rgba(255,255,255,.04);
        border-radius: 50%;
    }

    /* decorative dots */
    .hero-dots {
        position: absolute;
        top: 20px; right: 160px;
        display: grid;
        grid-template-columns: repeat(5, 8px);
        gap: 6px;
        opacity: .18;
    }
    .hero-dots span {
        width: 6px; height: 6px;
        background: #fff;
        border-radius: 50%;
        display: block;
    }

    .hero-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 18px;
        font-size: 13px;
        color: rgba(255,255,255,.65);
        position: relative; z-index: 2;
    }
    .hero-breadcrumb a {
        color: rgba(255,255,255,.75);
        text-decoration: none;
        transition: color .2s;
    }
    .hero-breadcrumb a:hover { color: #fff; }
    .hero-breadcrumb .sep { font-size: 10px; }

    .hero-body {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        position: relative; z-index: 2;
    }

    .hero-icon-wrap {
        width: 64px; height: 64px;
        background: rgba(255,255,255,.15);
        border: 2px solid rgba(255,255,255,.25);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(8px);
        margin-right: 20px;
        flex-shrink: 0;
    }
    .hero-icon-wrap svg { color: #fff; }

    .hero-text h1 {
        font-size: 28px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 6px;
        letter-spacing: -.5px;
    }
    .hero-text p {
        font-size: 14px;
        color: rgba(255,255,255,.72);
        margin: 0;
    }

    .hero-badge-group {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .hero-badge {
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 20px;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 600;
        color: rgba(255,255,255,.9);
        display: flex;
        align-items: center;
        gap: 6px;
        backdrop-filter: blur(6px);
    }
    .hero-badge .dot {
        width: 7px; height: 7px;
        background: #4ade80;
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    @keyframes pulse-dot {
        0%,100% { opacity: 1; }
        50% { opacity: .4; }
    }

    /* ─── Main Card Container ─── */
    .form-container {
        position: relative;
        z-index: 10;
        max-width: 860px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .form-card {
        background: var(--surface);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        border: 1px solid rgba(255,255,255,.8);
    }

    /* ─── Progress Steps ─── */
    .form-steps-bar {
        background: linear-gradient(90deg, #f0f4ff, #f8fafc);
        border-bottom: 1px solid var(--border);
        padding: 20px 32px;
        display: flex;
        align-items: center;
        gap: 0;
    }
    .step-item {
        display: flex;
        align-items: center;
        gap: 10px;
        flex: 1;
    }
    .step-item:last-child { flex: 0; }
    .step-circle {
        width: 34px; height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
        flex-shrink: 0;
        transition: all .3s;
    }
    .step-circle.active {
        background: var(--primary);
        color: #fff;
        box-shadow: 0 4px 12px rgba(26,86,219,.35);
    }
    .step-circle.inactive {
        background: #f1f5f9;
        color: var(--text-muted);
        border: 2px solid var(--border);
    }
    .step-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
    }
    .step-label.active { color: var(--primary); }
    .step-connector {
        flex: 1;
        height: 2px;
        background: var(--border);
        margin: 0 12px;
    }
    .step-connector.done { background: var(--primary); }

    /* ─── Form Body ─── */
    .form-body {
        padding: 36px 40px 32px;
    }

    /* ─── Section Headers ─── */
    .section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        padding-bottom: 14px;
        border-bottom: 2px solid var(--border);
    }
    .section-icon {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .section-icon.blue  { background: var(--primary-light); color: var(--primary); }
    .section-icon.green { background: #ecfdf5; color: var(--success); }
    .section-icon.amber { background: #fffbeb; color: var(--warning); }
    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-primary);
    }
    .section-subtitle {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 2px;
    }

    /* ─── Alert Messages ─── */
    .alert-modern {
        border-radius: var(--radius-sm);
        padding: 14px 18px;
        margin-bottom: 28px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
    }
    .alert-modern.error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }
    .alert-modern.success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
    }
    .alert-modern .alert-icon {
        flex-shrink: 0;
        margin-top: 1px;
    }

    /* ─── Form Groups ─── */
    .form-grid {
        display: grid;
        gap: 22px;
    }
    .form-grid-2 { grid-template-columns: 1fr 1fr; }
    .form-grid-1 { grid-template-columns: 1fr; }

    .form-group { display: flex; flex-direction: column; gap: 7px; }

    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .form-label .label-icon {
        width: 18px; height: 18px;
        display: flex; align-items: center; justify-content: center;
        color: var(--primary);
    }
    .form-label .required-badge {
        font-size: 10px;
        font-weight: 600;
        color: var(--danger);
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 4px;
        padding: 1px 5px;
        margin-left: auto;
    }
    .form-label .optional-badge {
        font-size: 10px;
        font-weight: 500;
        color: var(--text-muted);
        background: var(--surface-2);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 1px 5px;
        margin-left: auto;
    }

    /* Input Wrapper */
    .input-wrapper {
        position: relative;
    }
    .input-prefix-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        pointer-events: none;
        z-index: 1;
        transition: color .2s;
    }
    .input-wrapper:focus-within .input-prefix-icon {
        color: var(--primary);
    }

    .form-control-modern {
        width: 100%;
        padding: 12px 14px 12px 42px;
        font-size: 14px;
        font-family: inherit;
        color: var(--text-primary);
        background: var(--surface);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        outline: none;
        transition: border-color .2s, box-shadow .2s, background .2s;
        box-sizing: border-box;
    }
    .form-control-modern::placeholder { color: var(--text-muted); }
    .form-control-modern:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(26,86,219,.1);
        background: #fafcff;
    }
    .form-control-modern.is-invalid {
        border-color: var(--danger);
        box-shadow: 0 0 0 3px rgba(239,68,68,.1);
    }

    /* Select */
    .form-select-modern {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        padding-right: 42px;
    }

    /* Textarea */
    .form-control-modern.textarea {
        min-height: 100px;
        padding-top: 13px;
        resize: vertical;
        vertical-align: top;
    }

    /* Error text */
    .invalid-feedback-modern {
        font-size: 12px;
        color: var(--danger);
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 2px;
    }
    .hint-text {
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* ─── Status Toggle ─── */
    .status-toggle-card {
        background: var(--surface-2);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        padding: 16px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: border-color .2s, background .2s;
        cursor: pointer;
        user-select: none;
    }
    .status-toggle-card:hover {
        border-color: var(--primary);
        background: var(--primary-light);
    }
    .status-toggle-card .toggle-info { flex: 1; }
    .status-toggle-card .toggle-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .status-toggle-card .toggle-desc {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 3px;
    }

    /* iOS-style switch */
    .toggle-switch {
        position: relative;
        width: 48px; height: 26px;
        flex-shrink: 0;
    }
    .toggle-switch input { display: none; }
    .toggle-track {
        position: absolute;
        inset: 0;
        background: #cbd5e1;
        border-radius: 13px;
        transition: background .3s;
        cursor: pointer;
    }
    .toggle-track::after {
        content: '';
        position: absolute;
        width: 20px; height: 20px;
        background: #fff;
        border-radius: 50%;
        top: 3px; left: 3px;
        transition: transform .3s;
        box-shadow: 0 1px 4px rgba(0,0,0,.2);
    }
    .toggle-switch input:checked + .toggle-track { background: var(--success); }
    .toggle-switch input:checked + .toggle-track::after { transform: translateX(22px); }

    /* ─── Bidang Option Cards ─── */
    .bidang-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
    .bidang-option {
        position: relative;
        cursor: pointer;
    }
    .bidang-option input[type="radio"] { display: none; }
    .bidang-option-label {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 15px;
        background: var(--surface-2);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 500;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all .2s;
    }
    .bidang-option-label:hover {
        border-color: var(--primary);
        background: var(--primary-light);
        color: var(--primary);
    }
    .bidang-option input:checked + .bidang-option-label {
        border-color: var(--primary);
        background: var(--primary-light);
        color: var(--primary);
        box-shadow: 0 0 0 3px rgba(26,86,219,.08);
    }
    .bidang-check {
        width: 18px; height: 18px;
        border-radius: 50%;
        border: 2px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        transition: all .2s;
    }
    .bidang-option input:checked + .bidang-option-label .bidang-check {
        background: var(--primary);
        border-color: var(--primary);
    }
    .bidang-check-inner {
        width: 7px; height: 7px;
        background: #fff;
        border-radius: 50%;
        opacity: 0;
        transition: opacity .2s;
    }
    .bidang-option input:checked + .bidang-option-label .bidang-check-inner { opacity: 1; }
    .bidang-icon {
        width: 28px; height: 28px;
        border-radius: 6px;
        display: flex; align-items: center; justify-content: center;
        background: rgba(26,86,219,.1);
        color: var(--primary);
        flex-shrink: 0;
    }

    /* ─── Divider ─── */
    .form-divider {
        border: none;
        border-top: 1px dashed var(--border);
        margin: 28px 0;
    }

    /* ─── Footer Actions ─── */
    .form-footer {
        background: var(--surface-2);
        border-top: 1px solid var(--border);
        padding: 22px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }
    .footer-note {
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .footer-actions { display: flex; gap: 12px; align-items: center; }

    /* Buttons */
    .btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 22px;
        border-radius: var(--radius-sm);
        font-size: 14px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        border: none;
        outline: none;
        transition: all .2s;
        text-decoration: none;
        line-height: 1;
    }
    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: #fff;
        box-shadow: 0 4px 14px rgba(26,86,219,.35);
    }
    .btn-primary-modern:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26,86,219,.45);
        color: #fff;
    }
    .btn-primary-modern:active { transform: translateY(0); }
    .btn-ghost-modern {
        background: var(--surface);
        color: var(--text-secondary);
        border: 1.5px solid var(--border);
    }
    .btn-ghost-modern:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: var(--primary-light);
    }
    .btn-reset-modern {
        background: transparent;
        color: var(--text-muted);
        font-size: 13px;
        padding: 11px 16px;
    }
    .btn-reset-modern:hover { color: var(--danger); }

    /* Button spinner */
    .btn-spinner {
        display: none;
        width: 16px; height: 16px;
        border: 2px solid rgba(255,255,255,.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin .7s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* ─── Info sidebar card ─── */
    .info-sidebar {
        background: linear-gradient(135deg, #eef2ff, #f0f9ff);
        border: 1px solid #c7d7f9;
        border-radius: var(--radius-sm);
        padding: 18px;
        margin-top: 24px;
    }
    .info-sidebar-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 12px;
    }
    .info-list {
        list-style: none;
        padding: 0; margin: 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .info-list li {
        font-size: 12.5px;
        color: #374151;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        line-height: 1.5;
    }
    .info-list li::before {
        content: '';
        width: 6px; height: 6px;
        background: var(--primary);
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 5px;
    }

    /* ─── Responsive ─── */
    @media (max-width: 768px) {
        .page-hero { padding: 28px 20px 70px; }
        .hero-body { flex-direction: column; gap: 16px; }
        .hero-badge-group { display: none; }
        .form-container { padding: 0 12px; }
        .form-body { padding: 24px 20px 20px; }
        .form-grid-2 { grid-template-columns: 1fr; }
        .bidang-grid { grid-template-columns: 1fr; }
        .form-footer { flex-direction: column; align-items: stretch; padding: 18px 20px; }
        .footer-actions { flex-direction: column-reverse; }
        .btn-modern { justify-content: center; }
        .form-steps-bar { padding: 14px 20px; }
        .step-label { display: none; }
    }

    /* ─── Fade-in animation ─── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .form-card {
        animation: fadeUp .45s cubic-bezier(.22,1,.36,1) both;
    }
</style>

<div class="create-page-wrapper">

    {{-- ── HERO HEADER ── --}}
    <div class="page-hero">
        <div class="hero-dots">
            @for($i=0;$i<20;$i++) <span></span> @endfor
        </div>

        <div class="hero-breadcrumb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <span class="sep">›</span>
            <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
            <span class="sep">›</span>
            <span>Tambah Pegawai</span>
        </div>

        <div class="hero-body">
            <div style="display:flex; align-items:center; gap:18px;">
                <div class="hero-icon-wrap">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <line x1="19" y1="8" x2="19" y2="14"/>
                        <line x1="22" y1="11" x2="16" y2="11"/>
                    </svg>
                </div>
                <div class="hero-text">
                    <h1>Tambah Pegawai Baru</h1>
                    <p>Isi formulir di bawah untuk mendaftarkan pegawai ke sistem BKPSDM OKU Timur</p>
                </div>
            </div>
            <div class="hero-badge-group">
                <div class="hero-badge">
                    <span class="dot"></span>
                    Sistem Aktif
                </div>
                <div class="hero-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Data Aman
                </div>
            </div>
        </div>
    </div>

    {{-- ── MAIN FORM CONTAINER ── --}}
    <div class="form-container">
        <div class="form-card">

            {{-- Step Bar --}}
            <div class="form-steps-bar">
                <div class="step-item">
                    <div class="step-circle active">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div>
                        <div class="step-label active">Identitas</div>
                    </div>
                </div>
                <div class="step-connector"></div>
                <div class="step-item">
                    <div class="step-circle inactive">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    </div>
                    <div>
                        <div class="step-label">Bidang</div>
                    </div>
                </div>
                <div class="step-connector"></div>
                <div class="step-item">
                    <div class="step-circle inactive">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <div>
                        <div class="step-label">Konfirmasi</div>
                    </div>
                </div>
            </div>

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Alert Error --}}
                @if ($errors->any())
                <div class="alert-modern error">
                    <div class="alert-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </div>
                    <div>
                        <strong style="display:block; margin-bottom:4px;">Terdapat {{ $errors->count() }} kesalahan pada formulir</strong>
                        <ul style="margin:0; padding-left:18px; font-size:13px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Alert Success --}}
                @if(session('success'))
                <div class="alert-modern success">
                    <div class="alert-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <form action="{{ route('pegawai.store') }}" method="POST" id="formPegawai" novalidate>
                    @csrf

                    {{-- ── SECTION 1: IDENTITAS PEGAWAI ── --}}
                    <div class="section-header">
                        <div class="section-icon blue">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div>
                            <div class="section-title">Identitas Pegawai</div>
                            <div class="section-subtitle">Informasi dasar dan nomor identifikasi pegawai</div>
                        </div>
                    </div>

                    <div class="form-grid form-grid-2">
                        {{-- Nama Lengkap --}}
                        <div class="form-group" style="grid-column: span 2;">
                            <label class="form-label">
                                <span class="label-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </span>
                                Nama Lengkap
                                <span class="required-badge">Wajib</span>
                            </label>
                            <div class="input-wrapper">
                                <svg class="input-prefix-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <input
                                    type="text"
                                    name="nama"
                                    id="nama"
                                    class="form-control-modern {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                    placeholder="Contoh: Drs. Ahmad Fauzi, M.Si"
                                    value="{{ old('nama') }}"
                                    autocomplete="off"
                                >
                            </div>
                            @error('nama')
                            <span class="invalid-feedback-modern">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        {{-- NIP --}}
                        <div class="form-group">
                            <label class="form-label">
                                <span class="label-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                                </span>
                                Nomor Induk Pegawai (NIP)
                                <span class="optional-badge">Opsional</span>
                            </label>
                            <div class="input-wrapper">
                                <svg class="input-prefix-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                                <input
                                    type="text"
                                    name="nip"
                                    id="nip"
                                    class="form-control-modern {{ $errors->has('nip') ? 'is-invalid' : '' }}"
                                    placeholder="Contoh: 199001012015031001"
                                    value="{{ old('nip') }}"
                                    maxlength="20"
                                    autocomplete="off"
                                >
                            </div>
                            @error('nip')
                            <span class="invalid-feedback-modern">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </span>
                            @enderror
                            <span class="hint-text">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                Kosongkan jika NIP belum tersedia
                            </span>
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <label class="form-label">
                                <span class="label-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                </span>
                                Status Kepegawaian
                            </label>
                            <label class="status-toggle-card" for="status-toggle">
                                <div class="toggle-info">
                                    <div class="toggle-title">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                        <span id="status-label">Pegawai Aktif</span>
                                    </div>
                                    <div class="toggle-desc" id="status-desc">Pegawai akan tercatat sebagai aktif dalam sistem</div>
                                </div>
                                <label class="toggle-switch" onclick="event.stopPropagation()">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" id="status-toggle" name="status" value="1" checked>
                                    <span class="toggle-track"></span>
                                </label>
                            </label>
                        </div>
                    </div>

                    <hr class="form-divider">

                    {{-- ── SECTION 2: BIDANG / UNIT KERJA ── --}}
                    <div class="section-header">
                        <div class="section-icon green">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <div>
                            <div class="section-title">Bidang / Unit Kerja</div>
                            <div class="section-subtitle">Penempatan unit kerja pegawai</div>
                        </div>
                    </div>

                    <div class="form-grid form-grid-1">
                        {{-- Bidang --}}
                        <div class="form-group">
                            <label class="form-label">
                                <span class="label-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                </span>
                                Unit Bidang / Divisi
                                <span class="required-badge">Wajib</span>
                            </label>

                            {{-- Option Cards for Bidang --}}
                            @php
                            $bidangIcons = [
                                'Kepala Badan' => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>',
                                'Sekretaris' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
                                'Bidang Pengadaan, Pemberhentian dan Informasi' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                                'Bidang Mutasi dan Promosi' => '<polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/>',
                                'Bidang Pengembangan Kompetensi Aparatur' => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
                                'Bidang Penilaian Kerja' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
                            ];
                            @endphp

                            <div class="bidang-grid">
                                @foreach($bidangOptions as $index => $option)
                                <label class="bidang-option">
                                    <input
                                        type="radio"
                                        name="bidang"
                                        value="{{ $option }}"
                                        {{ old('bidang') === $option ? 'checked' : ($index === 0 && !old('bidang') ? '' : '') }}
                                    >
                                    <div class="bidang-option-label">
                                        <div class="bidang-icon">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                {!! $bidangIcons[$option] ?? '<circle cx="12" cy="12" r="10"/>' !!}
                                            </svg>
                                        </div>
                                        <span style="flex:1; line-height:1.4;">{{ $option }}</span>
                                        <div class="bidang-check">
                                            <span class="bidang-check-inner"></span>
                                        </div>
                                    </div>
                                </label>
                                @endforeach
                            </div>

                            @error('bidang')
                            <span class="invalid-feedback-modern">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Info Box --}}
                    <div class="info-sidebar">
                        <div class="info-sidebar-title">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                            Panduan Pengisian Formulir
                        </div>
                        <ul class="info-list">
                            <li>Nama lengkap harus sesuai dengan dokumen resmi kepegawaian.</li>
                            <li>NIP bersifat unik — pastikan tidak terjadi duplikasi data.</li>
                            <li>Pilih bidang yang sesuai dengan penempatan unit kerja pegawai.</li>
                            <li>Data dapat diubah sewaktu-waktu melalui menu edit pegawai.</li>
                        </ul>
                    </div>

                </form>
            </div>{{-- /form-body --}}

            {{-- Form Footer --}}
            <div class="form-footer">
                <div class="footer-note">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Data disimpan dengan enkripsi SSL
                </div>
                <div class="footer-actions">
                    <button type="button" class="btn-modern btn-reset-modern" onclick="resetForm()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.41"/></svg>
                        Reset
                    </button>
                    <a href="{{ route('pegawai.index') }}" class="btn-modern btn-ghost-modern">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                        Kembali
                    </a>
                    <button type="submit" form="formPegawai" class="btn-modern btn-primary-modern" id="submitBtn">
                        <span class="btn-spinner" id="spinner"></span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" id="submitIcon"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Simpan Pegawai
                    </button>
                </div>
            </div>

        </div>{{-- /form-card --}}
    </div>{{-- /form-container --}}

</div>{{-- /create-page-wrapper --}}

<script>
    // Status Toggle Label
    const statusToggle = document.getElementById('status-toggle');
    const statusLabel  = document.getElementById('status-label');
    const statusDesc   = document.getElementById('status-desc');

    statusToggle.addEventListener('change', function () {
        if (this.checked) {
            statusLabel.textContent = 'Pegawai Aktif';
            statusDesc.textContent  = 'Pegawai akan tercatat sebagai aktif dalam sistem';
        } else {
            statusLabel.textContent = 'Pegawai Tidak Aktif';
            statusDesc.textContent  = 'Pegawai tidak akan muncul di daftar pegawai aktif';
        }
    });

    // Submit Spinner
    document.getElementById('formPegawai').addEventListener('submit', function () {
        const btn     = document.getElementById('submitBtn');
        const spinner = document.getElementById('spinner');
        const icon    = document.getElementById('submitIcon');
        btn.disabled  = true;
        spinner.style.display = 'block';
        icon.style.display    = 'none';
        btn.querySelector('span:last-child') && (btn.querySelector('span:last-child').textContent = 'Menyimpan...');
    });

    // Reset Form
    function resetForm() {
        if (confirm('Reset semua isian formulir?')) {
            document.getElementById('formPegawai').reset();
            statusLabel.textContent = 'Pegawai Aktif';
            statusDesc.textContent  = 'Pegawai akan tercatat sebagai aktif dalam sistem';
        }
    }

    // NIP: only numbers
    document.getElementById('nip').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');
    });
</script>

@endsection