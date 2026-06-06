@extends('layouts.user')

@section('title', 'Isi Buku Tamu — BKPSDM OKU Timur')

@push('styles')
<style>
    /* ============================================
       FORM PAGE — PROFESSIONAL ELEGANT REDESIGN
    ============================================ */

    .form-page-wrapper {
        min-height: calc(100vh - 64px - 52px);
        background: #F4F5FA;
        padding: 2rem 1.5rem 3rem;
    }

    /* ── Layout grid ── */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 1.5rem;
        max-width: 1100px;
        margin: 0 auto;
    }
    @media (max-width: 960px) {
        .form-grid { grid-template-columns: 1fr; }
    }

    /* ============================================
       MAIN CARD
    ============================================ */
    .form-main-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(79,70,229,.07), 0 1px 4px rgba(0,0,0,.05);
        overflow: hidden;
    }

    /* ── Card Header ── */
    .form-card-header {
        padding: 2rem 2.5rem 1.5rem;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1.5rem;
        border-bottom: 1px solid #F1F5F9;
        position: relative;
    }

    .form-header-left { flex: 1; min-width: 0; }

    .form-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: #EEF2FF;
        color: #4F46E5;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        letter-spacing: 0.03em;
        margin-bottom: 0.75rem;
    }

    .form-title {
        font-family: var(--font-heading);
        font-size: 1.55rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 0.35rem;
        line-height: 1.25;
    }

    .form-subtitle {
        font-size: 0.82rem;
        color: #64748B;
        line-height: 1.5;
        max-width: 420px;
    }

    /* Illustration area */
    .form-header-illus {
        flex-shrink: 0;
        width: 130px;
        height: 110px;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #EEF2FF;
    }
    .form-header-illus img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn-back-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        color: #64748B;
        font-size: 0.78rem;
        font-weight: 600;
        padding: 0.4rem 0.9rem;
        border-radius: 20px;
        text-decoration: none;
        transition: all 0.18s ease;
        white-space: nowrap;
    }
    .btn-back-pill:hover {
        background: #EEF2FF;
        border-color: #C7D2FE;
        color: #4F46E5;
    }
    .btn-back-pill i { font-size: 0.7rem; }

    /* ── Card Body / Form ── */
    .form-card-body {
        padding: 2rem 2.5rem 2.5rem;
    }

    /* ── Custom form fields ── */
    .field-group {
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
    }

    .field-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #334155;
        letter-spacing: 0.02em;
    }
    .field-label .req { color: #EF4444; margin-left: 2px; }

    .field-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .field-icon {
        position: absolute;
        left: 0.9rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94A3B8;
        font-size: 0.85rem;
        pointer-events: none;
        z-index: 2;
        transition: color 0.18s;
    }

    .field-wrap textarea ~ .field-icon,
    .field-wrap:has(textarea) .field-icon {
        top: 0.85rem;
        transform: none;
    }

    .form-field {
        width: 100%;
        padding: 0.65rem 0.9rem 0.65rem 2.5rem;
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        font-family: var(--font-body);
        font-size: 0.85rem;
        color: #0F172A;
        background: #FAFBFD;
        transition: all 0.18s ease;
        outline: none;
        -webkit-appearance: none;
        appearance: none;
    }
    .form-field::placeholder { color: #CBD5E1; }
    .form-field:focus {
        border-color: #4F46E5;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(79,70,229,.12);
    }
    .form-field:focus ~ .field-icon,
    .field-wrap:focus-within .field-icon { color: #4F46E5; }
    .form-field.is-invalid {
        border-color: #EF4444;
        background: #FFF5F5;
    }
    .form-field.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(239,68,68,.12);
    }

    textarea.form-field {
        resize: vertical;
        min-height: 90px;
        padding-top: 0.65rem;
    }

    select.form-field {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.85rem center;
        padding-right: 2.2rem;
        cursor: pointer;
    }

    .invalid-msg {
        font-size: 0.74rem;
        color: #EF4444;
        margin-top: 0.2rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    /* ── Form grid ── */
    .fields-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }
    .fields-grid .col-full { grid-column: 1 / -1; }
    @media (max-width: 600px) {
        .fields-grid { grid-template-columns: 1fr; }
        .fields-grid .col-full { grid-column: 1; }
    }

    /* ── Privacy notice ── */
    .privacy-notice {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        background: linear-gradient(135deg, #EEF2FF 0%, #F0F9FF 100%);
        border: 1px solid #C7D2FE;
        border-radius: 12px;
        padding: 0.9rem 1rem;
        margin-top: 0.25rem;
    }
    .privacy-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #4F46E5;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .privacy-text strong {
        font-size: 0.78rem;
        color: #3730A3;
        display: block;
        margin-bottom: 0.15rem;
    }
    .privacy-text span {
        font-size: 0.74rem;
        color: #4F46E5;
        line-height: 1.45;
    }

    /* ── Submit area ── */
    .form-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 1.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid #F1F5F9;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
        color: #fff;
        font-size: 0.875rem;
        font-weight: 700;
        padding: 0.72rem 2rem;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: all 0.22s ease;
        box-shadow: 0 4px 16px rgba(79,70,229,.35);
        letter-spacing: 0.01em;
        width: 100%;
        justify-content: center;
    }
    .btn-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 24px rgba(79,70,229,.4);
    }
    .btn-submit:active { transform: translateY(0); }
    .btn-submit i { font-size: 0.8rem; }

    .btn-cancel-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        color: #94A3B8;
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.18s;
        white-space: nowrap;
    }
    .btn-cancel-link:hover { color: #475569; }

    /* ============================================
       SIDEBAR CARD
    ============================================ */
    .sidebar-stack {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .info-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
        overflow: hidden;
    }

    .info-card-header {
        padding: 1.25rem 1.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.65rem;
    }
    .info-card-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #EEF2FF;
        color: #4F46E5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        flex-shrink: 0;
    }
    .info-card-title {
        font-family: var(--font-heading);
        font-size: 0.92rem;
        font-weight: 800;
        color: #0F172A;
    }

    .info-card-body { padding: 1rem 1.5rem 1.5rem; }

    /* Step list */
    .step-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-top: 0.5rem;
    }
    .step-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }
    .step-num {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4F46E5, #6366F1);
        color: #fff;
        font-size: 0.65rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .step-icon-colored {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        flex-shrink: 0;
    }
    .step-text strong {
        font-size: 0.8rem;
        color: #1E293B;
        display: block;
        font-weight: 700;
        margin-bottom: 0.1rem;
    }
    .step-text span {
        font-size: 0.74rem;
        color: #64748B;
        line-height: 1.4;
    }

    /* Office image card */
    .office-img-card {
        border-radius: 14px;
        overflow: hidden;
        margin-top: 0.75rem;
    }
    .office-img-card img {
        width: 100%;
        display: block;
        object-fit: cover;
    }

    /* Help card */
    .help-card {
        background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
        border-radius: 18px;
        padding: 1.25rem 1.5rem;
        color: #fff;
    }
    .help-card-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: rgba(255,255,255,.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        margin-bottom: 0.75rem;
    }
    .help-card-title {
        font-family: var(--font-heading);
        font-size: 0.92rem;
        font-weight: 800;
        margin-bottom: 0.3rem;
    }
    .help-card-sub {
        font-size: 0.76rem;
        opacity: 0.85;
        line-height: 1.45;
        margin-bottom: 0.9rem;
    }
    .btn-help-white {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: #fff;
        color: #4F46E5;
        font-size: 0.77rem;
        font-weight: 700;
        padding: 0.45rem 1rem;
        border-radius: 20px;
        text-decoration: none;
        transition: all 0.18s;
    }
    .btn-help-white:hover {
        background: #EEF2FF;
        color: #4338CA;
    }

    /* ── Fade-in animation ── */
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .form-main-card { animation: slideUp 0.4s ease both; }
    .sidebar-stack  { animation: slideUp 0.4s ease 0.08s both; }

    /* ── Focus label enhancement ── */
    .field-wrap:focus-within .field-label { color: #4F46E5; }
</style>
@endpush

@section('content')
<div class="form-page-wrapper">
    <div class="form-grid">

        {{-- ════════════════════════════
             MAIN FORM CARD
        ════════════════════════════ --}}
        <div class="form-main-card">

            {{-- Header --}}
            <div class="form-card-header">
                <div class="form-header-left">
                    <div class="form-badge">
                        <i class="fas fa-pen-to-square"></i>
                        Form Kunjungan Tamu
                    </div>
                    <h1 class="form-title">Isi data kunjungan Anda</h1>
                    <p class="form-subtitle">Silakan isi seluruh kolom dengan benar agar petugas dapat memproses kunjungan Anda.</p>
                </div>

                <div style="display:flex;flex-direction:column;align-items:flex-end;gap:.75rem;flex-shrink:0;">
                    <a href="{{ route('user.dashboard') }}" class="btn-back-pill">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <div class="form-header-illus d-none d-md-flex">
                        <img src="{{ asset('images/from.png') }}" alt="Form Illustration">
                    </div>
                </div>
            </div>

            {{-- Form body --}}
            <div class="form-card-body">
                <form action="{{ route('user.simpan') }}" method="POST">
                    @csrf

                    <div class="fields-grid">

                        {{-- Nama Lengkap --}}
                        <div class="field-group">
                            <label class="field-label" for="nama">Nama Lengkap <span class="req">*</span></label>
                            <div class="field-wrap">
                                <i class="fas fa-user field-icon"></i>
                                <input type="text"
                                       class="form-field @error('nama') is-invalid @enderror"
                                       id="nama" name="nama"
                                       value="{{ old('nama', $user->name) }}"
                                       placeholder="Masukkan nama lengkap Anda"
                                       required>
                            </div>
                            @error('nama')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- NIP / NIK --}}
                        <div class="field-group">
                            <label class="field-label" for="nip_nik">NIP / NIK <span class="req">*</span></label>
                            <div class="field-wrap">
                                <i class="fas fa-id-card field-icon"></i>
                                <input type="text"
                                       class="form-field @error('nip_nik') is-invalid @enderror"
                                       id="nip_nik" name="nip_nik"
                                       value="{{ old('nip_nik') }}"
                                       placeholder="Masukkan NIP atau NIK Anda"
                                       required>
                            </div>
                            @error('nip_nik')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nomor HP --}}
                        <div class="field-group">
                            <label class="field-label" for="no_hp">Nomor HP</label>
                            <div class="field-wrap">
                                <i class="fas fa-phone field-icon"></i>
                                <input type="text"
                                       class="form-field @error('no_hp') is-invalid @enderror"
                                       id="no_hp" name="no_hp"
                                       value="{{ old('no_hp') }}"
                                       placeholder="08xxxxxxxxxx">
                            </div>
                            @error('no_hp')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal Kunjungan --}}
                        <div class="field-group">
                            <label class="field-label" for="tanggal_kunjungan">Tanggal Kunjungan</label>
                            <div class="field-wrap">
                                <i class="fas fa-calendar-days field-icon"></i>
                                <input type="datetime-local"
                                       class="form-field @error('tanggal_kunjungan') is-invalid @enderror"
                                       id="tanggal_kunjungan" name="tanggal_kunjungan"
                                       value="{{ old('tanggal_kunjungan') }}">
                            </div>
                            @error('tanggal_kunjungan')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Instansi / Perusahaan --}}
                        <div class="field-group col-full">
                            <label class="field-label" for="instansi">Instansi / Perusahaan <span class="req">*</span></label>
                            <div class="field-wrap">
                                <i class="fas fa-building field-icon"></i>
                                <input type="text"
                                       class="form-field @error('instansi') is-invalid @enderror"
                                       id="instansi" name="instansi"
                                       value="{{ old('instansi') }}"
                                       placeholder="Masukkan instansi atau perusahaan Anda"
                                       required>
                            </div>
                            @error('instansi')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bertemu Dengan --}}
                        <div class="field-group">
                            <label class="field-label" for="bertemu_dengan">Bertemu Dengan <span class="req">*</span></label>
                            <div class="field-wrap">
                                <i class="fas fa-user-tie field-icon"></i>
                                <select class="form-field @error('bertemu_dengan') is-invalid @enderror"
                                        id="bertemu_dengan" name="bertemu_dengan" required>
                                    <option value="">-- Pilih pegawai --</option>
                                    @foreach($bertemu_dengan as $item)
                                        <option value="{{ $item }}" {{ old('bertemu_dengan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('bertemu_dengan')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Perihal / Keperluan --}}
                        <div class="field-group">
                            <label class="field-label" for="perihal">Perihal / Keperluan <span class="req">*</span></label>
                            <div class="field-wrap">
                                <i class="fas fa-file-lines field-icon"></i>
                                <select class="form-field @error('perihal') is-invalid @enderror"
                                        id="perihal" name="perihal" required>
                                    <option value="">-- Pilih keperluan --</option>
                                    @foreach($perihal_options as $item)
                                        <option value="{{ $item }}" {{ old('perihal') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('perihal')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="field-group col-full">
                            <label class="field-label" for="alamat">Alamat Lengkap <span class="req">*</span></label>
                            <div class="field-wrap" style="align-items:flex-start;">
                                <i class="fas fa-map-marker-alt field-icon" style="top:0.85rem;transform:none;"></i>
                                <textarea class="form-field @error('alamat') is-invalid @enderror"
                                          id="alamat" name="alamat"
                                          rows="3"
                                          placeholder="Masukkan alamat lengkap Anda"
                                          required>{{ old('alamat') }}</textarea>
                            </div>
                            @error('alamat')
                                <div class="invalid-msg"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div>
                            @enderror
                        </div>

                    </div>{{-- /.fields-grid --}}

                    {{-- Privacy notice --}}
                    <div class="privacy-notice mt-4">
                        <div class="privacy-icon">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <div class="privacy-text">
                            <strong>Kerahasiaan data terjamin</strong>
                            <span>Data yang Anda isi akan kami jaga kerahasiaannya dan hanya digunakan untuk keperluan administrasi kunjungan.</span>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-paper-plane"></i>
                            Simpan Data Kunjungan
                        </button>
                    </div>

                    <div style="text-align:center;margin-top:.75rem;">
                        <a href="{{ route('user.dashboard') }}" class="btn-cancel-link">
                            <i class="fas fa-times" style="font-size:.7rem;"></i> Batal
                        </a>
                    </div>

                </form>
            </div>{{-- /.form-card-body --}}

        </div>{{-- /.form-main-card --}}


        {{-- ════════════════════════════
             SIDEBAR
        ════════════════════════════ --}}
        <div class="sidebar-stack">

            {{-- Petunjuk pengisian --}}
            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-card-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="info-card-title">Petunjuk pengisian</div>
                </div>
                <div class="info-card-body">

                    <div class="step-list">
                        <div class="step-item">
                            <div class="step-icon-colored" style="background:#EEF2FF;">
                                <i class="fas fa-user-check" style="color:#4F46E5;font-size:.75rem;"></i>
                            </div>
                            <div class="step-text">
                                <strong>Isi nama dan NIP/NIK dengan benar.</strong>
                                <span>Pastikan sesuai identitas resmi Anda.</span>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-icon-colored" style="background:#F0FDF4;">
                                <i class="fas fa-users" style="color:#10B981;font-size:.75rem;"></i>
                            </div>
                            <div class="step-text">
                                <strong>Pilih pegawai yang dituju</strong>
                                <span>di bagian "Bertemu Dengan".</span>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-icon-colored" style="background:#FFFBEB;">
                                <i class="fas fa-file-pen" style="color:#F59E0B;font-size:.75rem;"></i>
                            </div>
                            <div class="step-text">
                                <strong>Tuliskan keperluan kunjungan</strong>
                                <span>secara jelas dan singkat.</span>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-icon-colored" style="background:#FFF1F2;">
                                <i class="fas fa-calendar-check" style="color:#F43F5E;font-size:.75rem;"></i>
                            </div>
                            <div class="step-text">
                                <strong>Jika tanggal kosong,</strong>
                                <span>sistem akan memakai tanggal saat ini.</span>
                            </div>
                        </div>
                    </div>

                    {{-- Gedung image --}}
                    <div class="office-img-card">
                        <img src="{{ asset('images/from.png') }}" alt="BKPSDM" style="border-radius:12px;max-height:150px;">
                    </div>

                </div>
            </div>{{-- /.info-card --}}

            {{-- Help card --}}
            <div class="help-card">
                <div class="help-card-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="help-card-title">Butuh bantuan?</div>
                <div class="help-card-sub">Tim kami siap membantu Anda jika mengalami kendala dalam pengisian form.</div>
                <a href="#" class="btn-help-white">
                    Hubungi kami <i class="fas fa-arrow-right" style="font-size:.7rem;"></i>
                </a>
            </div>

        </div>{{-- /.sidebar-stack --}}

    </div>{{-- /.form-grid --}}
</div>
@endsection