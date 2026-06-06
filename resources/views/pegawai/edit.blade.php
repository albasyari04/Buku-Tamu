{{-- resources/views/pegawai/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Pegawai - BKPSDM OKU TIMUR')

@section('content')
<style>
    /* Additional styles for edit page */
    .edit-hero {
        background: linear-gradient(135deg, #0EA5E9 0%, #0284C7 45%, #0369A1 100%);
        padding: 28px 32px 80px;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 24px 24px;
        margin-bottom: -48px;
    }
    
    .edit-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .edit-hero-inner {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        position: relative;
        z-index: 1;
    }
    
    .edit-bread {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: rgba(255,255,255,.65);
        margin-bottom: 10px;
    }
    
    .edit-bread a {
        color: rgba(255,255,255,.85);
        text-decoration: none;
    }
    
    .edit-bread a:hover { color: #fff; }
    
    .edit-title {
        font-size: 30px;
        font-weight: 800;
        color: #fff;
        margin: 0 0 8px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .edit-title .ico-wrap {
        width: 44px;
        height: 44px;
        background: rgba(255,255,255,.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }
    
    .edit-sub {
        font-size: 14px;
        color: rgba(255,255,255,.75);
    }
    
    /* Content Area */
    .edit-content {
        padding: 0 32px 40px;
        position: relative;
        z-index: 2;
    }
    
    /* Form Card */
    .form-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0,0,0,.1);
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }
    
    .form-header {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        padding: 20px 28px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .form-header i {
        font-size: 24px;
        color: #0EA5E9;
    }
    
    .form-header h3 {
        color: white;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }
    
    .form-body {
        padding: 32px 28px;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 28px;
    }
    
    @media (max-width: 768px) {
        .form-grid { grid-template-columns: 1fr; }
    }
    
    .form-group {
        margin-bottom: 8px;
    }
    
    .form-label {
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-label i {
        width: 20px;
        color: #0EA5E9;
        font-size: 13px;
    }
    
    .required-star {
        color: #ef4444;
        margin-left: 4px;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 16px;
        font-size: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        background: #f8fafc;
        transition: all .2s ease;
        color: #0f172a;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #0EA5E9;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(14,165,233,.1);
    }
    
    .form-control.is-invalid {
        border-color: #ef4444;
        background: #fef2f2;
    }
    
    .invalid-feedback {
        font-size: 11px;
        color: #ef4444;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .invalid-feedback i {
        font-size: 10px;
    }
    
    .form-text {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    /* Select Custom */
    select.form-control {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 18px;
    }
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 16px;
        margin-top: 32px;
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
        padding: 12px 28px;
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
    
    .alert-error-custom {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }
    
    /* Preview Card (Optional) */
    .preview-card {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 16px;
        padding: 20px;
        margin-top: 24px;
        border: 1px solid #e2e8f0;
    }
    
    .preview-title {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748b;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .preview-name {
        font-size: 18px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 8px;
    }
    
    .preview-info {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        font-size: 12px;
        color: #475569;
    }
    
    .preview-info span {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .preview-info i {
        color: #0EA5E9;
        font-size: 11px;
    }
</style>

<div class="pg-peg">
    <!-- Hero Banner -->
    <div class="edit-hero">
        <div class="edit-hero-inner">
            <div class="edit-left">
                <div class="edit-bread">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <span style="color: white;">Edit Pegawai</span>
                </div>
                <h1 class="edit-title">
                    <div class="ico-wrap"><i class="fas fa-pen"></i></div>
                    Edit Data Pegawai
                </h1>
                <p class="edit-sub">
                    <i class="fas fa-info-circle"></i>
                    Perbarui informasi pegawai BKPSDM OKU Timur
                </p>
            </div>
            <div class="edit-right">
                <a href="{{ route('pegawai.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,.15); padding: 10px 20px; border-radius: 12px; color: white; text-decoration: none; font-weight: 600;">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Content Area -->
    <div class="edit-content">
        
        <!-- Flash Messages -->
        @if($errors->any())
        <div class="alert-custom alert-error-custom">
            <i class="fas fa-exclamation-triangle fa-lg"></i>
            <div>
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 5px 0 0 20px; font-size: 13px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert-custom alert-error-custom">
            <i class="fas fa-exclamation-triangle fa-lg"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        <!-- Form Card -->
        <div class="form-card">
            <div class="form-header">
                <i class="fas fa-user-edit"></i>
                <h3>Formulir Edit Pegawai</h3>
            </div>
            
            <div class="form-body">
                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-grid">
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                Nama Lengkap <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="nama" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama', $pegawai->nama) }}"
                                   placeholder="Masukkan nama lengkap pegawai"
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- NIP -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-id-badge"></i>
                                NIP
                            </label>
                            <input type="text" 
                                   name="nip" 
                                   class="form-control @error('nip') is-invalid @enderror" 
                                   value="{{ old('nip', $pegawai->nip) }}"
                                   placeholder="Nomor Induk Pegawai (opsional)">
                            @error('nip')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i> NIP bersifat opsional, dapat dikosongkan
                            </div>
                        </div>
                        
                        <!-- Bidang / Unit Kerja -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-building"></i>
                                Bidang / Unit Kerja <span class="required-star">*</span>
                            </label>
                            <select name="bidang" class="form-control @error('bidang') is-invalid @enderror" required>
                                <option value="">-- Pilih Bidang --</option>
                                <option value="Kepala Badan" {{ old('bidang', $pegawai->bidang) == 'Kepala Badan' ? 'selected' : '' }}>Kepala Badan</option>
                                <option value="Sekretaris" {{ old('bidang', $pegawai->bidang) == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                <option value="Bidang Pengadaan, Pemberhentian dan Informasi" {{ old('bidang', $pegawai->bidang) == 'Bidang Pengadaan, Pemberhentian dan Informasi' ? 'selected' : '' }}>Bidang Pengadaan, Pemberhentian dan Informasi</option>
                                <option value="Bidang Mutasi dan Promosi" {{ old('bidang', $pegawai->bidang) == 'Bidang Mutasi dan Promosi' ? 'selected' : '' }}>Bidang Mutasi dan Promosi</option>
                                <option value="Bidang Pengembangan Kompetensi Aparatur" {{ old('bidang', $pegawai->bidang) == 'Bidang Pengembangan Kompetensi Aparatur' ? 'selected' : '' }}>Bidang Pengembangan Kompetensi Aparatur</option>
                                <option value="Bidang Penilaian Kerja" {{ old('bidang', $pegawai->bidang) == 'Bidang Penilaian Kerja' ? 'selected' : '' }}>Bidang Penilaian Kerja</option>
                            </select>
                            @error('bidang')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Status (Readonly) -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-toggle-on"></i>
                                Status
                            </label>
                            <div style="padding: 12px 16px; background: #f1f5f9; border-radius: 12px; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
                                @if($pegawai->status)
                                    <span style="display: inline-flex; align-items: center; gap: 6px; color: #10b981;">
                                        <i class="fas fa-circle" style="font-size: 8px;"></i> AKTIF
                                    </span>
                                @else
                                    <span style="display: inline-flex; align-items: center; gap: 6px; color: #ef4444;">
                                        <i class="fas fa-circle" style="font-size: 8px;"></i> NON-AKTIF
                                    </span>
                                @endif
                                <span style="font-size: 11px; color: #64748b; font-weight: normal;">
                                    (Status tidak dapat diubah dari form ini, gunakan tombol Nonaktifkan di halaman detail)
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview Card (Live Preview) -->
                    <div class="preview-card" id="previewCard">
                        <div class="preview-title">
                            <i class="fas fa-eye"></i> Preview Data
                        </div>
                        <div class="preview-name" id="previewName">{{ $pegawai->nama }}</div>
                        <div class="preview-info">
                            <span><i class="fas fa-id-badge"></i> NIP: <span id="previewNip">{{ $pegawai->nip ?? '-' }}</span></span>
                            <span><i class="fas fa-building"></i> Bidang: <span id="previewBidang">{{ $pegawai->bidang }}</span></span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="button" class="btn btn-danger" onclick="resetForm()">
                            <i class="fas fa-undo-alt"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Live Preview
    document.addEventListener('DOMContentLoaded', function() {
        const namaInput = document.querySelector('input[name="nama"]');
        const nipInput = document.querySelector('input[name="nip"]');
        const bidangSelect = document.querySelector('select[name="bidang"]');
        
        const previewName = document.getElementById('previewName');
        const previewNip = document.getElementById('previewNip');
        const previewBidang = document.getElementById('previewBidang');
        
        function updatePreview() {
            if (namaInput) previewName.textContent = namaInput.value.trim() || '(Nama belum diisi)';
            if (nipInput) previewNip.textContent = nipInput.value.trim() || '-';
            if (bidangSelect) previewBidang.textContent = bidangSelect.value || '(Pilih bidang)';
        }
        
        if (namaInput) namaInput.addEventListener('input', updatePreview);
        if (nipInput) nipInput.addEventListener('input', updatePreview);
        if (bidangSelect) bidangSelect.addEventListener('change', updatePreview);
    });
    
    // Reset Form ke nilai awal
    function resetForm() {
        if (confirm('Reset semua perubahan ke nilai awal?')) {
            const form = document.getElementById('editForm');
            form.reset();
            // Update preview setelah reset
            setTimeout(() => {
                const previewName = document.getElementById('previewName');
                const previewNip = document.getElementById('previewNip');
                const previewBidang = document.getElementById('previewBidang');
                
                if (previewName) previewName.textContent = '{{ addslashes($pegawai->nama) }}';
                if (previewNip) previewNip.textContent = '{{ addslashes($pegawai->nip ?? '-') }}';
                if (previewBidang) previewBidang.textContent = '{{ addslashes($pegawai->bidang) }}';
            }, 10);
        }
    }
    
    // Confirm before submit
    document.getElementById('editForm')?.addEventListener('submit', function(e) {
        const nama = document.querySelector('input[name="nama"]')?.value.trim();
        if (!nama) {
            e.preventDefault();
            alert('Nama lengkap pegawai wajib diisi!');
            return false;
        }
        return confirm('Apakah Anda yakin ingin menyimpan perubahan data pegawai ini?');
    });
</script>
@endsection