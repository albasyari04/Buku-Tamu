@extends('layouts.user')

@section('title', 'Riwayat Kunjungan — BKPSDM OKU Timur')

@push('styles')
<style>
/* =====================================================
   RIWAYAT PAGE — PROFESSIONAL ELEGANT REDESIGN
===================================================== */

.riwayat-page {
    min-height: calc(100vh - 64px - 52px);
    background: #F4F5FA;
    padding: 2rem 1.5rem 3rem;
}

.riwayat-inner {
    max-width: 1140px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

/* ── Animations ── */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
}
.anim-1 { animation: fadeUp .38s ease both; }
.anim-2 { animation: fadeUp .38s ease .08s both; }
.anim-3 { animation: fadeUp .38s ease .14s both; }
.anim-4 { animation: fadeUp .38s ease .20s both; }

/* =====================================================
   HERO HEADER CARD
===================================================== */
.hero-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(79,70,229,.07), 0 1px 4px rgba(0,0,0,.04);
    padding: 2rem 2.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    position: relative;
    overflow: hidden;
}
.hero-card::before {
    content: '';
    position: absolute;
    top: -40px;
    right: 280px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(79,70,229,.06) 0%, transparent 70%);
    pointer-events: none;
}

.hero-left { flex: 1; min-width: 0; }

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: #EEF2FF;
    color: #4F46E5;
    font-size: .72rem;
    font-weight: 700;
    padding: .28rem .75rem;
    border-radius: 20px;
    letter-spacing: .03em;
    margin-bottom: .65rem;
}
.hero-title {
    font-family: var(--font-heading);
    font-size: 1.65rem;
    font-weight: 800;
    color: #0F172A;
    margin-bottom: .3rem;
    line-height: 1.2;
}
.hero-sub {
    font-size: .82rem;
    color: #64748B;
    max-width: 480px;
    line-height: 1.5;
}

.hero-right {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    flex-shrink: 0;
}
.hero-illus {
    width: 130px;
    height: 110px;
    border-radius: 14px;
    overflow: hidden;
    background: #EEF2FF;
    display: flex;
    align-items: center;
    justify-content: center;
}
.hero-illus img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.btn-add-visit {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
    color: #fff;
    font-size: .82rem;
    font-weight: 700;
    padding: .65rem 1.4rem;
    border-radius: 50px;
    text-decoration: none;
    transition: all .2s ease;
    box-shadow: 0 4px 14px rgba(79,70,229,.35);
    white-space: nowrap;
}
.btn-add-visit:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(79,70,229,.4);
    color: #fff;
}
.btn-add-visit i { font-size: .75rem; }

@media (max-width: 768px) {
    .hero-card { flex-direction: column; align-items: flex-start; padding: 1.5rem; }
    .hero-illus { display: none; }
    .hero-right { flex-direction: column; align-items: flex-start; gap: .75rem; }
}

/* =====================================================
   FILTER CARD
===================================================== */
.filter-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 20px rgba(0,0,0,.05);
    padding: 1.5rem 2rem;
}

.filter-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
}
@media (max-width: 860px) {
    .filter-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 560px) {
    .filter-grid { grid-template-columns: 1fr; }
}

.filter-field-group { display: flex; flex-direction: column; gap: .35rem; }

.filter-label {
    font-size: .75rem;
    font-weight: 700;
    color: #475569;
    letter-spacing: .02em;
}

.filter-wrap {
    position: relative;
    display: flex;
    align-items: center;
}
.filter-icon {
    position: absolute;
    left: .85rem;
    color: #94A3B8;
    font-size: .8rem;
    pointer-events: none;
    z-index: 2;
    transition: color .18s;
}
.filter-wrap:focus-within .filter-icon { color: #4F46E5; }

.filter-input {
    width: 100%;
    padding: .6rem .9rem .6rem 2.4rem;
    border: 1.5px solid #E2E8F0;
    border-radius: 10px;
    font-family: var(--font-body);
    font-size: .82rem;
    color: #0F172A;
    background: #FAFBFD;
    outline: none;
    transition: all .18s ease;
    -webkit-appearance: none;
    appearance: none;
}
.filter-input::placeholder { color: #CBD5E1; }
.filter-input:focus {
    border-color: #4F46E5;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(79,70,229,.1);
}
select.filter-input {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right .85rem center;
    padding-right: 2rem;
    cursor: pointer;
}

.filter-actions {
    display: flex;
    align-items: flex-end;
    gap: .6rem;
    padding-top: .35rem;
}

.btn-filter {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    background: linear-gradient(135deg, #4F46E5, #6366F1);
    color: #fff;
    font-size: .8rem;
    font-weight: 700;
    padding: .6rem 1.2rem;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    transition: all .2s ease;
    box-shadow: 0 3px 10px rgba(79,70,229,.3);
}
.btn-filter:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(79,70,229,.35); }

.btn-reset {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    background: #F8FAFC;
    color: #64748B;
    font-size: .8rem;
    font-weight: 600;
    padding: .6rem 1.1rem;
    border-radius: 50px;
    border: 1.5px solid #E2E8F0;
    text-decoration: none;
    transition: all .18s;
}
.btn-reset:hover { background: #F1F5F9; color: #334155; }

/* =====================================================
   STATS ROW
===================================================== */
.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
}
@media (max-width: 860px) { .stats-row { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 480px) { .stats-row { grid-template-columns: repeat(2, 1fr); } }

.stat-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,.05);
    padding: 1.25rem 1.4rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: transform .2s ease, box-shadow .2s ease;
}
.stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.09); }

.stat-icon-box {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.stat-icon-blue   { background: #EEF2FF; color: #4F46E5; }
.stat-icon-green  { background: #F0FDF4; color: #10B981; }
.stat-icon-yellow { background: #FFFBEB; color: #F59E0B; }
.stat-icon-indigo { background: #F0F9FF; color: #0EA5E9; }

.stat-label {
    font-size: .72rem;
    color: #94A3B8;
    font-weight: 600;
    letter-spacing: .03em;
    margin-bottom: .15rem;
    text-transform: uppercase;
}
.stat-value {
    font-family: var(--font-heading);
    font-size: 1.5rem;
    font-weight: 800;
    color: #0F172A;
    line-height: 1;
    margin-bottom: .1rem;
}
.stat-desc {
    font-size: .72rem;
    color: #64748B;
}

/* =====================================================
   TABLE CARD
===================================================== */
.table-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(79,70,229,.06), 0 1px 4px rgba(0,0,0,.04);
    overflow: hidden;
}

.table-card-header {
    padding: 1.4rem 1.75rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    border-bottom: 1px solid #F1F5F9;
}

.table-card-title {
    font-family: var(--font-heading);
    font-size: 1rem;
    font-weight: 800;
    color: #0F172A;
    margin-bottom: .15rem;
}
.table-card-sub {
    font-size: .75rem;
    color: #94A3B8;
}

.table-card-actions {
    display: flex;
    align-items: center;
    gap: .5rem;
}

.tbl-wrap { overflow-x: auto; }

/* Custom table */
.riwayat-table {
    width: 100%;
    border-collapse: collapse;
}
.riwayat-table thead tr {
    background: #F8FAFC;
    border-bottom: 1px solid #E2E8F0;
}
.riwayat-table thead th {
    font-size: .72rem;
    font-weight: 700;
    color: #94A3B8;
    letter-spacing: .05em;
    text-transform: uppercase;
    padding: .85rem 1.1rem;
    white-space: nowrap;
}
.riwayat-table tbody tr {
    border-bottom: 1px solid #F8FAFC;
    transition: background .15s;
}
.riwayat-table tbody tr:last-child { border-bottom: none; }
.riwayat-table tbody tr:hover { background: #FAFBFF; }

.riwayat-table tbody td {
    padding: .95rem 1.1rem;
    font-size: .82rem;
    color: #334155;
    vertical-align: middle;
}

/* Row number */
.row-num {
    font-size: .75rem;
    color: #CBD5E1;
    font-weight: 600;
    text-align: center;
}

/* Avatar cell */
.tamu-cell { display: flex; align-items: center; gap: .65rem; }
.tamu-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4F46E5, #6366F1);
    color: #fff;
    font-size: .78rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.tamu-avatar.avatar-0 { background: linear-gradient(135deg, #4F46E5, #6366F1); }
.tamu-avatar.avatar-1 { background: linear-gradient(135deg, #10B981, #34D399); }
.tamu-avatar.avatar-2 { background: linear-gradient(135deg, #F59E0B, #FBBF24); }
.tamu-avatar.avatar-3 { background: linear-gradient(135deg, #EF4444, #F87171); }
.tamu-avatar.avatar-4 { background: linear-gradient(135deg, #0EA5E9, #38BDF8); }
.tamu-avatar.avatar-5 { background: linear-gradient(135deg, #8B5CF6, #A78BFA); }
.tamu-avatar.avatar-6 { background: linear-gradient(135deg, #EC4899, #F472B6); }
.tamu-avatar.avatar-7 { background: linear-gradient(135deg, #14B8A6, #2DD4BF); }
.tamu-name { font-weight: 700; color: #0F172A; font-size: .83rem; }
.tamu-hp   { font-size: .72rem; color: #94A3B8; margin-top: .05rem; }

/* Instansi cell */
.instansi-name { font-weight: 600; color: #1E293B; font-size: .82rem; }
.instansi-kota { font-size: .72rem; color: #94A3B8; margin-top: .05rem; }

/* Bertemu cell */
.bertemu-name { font-weight: 700; color: #1E293B; font-size: .82rem; }
.bertemu-pos  { font-size: .72rem; color: #94A3B8; margin-top: .05rem; }

/* Date cell */
.date-row { display: flex; align-items: center; gap: .35rem; font-size: .79rem; color: #334155; }
.date-row i { color: #CBD5E1; font-size: .72rem; }
.time-row { display: flex; align-items: center; gap: .35rem; font-size: .72rem; color: #94A3B8; margin-top: .2rem; }

/* Status badge */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    font-size: .7rem;
    font-weight: 700;
    padding: .28rem .65rem;
    border-radius: 20px;
    white-space: nowrap;
}
.status-selesai   { background: #F0FDF4; color: #10B981; }
.status-proses    { background: #FFFBEB; color: #F59E0B; }
.status-batal     { background: #FFF5F5; color: #EF4444; }

/* Action buttons */
.act-btn {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    border: 1.5px solid #E2E8F0;
    background: #F8FAFC;
    color: #64748B;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: .72rem;
    cursor: pointer;
    transition: all .18s;
    text-decoration: none;
}
.act-btn:hover { background: #EEF2FF; border-color: #C7D2FE; color: #4F46E5; }
.act-btn.download:hover { background: #F0FDF4; border-color: #A7F3D0; color: #10B981; }

/* Empty state */
.empty-state {
    padding: 3.5rem 1rem;
    text-align: center;
}
.empty-icon {
    width: 64px;
    height: 64px;
    border-radius: 18px;
    background: #EEF2FF;
    color: #4F46E5;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}
.empty-title { font-family: var(--font-heading); font-size: 1rem; font-weight: 800; color: #0F172A; margin-bottom: .35rem; }
.empty-sub   { font-size: .8rem; color: #94A3B8; margin-bottom: 1.25rem; }

/* Pagination bar */
.pagination-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1.75rem 1.25rem;
    border-top: 1px solid #F1F5F9;
    gap: 1rem;
    flex-wrap: wrap;
}
.pagination-info { font-size: .76rem; color: #94A3B8; }

/* Override Bootstrap pagination */
.riwayat-page .pagination { margin-bottom: 0; gap: .25rem; }
.riwayat-page .page-link {
    border-radius: 8px !important;
    border: 1.5px solid #E2E8F0;
    color: #64748B;
    font-size: .78rem;
    font-weight: 600;
    padding: .35rem .65rem;
    transition: all .18s;
}
.riwayat-page .page-link:hover { background: #EEF2FF; border-color: #C7D2FE; color: #4F46E5; }
.riwayat-page .page-item.active .page-link {
    background: linear-gradient(135deg, #4F46E5, #6366F1);
    border-color: transparent;
    color: #fff;
    box-shadow: 0 3px 8px rgba(79,70,229,.35);
}
</style>
@endpush

@section('content')
<div class="riwayat-page">
<div class="riwayat-inner">

    {{-- ══════════════════════════════════
         HERO HEADER
    ══════════════════════════════════ --}}
    <div class="hero-card anim-1">
        <div class="hero-left">
            <div class="hero-badge">
                <i class="fas fa-clock-rotate-left"></i> Riwayat Kunjungan
            </div>
            <h1 class="hero-title">Riwayat kunjungan Anda</h1>
            <p class="hero-sub">Lihat seluruh kunjungan yang pernah Anda lakukan dan filter berdasarkan keperluan atau petugas yang dituju.</p>
        </div>
        <div class="hero-right">
            <div class="hero-illus d-none d-lg-flex">
                <img src="{{ asset('images/riwayat.png') }}"
                     alt="Riwayat Illustration"
                     class="riwayat-hero-image"
                     data-fallback="{{ asset('images/from.png') }}">
            </div>
            <a href="{{ route('user.form') }}" class="btn-add-visit">
                <i class="fas fa-plus"></i> Tambah Kunjungan
            </a>
        </div>
    </div>

    {{-- ══════════════════════════════════
         FILTER CARD
    ══════════════════════════════════ --}}
    <div class="filter-card anim-2">
        <form method="GET" action="{{ route('user.riwayat') }}">
            <div class="filter-grid">

                {{-- Perihal --}}
                <div class="filter-field-group">
                    <label class="filter-label">Perihal</label>
                    <div class="filter-wrap">
                        <i class="fas fa-file-lines filter-icon"></i>
                        <select name="perihal" class="filter-input">
                            <option value="">-- Semua perihal --</option>
                            @foreach($perihal_options as $item)
                                <option value="{{ $item }}" {{ request('perihal') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Bertemu Dengan --}}
                <div class="filter-field-group">
                    <label class="filter-label">Bertemu Dengan</label>
                    <div class="filter-wrap">
                        <i class="fas fa-user-tie filter-icon"></i>
                        <select name="bertemu_dengan" class="filter-input">
                            <option value="">-- Semua tujuan --</option>
                            @foreach($bertemu_dengan as $item)
                                <option value="{{ $item }}" {{ request('bertemu_dengan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Bulan --}}
                <div class="filter-field-group">
                    <label class="filter-label">Bulan</label>
                    <div class="filter-wrap">
                        <i class="fas fa-calendar filter-icon"></i>
                        <select name="bulan" class="filter-input">
                            <option value="">-- Semua bulan --</option>
                            @for($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                {{-- Tahun --}}
                <div class="filter-field-group">
                    <label class="filter-label">Tahun</label>
                    <div class="filter-wrap">
                        <i class="fas fa-calendar-days filter-icon"></i>
                        <input type="number" name="tahun"
                               value="{{ request('tahun', now()->year) }}"
                               class="filter-input"
                               min="2020" max="2100"
                               placeholder="{{ now()->year }}">
                    </div>
                </div>

                {{-- Actions --}}
                <div class="filter-actions" style="grid-column: span 2;">
                    <button type="submit" class="btn-filter">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('user.riwayat') }}" class="btn-reset">
                        <i class="fas fa-rotate-left"></i> Reset
                    </a>
                </div>

            </div>
        </form>
    </div>

    {{-- ══════════════════════════════════
         STATS ROW
    ══════════════════════════════════ --}}
    @php
        $perihalTerbanyak = \App\Models\Tamu::where('nama', 'like', '%' . auth()->user()->name . '%')
            ->select('perihal', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('perihal')
            ->orderByDesc('total')
            ->first();

        $uniquePegawai = \App\Models\Tamu::where('nama', 'like', '%' . auth()->user()->name . '%')
            ->distinct('bertemu_dengan')
            ->count('bertemu_dengan');

        $avgPerBulan = $totalKunjungan > 0
            ? round($totalKunjungan / max(1, \App\Models\Tamu::where('nama', 'like', '%' . auth()->user()->name . '%')
                ->selectRaw('COUNT(DISTINCT YEAR(tanggal_kunjungan), MONTH(tanggal_kunjungan)) as cnt')
                ->value('cnt')), 1)
            : 0;
    @endphp

    <div class="stats-row anim-3">
        <div class="stat-card">
            <div class="stat-icon-box stat-icon-blue">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div>
                <div class="stat-label">Total Kunjungan</div>
                <div class="stat-value">{{ $totalKunjungan }}</div>
                <div class="stat-desc">Kunjungan</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-box stat-icon-green">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <div class="stat-label">Bertemu Dengan</div>
                <div class="stat-value">{{ $uniquePegawai }}</div>
                <div class="stat-desc">Pegawai</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-box stat-icon-yellow">
                <i class="fas fa-briefcase"></i>
            </div>
            <div>
                <div class="stat-label">Perihal Terbanyak</div>
                <div class="stat-value" style="font-size:1rem;line-height:1.2;margin-top:.1rem;">
                    {{ $perihalTerbanyak ? \Illuminate\Support\Str::limit($perihalTerbanyak->perihal, 14) : '—' }}
                </div>
                <div class="stat-desc">
                    {{ $perihalTerbanyak ? $perihalTerbanyak->total . ' Kunjungan' : 'Belum ada data' }}
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-box stat-icon-indigo">
                <i class="fas fa-chart-line"></i>
            </div>
            <div>
                <div class="stat-label">Rata-rata / Bulan</div>
                <div class="stat-value">{{ $avgPerBulan }}</div>
                <div class="stat-desc">Kunjungan</div>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════
         TABLE CARD
    ══════════════════════════════════ --}}
    <div class="table-card anim-4">
        <div class="table-card-header">
            <div>
                <div class="table-card-title">Daftar kunjungan</div>
                <div class="table-card-sub">Total: {{ $totalKunjungan }} kunjungan</div>
            </div>
        </div>

        @if($riwayat->isEmpty())
            <div class="empty-state">
                <div class="empty-icon"><i class="fas fa-inbox"></i></div>
                <div class="empty-title">Tidak ada data kunjungan</div>
                <div class="empty-sub">Tidak ada data yang sesuai dengan filter saat ini.</div>
                <a href="{{ route('user.form') }}" class="btn-add-visit" style="font-size:.8rem;padding:.6rem 1.3rem;">
                    <i class="fas fa-plus"></i> Tambah Kunjungan Baru
                </a>
            </div>
        @else
            <div class="tbl-wrap">
                <table class="riwayat-table">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:48px;">No</th>
                            <th>Nama Tamu</th>
                            <th>Instansi / Perusahaan</th>
                            <th>Bertemu Dengan</th>
                            <th>Perihal</th>
                            <th>Tanggal Kunjungan</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $index => $item)
                        @php
                            $avatarColors = ['#4F46E5','#10B981','#F59E0B','#EF4444','#0EA5E9','#8B5CF6','#EC4899','#14B8A6'];
                            $colorIndex   = abs(crc32($item->nama) % count($avatarColors));
                            $avatarClass  = 'avatar-' . $colorIndex;
                            $initial      = strtoupper(substr($item->nama, 0, 1));
                        @endphp
                        <tr>
                            <td class="row-num">{{ $riwayat->firstItem() + $index }}</td>

                            {{-- Nama --}}
                            <td>
                                <div class="tamu-cell">
                                    <div class="tamu-avatar {{ $avatarClass }}">
                                        {{ $initial }}
                                    </div>
                                    <div>
                                        <div class="tamu-name">{{ $item->nama }}</div>
                                        @if($item->no_hp)
                                            <div class="tamu-hp">{{ $item->no_hp }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Instansi --}}
                            <td>
                                <div class="instansi-name">{{ $item->instansi }}</div>
                            </td>

                            {{-- Bertemu Dengan --}}
                            <td>
                                @php $parts = explode(',', $item->bertemu_dengan, 2); @endphp
                                <div class="bertemu-name">{{ trim($parts[0]) }}</div>
                                @if(isset($parts[1]))
                                    <div class="bertemu-pos">{{ trim($parts[1]) }}</div>
                                @endif
                            </td>

                            {{-- Perihal --}}
                            <td>{{ $item->perihal }}</td>

                            {{-- Tanggal --}}
                            <td>
                                <div class="date-row">
                                    <i class="fas fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->translatedFormat('d M Y') }}
                                </div>
                                <div class="time-row">
                                    <i class="fas fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('H:i') }} WIB
                                </div>
                            </td>

                            {{-- Status --}}
                            <td style="text-align:center;">
                                <span class="status-badge status-selesai">
                                    <i class="fas fa-circle-check" style="font-size:.6rem;"></i> Selesai
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td>
                                <div style="display:flex;align-items:center;justify-content:center;gap:.35rem;">
                                    <a href="#" class="act-btn" title="Lihat detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="act-btn download" title="Unduh">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="pagination-bar">
                <div class="pagination-info">
                    Menampilkan {{ $riwayat->firstItem() }}–{{ $riwayat->lastItem() }} dari {{ $riwayat->total() }} data
                </div>
                <div>
                    {{ $riwayat->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif
    </div>

</div>{{-- /.riwayat-inner --}}
</div>{{-- /.riwayat-page --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('img[data-fallback]').forEach(function (img) {
            img.addEventListener('error', function () {
                if (!img.dataset.fallbackLoaded) {
                    img.src = img.dataset.fallback;
                    img.dataset.fallbackLoaded = '1';
                }
            });
        });
    });
</script>

@endsection