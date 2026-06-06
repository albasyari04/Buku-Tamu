{{-- resources/views/pegawai/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Pegawai - BKPSDM OKU TIMUR')

@section('content')
<style>
    /* Additional styles for show page */
    .detail-hero {
        background: linear-gradient(135deg, #0EA5E9 0%, #0284C7 45%, #0369A1 100%);
        padding: 28px 32px 80px;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 24px 24px;
        margin-bottom: -48px;
    }
    
    .detail-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .detail-hero-inner {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        position: relative;
        z-index: 1;
    }
    
    .detail-bread {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: rgba(255,255,255,.65);
        margin-bottom: 10px;
    }
    
    .detail-bread a {
        color: rgba(255,255,255,.85);
        text-decoration: none;
    }
    
    .detail-bread a:hover { color: #fff; }
    
    .detail-title {
        font-size: 30px;
        font-weight: 800;
        color: #fff;
        margin: 0 0 8px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .detail-title .ico-wrap {
        width: 44px;
        height: 44px;
        background: rgba(255,255,255,.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }
    
    .detail-sub {
        font-size: 14px;
        color: rgba(255,255,255,.75);
    }
    
    /* Content Area */
    .detail-content {
        padding: 0 32px 40px;
        position: relative;
        z-index: 2;
    }
    
    /* Stats Grid */
    .detail-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }
    
    @media (max-width: 992px) {
        .detail-stats { grid-template-columns: repeat(2, 1fr); }
    }
    
    @media (max-width: 600px) {
        .detail-stats { grid-template-columns: 1fr; }
    }
    
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 20px 22px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0,0,0,.05);
        transition: all .3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px -12px rgba(0,0,0,.15);
    }
    
    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }
    
    .stat-header span {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #94a3b8;
    }
    
    .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }
    
    .icon-sky { background: linear-gradient(135deg, #0EA5E9, #0284C7); }
    .icon-green { background: linear-gradient(135deg, #10B981, #059669); }
    .icon-amber { background: linear-gradient(135deg, #F59E0B, #D97706); }
    .icon-purple { background: linear-gradient(135deg, #8B5CF6, #7C3AED); }
    
    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.2;
    }
    
    .stat-label {
        font-size: 12px;
        color: #64748b;
        margin-top: 6px;
    }
    
    /* Profile Card */
    .profile-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0,0,0,.1);
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        padding: 20px 28px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .profile-header i {
        font-size: 24px;
        color: #0EA5E9;
    }
    
    .profile-header h3 {
        color: white;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }
    
    .profile-body {
        padding: 28px;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
    
    @media (max-width: 768px) {
        .info-grid { grid-template-columns: 1fr; }
    }
    
    .info-item {
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 14px;
    }
    
    .info-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #94a3b8;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .info-label i {
        width: 20px;
        color: #0EA5E9;
        font-size: 13px;
    }
    
    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: #0f172a;
        margin-left: 28px;
    }
    
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
    }
    
    .badge-active {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #86efac;
    }
    
    .badge-inactive {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }
    
    .action-buttons {
        display: flex;
        gap: 16px;
        margin-top: 28px;
        padding-top: 24px;
        border-top: 1px solid #e2e8f0;
    }
    
    @media (max-width: 640px) {
        .action-buttons { flex-wrap: wrap; }
        .action-buttons .btn { flex: 1; justify-content: center; }
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        transition: all .2s ease;
        cursor: pointer;
        border: none;
        text-decoration: none;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0EA5E9, #0284C7);
        color: white;
        box-shadow: 0 2px 8px rgba(14,165,233,.3);
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(14,165,233,.4);
    }
    
    .btn-secondary {
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #e2e8f0;
    }
    
    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }
    
    .btn-danger {
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
    }
    
    .btn-danger:hover {
        background: #fee2e2;
        border-color: #fca5a5;
    }
    
    /* Alert */
    .alert-custom {
        padding: 14px 20px;
        border-radius: 16px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
    }
    
    .alert-success-custom {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
    }
    
    .alert-error-custom {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }
</style>

<div class="pg-peg">
    <!-- Hero Banner -->
    <div class="detail-hero">
        <div class="detail-hero-inner">
            <div class="detail-left">
                <div class="detail-bread">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <span style="color: white;">Detail Pegawai</span>
                </div>
                <h1 class="detail-title">
                    <div class="ico-wrap"><i class="fas fa-user-circle"></i></div>
                    Detail Profil Pegawai
                </h1>
                <p class="detail-sub">
                    <i class="fas fa-info-circle"></i>
                    Informasi lengkap data pegawai BKPSDM OKU Timur
                </p>
            </div>
            <div class="detail-right">
                <a href="{{ route('pegawai.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,.15); padding: 10px 20px; border-radius: 12px; color: white; text-decoration: none; font-weight: 600;">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Content Area -->
    <div class="detail-content">
        
        <!-- Flash Messages -->
        @if(session('success'))
        <div class="alert-custom alert-success-custom">
            <i class="fas fa-check-circle fa-lg"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert-custom alert-error-custom">
            <i class="fas fa-exclamation-triangle fa-lg"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        <!-- Statistics Cards - Data sekarang sinkron dengan index -->
        <div class="detail-stats">
            <div class="stat-card">
                <div class="stat-header">
                    <span>TOTAL PEGAWAI</span>
                    <div class="stat-icon icon-sky"><i class="fas fa-users"></i></div>
                </div>
                <div class="stat-number">{{ number_format($totalPegawai, 0, ',', '.') }}</div>
                <div class="stat-label">Pegawai dengan status aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span>TOTAL BIDANG</span>
                    <div class="stat-icon icon-green"><i class="fas fa-building"></i></div>
                </div>
                <div class="stat-number">{{ number_format($totalBidang, 0, ',', '.') }}</div>
                <div class="stat-label">Bidang / unit kerja terdaftar</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span>STATUS</span>
                    <div class="stat-icon icon-purple"><i class="fas fa-check-circle"></i></div>
                </div>
                <div class="stat-number">
                    @if($pegawai->status)
                        <span class="badge-status badge-active">
                            <i class="fas fa-circle" style="font-size: 8px;"></i> AKTIF
                        </span>
                    @else
                        <span class="badge-status badge-inactive">
                            <i class="fas fa-circle" style="font-size: 8px;"></i> NON-AKTIF
                        </span>
                    @endif
                </div>
                <div class="stat-label">Status kepegawaian</div>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="profile-card">
            <div class="profile-header">
                <i class="fas fa-id-card"></i>
                <h3>Informasi Pegawai</h3>
            </div>
            <div class="profile-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-user"></i>
                            Nama Lengkap
                        </div>
                        <div class="info-value">{{ $pegawai->nama }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-id-badge"></i>
                            NIP
                        </div>
                        <div class="info-value">{{ $pegawai->nip ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-building"></i>
                            Bidang / Unit Kerja
                        </div>
                        <div class="info-value">{{ $pegawai->bidang }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal Dibuat
                        </div>
                        <div class="info-value">{{ $pegawai->created_at ? $pegawai->created_at->isoFormat('DD MMMM YYYY, HH:mm') : '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-clock"></i>
                            Terakhir Diupdate
                        </div>
                        <div class="info-value">{{ $pegawai->updated_at ? $pegawai->updated_at->isoFormat('DD MMMM YYYY, HH:mm') : '-' }}</div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                    <button type="button" class="btn btn-secondary" onclick="window.print()">
                        <i class="fas fa-print"></i> Cetak Profil
                    </button>
                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menonaktifkan pegawai ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Nonaktifkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection