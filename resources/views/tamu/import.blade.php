@extends('layouts.app')

@section('title', 'Import Data Tamu')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* ── Variables ─────────────────────────────────────── */
:root {
    --pri:        #4F46E5;
    --pri-dark:   #4338CA;
    --pri-light:  #EEF2FF;
    --pri-mid:    #E0E7FF;
    --success:    #10B981;
    --warning:    #F59E0B;
    --danger:     #EF4444;
    --surf:       #FFFFFF;
    --surf-2:     #F8FAFC;
    --surf-3:     #F1F5F9;
    --border:     #E2E8F0;
    --txt:        #0F172A;
    --txt-2:      #475569;
    --txt-3:      #94A3B8;
    --r-sm:       8px;
    --r-md:       12px;
    --r-lg:       16px;
    --r-xl:       20px;
    --sh-sm:      0 1px 3px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.04);
    --sh-md:      0 4px 16px rgba(0,0,0,.08);
    --sh-lg:      0 10px 40px rgba(0,0,0,.12);
}

.pg * { font-family:'Plus Jakarta Sans',sans-serif; box-sizing:border-box; }
.pg   { background:#F0F2F9; min-height:100vh; }

/* ── Hero Banner ───────────────────────────────────── */
.hero-banner {
    background: linear-gradient(135deg, #10B981 0%, #059669 60%, #047857 100%);
    padding: 28px 32px 80px;
    position: relative; overflow: hidden;
}
.hero-banner::before {
    content:''; position:absolute; inset:0;
    background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.hero-banner::after {
    content:''; position:absolute; right:-80px; top:-80px;
    width:360px; height:360px; border-radius:50%;
    background:rgba(255,255,255,.06); pointer-events:none;
}
.hero-inner {
    display:flex; align-items:flex-start; justify-content:space-between;
    flex-wrap:wrap; gap:20px; position:relative; z-index:1;
}
.hero-bread {
    display:flex; align-items:center; gap:8px;
    font-size:13px; color:rgba(255,255,255,.65); margin-bottom:10px;
}
.hero-bread a { color:rgba(255,255,255,.85); text-decoration:none; }
.hero-bread a:hover { color:#fff; }
.hero-title {
    font-size:28px; font-weight:800; color:#fff; margin:0 0 8px;
    display:flex; align-items:center; gap:12px;
}
.hero-title .ico-wrap {
    width:44px; height:44px; background:rgba(255,255,255,.15);
    border-radius:var(--r-md); display:flex; align-items:center;
    justify-content:center; font-size:20px;
}
.hero-sub { font-size:14px; color:rgba(255,255,255,.75); }
.hero-right { display:flex; align-items:center; gap:10px; padding-top:4px; }
.btn-hero-back {
    display:inline-flex; align-items:center; gap:8px;
    background:rgba(255,255,255,.15); color:#fff !important;
    padding:11px 20px; border-radius:var(--r-md);
    font-size:14px; font-weight:600; text-decoration:none !important;
    border:1px solid rgba(255,255,255,.25);
    transition:all .25s ease;
}
.btn-hero-back:hover { background:rgba(255,255,255,.22); transform:translateY(-2px); }

/* ── Content Area ──────────────────────────────────── */
.content-area { padding:0 32px 40px; margin-top:-56px; position:relative; z-index:2; }

/* ── Alert ─────────────────────────────────────────── */
.alert-mod {
    display:flex; align-items:flex-start; gap:14px;
    padding:14px 18px; border-radius:var(--r-md);
    margin-bottom:20px; border:1px solid transparent;
}
.alert-mod.ok  { background:#F0FDF4; border-color:#86EFAC; }
.alert-mod.err { background:#FEF2F2; border-color:#FECACA; }
.alert-mod.warn{ background:#FFFBEB; border-color:#FCD34D; }
.am-icon { font-size:17px; margin-top:1px; }
.alert-mod.ok   .am-icon { color:var(--success); }
.alert-mod.err  .am-icon { color:var(--danger);  }
.alert-mod.warn .am-icon { color:var(--warning); }
.am-body { flex:1; }
.am-title { font-size:14px; font-weight:700; margin-bottom:2px; }
.alert-mod.ok   .am-title { color:#065F46; }
.alert-mod.err  .am-title { color:#991B1B; }
.alert-mod.warn .am-title { color:#78350F; }
.am-text  { font-size:13px; color:var(--txt-2); margin:0; }
.am-close { background:none; border:none; color:var(--txt-3); cursor:pointer; font-size:14px; }
.am-close:hover { color:var(--txt); }

/* ── Grid ──────────────────────────────────────────── */
.two-col { display:grid; grid-template-columns:1fr 420px; gap:24px; align-items:start; }
@media(max-width:960px){ .two-col { grid-template-columns:1fr; } }

/* ── Card ──────────────────────────────────────────── */
.card {
    background:var(--surf); border-radius:var(--r-xl);
    border:1px solid var(--border); box-shadow:var(--sh-sm);
    overflow:hidden;
}
.card-head {
    padding:16px 24px; border-bottom:1px solid var(--border);
    display:flex; align-items:center; gap:12px;
}
.card-head-ico {
    width:38px; height:38px; border-radius:var(--r-sm);
    display:flex; align-items:center; justify-content:center;
    font-size:17px; flex-shrink:0;
}
.card-head-title  { font-size:15px; font-weight:800; color:var(--txt); }
.card-head-sub    { font-size:12px; color:var(--txt-3); margin-top:2px; }
.card-body        { padding:24px; }

/* ── Drop Zone ─────────────────────────────────────── */
.drop-zone {
    border:2px dashed #C7D2FE; border-radius:var(--r-lg);
    background:var(--pri-light); text-align:center; padding:44px 24px;
    position:relative; cursor:pointer; transition:all .2s ease;
}
.drop-zone:hover, .drop-zone.drag-over {
    border-color:var(--pri); background:#E0E7FF;
    transform:scale(1.01); box-shadow:0 0 0 4px rgba(79,70,229,.1);
}
.drop-zone input[type=file] {
    position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%;
}
.dz-ico { font-size:44px; color:var(--pri); margin-bottom:14px; }
.dz-title { font-size:15px; font-weight:700; color:var(--pri); margin-bottom:6px; }
.dz-sub   { font-size:12px; color:var(--txt-3); }
.dz-preview {
    display:none; margin-top:16px;
    background:#fff; border:1px solid #C7D2FE;
    border-radius:var(--r-md); padding:10px 16px;
    align-items:center; gap:10px;
}
.dz-preview.show { display:flex; }
.dz-preview-ico { font-size:22px; color:var(--success); }
.dz-preview-name { font-size:13px; font-weight:600; color:var(--txt); flex:1; text-align:left; }
.dz-preview-size { font-size:11px; color:var(--txt-3); }
.dz-preview-del  {
    background:none; border:none; color:var(--txt-3); cursor:pointer;
    font-size:14px; padding:2px 6px; border-radius:var(--r-sm);
    transition:all .2s;
}
.dz-preview-del:hover { background:#FEE2E2; color:var(--danger); }

/* Validasi error */
.field-err { font-size:12px; color:var(--danger); margin-top:8px; display:flex; align-items:center; gap:6px; }

/* ── Opsi ──────────────────────────────────────────── */
.opsi-box {
    background:var(--surf-2); border:1px solid var(--border);
    border-radius:var(--r-md); padding:14px 18px; margin-top:18px;
}
.opsi-title { font-size:12px; font-weight:700; color:var(--txt-2); text-transform:uppercase; letter-spacing:.6px; margin-bottom:10px; }
.form-check-label { font-size:13px; color:var(--txt-2); }

/* ── Buttons ───────────────────────────────────────── */
.btn-import {
    display:inline-flex; align-items:center; gap:9px;
    background:linear-gradient(135deg,#10B981,#059669);
    color:#fff !important; padding:12px 28px; border-radius:var(--r-md);
    font-size:14px; font-weight:700; border:none; cursor:pointer;
    box-shadow:0 4px 14px rgba(16,185,129,.3);
    transition:all .25s ease; text-decoration:none !important;
}
.btn-import:hover { transform:translateY(-2px); box-shadow:0 8px 24px rgba(16,185,129,.35); }
.btn-import:disabled { opacity:.6; cursor:not-allowed; transform:none; }
.btn-cancel {
    display:inline-flex; align-items:center; gap:8px;
    background:var(--surf); color:var(--txt-2) !important;
    padding:12px 22px; border-radius:var(--r-md);
    font-size:14px; font-weight:600; border:1px solid var(--border);
    text-decoration:none !important; transition:all .2s;
}
.btn-cancel:hover { background:var(--surf-3); border-color:#CBD5E1; }

/* ── Template card ─────────────────────────────────── */
.tmpl-card {
    background:linear-gradient(135deg,#10B981,#059669);
    border-radius:var(--r-xl); padding:24px; color:#fff; margin-bottom:20px;
}
.tmpl-card-ico {
    width:48px; height:48px; background:rgba(255,255,255,.2);
    border-radius:var(--r-md); display:flex; align-items:center;
    justify-content:center; font-size:22px; margin-bottom:14px;
}
.tmpl-card-title { font-size:17px; font-weight:800; margin-bottom:6px; }
.tmpl-card-sub   { font-size:13px; opacity:.85; margin-bottom:18px; }
.btn-tmpl {
    display:inline-flex; align-items:center; gap:8px;
    background:#fff; color:#059669 !important;
    padding:10px 20px; border-radius:var(--r-md);
    font-size:13px; font-weight:700; text-decoration:none !important;
    box-shadow:0 2px 8px rgba(0,0,0,.12); transition:all .2s;
}
.btn-tmpl:hover { transform:translateY(-2px); box-shadow:0 6px 16px rgba(0,0,0,.16); }

/* ── Kolom table ───────────────────────────────────── */
.col-tbl { width:100%; border-collapse:collapse; }
.col-tbl thead th {
    padding:9px 12px; font-size:11px; font-weight:700; text-transform:uppercase;
    letter-spacing:.7px; color:var(--txt-3); background:var(--surf-2);
    border-bottom:1px solid var(--border);
}
.col-tbl tbody td {
    padding:9px 12px; font-size:12.5px; color:var(--txt-2);
    border-bottom:1px solid var(--border);
}
.col-tbl tbody tr:last-child td { border-bottom:none; }
.col-tbl tbody tr:hover td { background:var(--surf-2); }
.col-name { font-weight:700; color:var(--pri); font-family:'DM Mono',monospace; }
.col-name.opt { color:var(--txt-3); }
.badge-req {
    display:inline-flex; align-items:center; gap:4px;
    background:#D1FAE5; color:#065F46; font-size:10px;
    font-weight:700; padding:2px 8px; border-radius:30px;
}
.badge-opt {
    display:inline-flex; align-items:center; gap:4px;
    background:var(--surf-3); color:var(--txt-3); font-size:10px;
    font-weight:700; padding:2px 8px; border-radius:30px;
}
.col-tbl-foot {
    padding:10px 12px; font-size:12px; color:var(--txt-3);
    background:var(--surf-2); border-top:1px solid var(--border);
    display:flex; align-items:center; gap:8px;
}

@media(max-width:768px){
    .hero-banner  { padding:20px 18px 70px; }
    .content-area { padding:0 14px 28px; }
    .card-body    { padding:18px; }
}
</style>

{{-- ── Hero Banner ──────────────────────────────────────── --}}
<div class="hero-banner">
    <div class="hero-inner">
        <div>
            <div class="hero-bread">
                <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <i class="fas fa-chevron-right" style="font-size:10px"></i>
                <a href="{{ route('tamu.index') }}"><i class="fas fa-users"></i> Data Tamu</a>
                <i class="fas fa-chevron-right" style="font-size:10px"></i>
                <span><i class="fas fa-file-excel"></i> Import Excel</span>
            </div>
            <h1 class="hero-title">
                <div class="ico-wrap"><i class="fas fa-file-excel"></i></div>
                Import Data Tamu
            </h1>
            <p class="hero-sub"><i class="fas fa-info-circle"></i> Upload file Excel untuk mengimport data tamu secara massal</p>
        </div>
        <div class="hero-right">
            <a href="{{ route('tamu.index') }}" class="btn-hero-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

{{-- ── Content ───────────────────────────────────────────── --}}
<div class="content-area">

    {{-- Alert error upload --}}
    @if(session('error'))
    <div class="alert-mod err" id="al-err">
        <div class="am-icon"><i class="fas fa-times-circle"></i></div>
        <div class="am-body">
            <div class="am-title">Gagal!</div>
            <p class="am-text">{{ session('error') }}</p>
        </div>
        <button class="am-close" onclick="this.closest('.alert-mod').remove()"><i class="fas fa-times"></i></button>
    </div>
    @endif

    {{-- Alert baris yang dilewati --}}
    @if(session('import_errors') && count(session('import_errors')) > 0)
    <div class="alert-mod warn" id="al-warn">
        <div class="am-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="am-body">
            <div class="am-title">Beberapa baris dilewati ({{ count(session('import_errors')) }} baris)</div>
            <ul style="margin:8px 0 0;padding-left:18px;font-size:13px;color:var(--txt-2)">
                @foreach(session('import_errors') as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        <button class="am-close" onclick="this.closest('.alert-mod').remove()"><i class="fas fa-times"></i></button>
    </div>
    @endif

    <div class="two-col">

        {{-- ── Kolom Kiri: Form Upload ─────────────────── --}}
        <div class="card">
            <div class="card-head">
                <div class="card-head-ico" style="background:linear-gradient(135deg,#D1FAE5,#A7F3D0);color:#059669;">
                    <i class="fas fa-upload"></i>
                </div>
                <div>
                    <div class="card-head-title">Upload File Excel</div>
                    <div class="card-head-sub">Format .xlsx / .xls / .csv — maks. 5 MB</div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('tamu.import') }}" method="POST"
                      enctype="multipart/form-data" id="formImport">
                    @csrf

                    {{-- Drop zone --}}
                    <div class="drop-zone" id="dropZone"
                         ondragover="dzDragOver(event)"
                         ondragleave="dzDragLeave(event)"
                         ondrop="dzDrop(event)">

                        <div class="dz-ico"><i class="fas fa-file-excel"></i></div>
                        <div class="dz-title">Klik untuk memilih file</div>
                        <div class="dz-sub">atau seret & lepaskan file di sini</div>

                        <input type="file" id="fileInput" name="file_excel"
                               accept=".xlsx,.xls,.csv"
                               onchange="dzPreview(this)">
                    </div>

                    {{-- Preview file terpilih --}}
                    <div class="dz-preview" id="dzPreview">
                        <i class="fas fa-file-excel dz-preview-ico"></i>
                        <span class="dz-preview-name" id="dzName">—</span>
                        <span class="dz-preview-size" id="dzSize"></span>
                        <button type="button" class="dz-preview-del" onclick="dzClear()" title="Hapus pilihan">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    @error('file_excel')
                    <div class="field-err">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </div>
                    @enderror

                    {{-- Opsi --}}
                    <div class="opsi-box">
                        <div class="opsi-title"><i class="fas fa-cog" style="margin-right:6px"></i>Opsi Import</div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="skip_errors"
                                   name="skip_errors" value="1" checked>
                            <label class="form-check-label" for="skip_errors">
                                Lewati baris yang error (baris lain tetap diimport)
                            </label>
                        </div>
                    </div>

                    {{-- Tombol aksi --}}
                    <div style="display:flex;gap:12px;margin-top:24px;flex-wrap:wrap;">
                        <button type="submit" class="btn-import" id="btnImport">
                            <i class="fas fa-file-import"></i> Mulai Import
                        </button>
                        <a href="{{ route('tamu.index') }}" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>

        {{-- ── Kolom Kanan: Template + Panduan ─────────── --}}
        <div>

            {{-- Download Template --}}
            <div class="tmpl-card">
                <div class="tmpl-card-ico"><i class="fas fa-download"></i></div>
                <div class="tmpl-card-title">Download Template Excel</div>
                <div class="tmpl-card-sub">
                    Gunakan template ini agar format kolom sesuai.<br>
                    Sudah dilengkapi contoh data &amp; sheet Petunjuk.
                </div>
                <a href="{{ route('tamu.template.download') }}" class="btn-tmpl">
                    <i class="fas fa-file-excel"></i> Download Template (.xlsx)
                </a>
            </div>

            {{-- Panduan kolom --}}
            <div class="card">
                <div class="card-head">
                    <div class="card-head-ico" style="background:var(--pri-light);color:var(--pri);">
                        <i class="fas fa-table-columns"></i>
                    </div>
                    <div>
                        <div class="card-head-title">Format Kolom Excel</div>
                        <div class="card-head-sub">Urutan kolom tidak boleh diubah</div>
                    </div>
                </div>
                <table class="col-tbl">
                    <thead>
                        <tr>
                            <th style="width:60px">Kolom</th>
                            <th>Isi</th>
                            <th style="width:70px;text-align:center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="col-name opt">A</span></td>
                            <td>Nomor urut</td>
                            <td style="text-align:center"><span class="badge-opt">Opsional</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name opt">B</span></td>
                            <td>Tanggal Kunjungan<br><span style="font-size:11px;color:var(--txt-3)">dd/mm/yyyy HH:mm</span></td>
                            <td style="text-align:center"><span class="badge-opt">Opsional</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name">C</span></td>
                            <td>Nama Tamu</td>
                            <td style="text-align:center"><span class="badge-req"><i class="fas fa-check" style="font-size:9px"></i>Wajib</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name">D</span></td>
                            <td>NIP / NIK</td>
                            <td style="text-align:center"><span class="badge-req"><i class="fas fa-check" style="font-size:9px"></i>Wajib</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name opt">E</span></td>
                            <td>No. HP</td>
                            <td style="text-align:center"><span class="badge-opt">Opsional</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name">F</span></td>
                            <td>Instansi</td>
                            <td style="text-align:center"><span class="badge-req"><i class="fas fa-check" style="font-size:9px"></i>Wajib</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name">G</span></td>
                            <td>Bertemu Dengan</td>
                            <td style="text-align:center"><span class="badge-req"><i class="fas fa-check" style="font-size:9px"></i>Wajib</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name">H</span></td>
                            <td>Alamat</td>
                            <td style="text-align:center"><span class="badge-req"><i class="fas fa-check" style="font-size:9px"></i>Wajib</span></td>
                        </tr>
                        <tr>
                            <td><span class="col-name">I</span></td>
                            <td>Perihal</td>
                            <td style="text-align:center"><span class="badge-req"><i class="fas fa-check" style="font-size:9px"></i>Wajib</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-tbl-foot">
                    <i class="fas fa-lightbulb" style="color:var(--warning)"></i>
                    Baris 1 (header) otomatis dilewati saat proses import.
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
/* ── Drop Zone Logic ─────────────────────────────────── */
function dzPreview(input) {
    if (!input.files || !input.files[0]) return;
    const f    = input.files[0];
    const kb   = (f.size / 1024).toFixed(1);
    const size = f.size > 1024 * 1024
               ? (f.size / 1024 / 1024).toFixed(2) + ' MB'
               : kb + ' KB';

    document.getElementById('dzName').textContent = f.name;
    document.getElementById('dzSize').textContent = size;
    document.getElementById('dzPreview').classList.add('show');
    document.querySelector('.dz-title').textContent = 'File dipilih';
    document.querySelector('.dz-ico i').className   = 'fas fa-check-circle';
    document.querySelector('.dz-ico').style.color   = 'var(--success)';
}

function dzClear() {
    const input = document.getElementById('fileInput');
    input.value = '';
    document.getElementById('dzPreview').classList.remove('show');
    document.querySelector('.dz-title').textContent  = 'Klik untuk memilih file';
    document.querySelector('.dz-ico i').className    = 'fas fa-file-excel';
    document.querySelector('.dz-ico').style.color    = 'var(--pri)';
}

function dzDragOver(e) {
    e.preventDefault();
    document.getElementById('dropZone').classList.add('drag-over');
}
function dzDragLeave() {
    document.getElementById('dropZone').classList.remove('drag-over');
}
function dzDrop(e) {
    e.preventDefault();
    dzDragLeave();
    const input  = document.getElementById('fileInput');
    const dt     = e.dataTransfer;
    // DataTransfer read-only pada beberapa browser — fallback graceful
    try { input.files = dt.files; } catch(ex) {}
    if (dt.files && dt.files[0]) {
        // Trigger preview manual
        const f    = dt.files[0];
        const size = f.size > 1048576
                   ? (f.size/1048576).toFixed(2)+' MB'
                   : (f.size/1024).toFixed(1)+' KB';
        document.getElementById('dzName').textContent = f.name;
        document.getElementById('dzSize').textContent = size;
        document.getElementById('dzPreview').classList.add('show');
    }
}

/* ── Loading State ───────────────────────────────────── */
document.getElementById('formImport').addEventListener('submit', function() {
    const btn = document.getElementById('btnImport');
    btn.disabled   = true;
    btn.innerHTML  = '<span class="spinner-border spinner-border-sm me-2" style="width:16px;height:16px;border-width:2px"></span> Memproses...';
});

/* ── Auto-dismiss alerts ─────────────────────────────── */
setTimeout(function() {
    ['al-err','al-warn'].forEach(function(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.style.transition = 'opacity .5s ease';
        el.style.opacity    = '0';
        setTimeout(function() { if (el && el.parentNode) el.remove(); }, 500);
    });
}, 6000);
</script>
@endpush

@endsection