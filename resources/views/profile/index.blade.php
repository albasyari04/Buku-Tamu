@extends('layouts.app')

@section('title', 'Edit Profil - BKPSDM OKU TIMUR')

@section('content')
<style>
    .edit-profile-hero {
        background: linear-gradient(135deg, #0EA5E9 0%, #0284C7 45%, #0369A1 100%);
        padding: 28px 32px 80px;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 24px 24px;
        margin-bottom: -48px;
    }
    
    .edit-profile-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .edit-profile-inner {
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
    
    .edit-content {
        padding: 0 32px 40px;
        position: relative;
        z-index: 2;
    }
    
    .form-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0,0,0,.1);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        margin-bottom: 24px;
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
        padding: 28px;
    }
    
    .form-group {
        margin-bottom: 20px;
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
    
    .action-buttons {
        display: flex;
        gap: 16px;
        margin-top: 24px;
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
    <div class="edit-profile-hero">
        <div class="edit-profile-inner">
            <div class="edit-left">
                <div class="edit-bread">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <a href="{{ route('profile.index') }}">Profil Saya</a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <span style="color: white;">Edit Profil</span>
                </div>
                <h1 class="edit-title">
                    <div class="ico-wrap"><i class="fas fa-user-edit"></i></div>
                    Edit Profil
                </h1>
                <p class="edit-sub">
                    <i class="fas fa-info-circle"></i>
                    Perbarui informasi akun Anda
                </p>
            </div>
            <div class="edit-right">
                <a href="{{ route('profile.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,.15); padding: 10px 20px; border-radius: 12px; color: white; text-decoration: none; font-weight: 600;">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="edit-content">
        
        @if(session('success'))
        <div class="alert-custom alert-success-custom">
            <i class="fas fa-check-circle fa-lg"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        
        @if($errors->any())
        <div class="alert-custom alert-error-custom">
            <i class="fas fa-exclamation-triangle fa-lg"></i>
            <div>
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 5px 0 0 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- Form Edit Profil -->
        <div class="form-card">
            <div class="form-header">
                <i class="fas fa-user-circle"></i>
                <h3>Informasi Dasar</h3>
            </div>
            <div class="form-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i>
                            Nama Lengkap <span class="required-star">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $user->name) }}"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i>
                            Email <span class="required-star">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email', $user->email) }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Form Ganti Password -->
        <div class="form-card" id="passwordForm">
            <div class="form-header">
                <i class="fas fa-key"></i>
                <h3>Ganti Password</h3>
            </div>
            <div class="form-body">
                <form action="{{ route('profile.update-password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            Password Saat Ini <span class="required-star">*</span>
                        </label>
                        <input type="password" 
                               name="current_password" 
                               class="form-control"
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-key"></i>
                            Password Baru <span class="required-star">*</span>
                        </label>
                        <input type="password" 
                               name="password" 
                               class="form-control"
                               required>
                        <small class="form-text text-muted">Minimal 6 karakter</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-check-circle"></i>
                            Konfirmasi Password Baru <span class="required-star">*</span>
                        </label>
                        <input type="password" 
                               name="password_confirmation" 
                               class="form-control"
                               required>
                    </div>
                    
                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection