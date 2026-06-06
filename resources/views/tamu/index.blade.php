@extends('layouts.app')

@section('content')
{{-- ============================================================
     DATA TAMU — Professional Dashboard View
     Inspired by Dash UI style
     ============================================================ --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* ============================================================
   CSS VARIABLES
   ============================================================ */
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

/* ============================================================
   BASE
   ============================================================ */
.pg * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
.pg { background: #F0F2F9; min-height: 100vh; }

/* ============================================================
   HERO BANNER  (like the purple banner in reference)
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
.hero-right { display: flex; align-items: center; gap: 10px; padding-top: 4px; }
.btn-hero-add {
    display: inline-flex; align-items: center; gap: 9px;
    background: #fff; color: var(--pri) !important;
    padding: 11px 22px; border-radius: var(--r-md);
    font-size: 14px; font-weight: 700; text-decoration: none !important;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
    transition: all .25s ease; border: none; cursor: pointer;
}
.btn-hero-add:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.2); }
.btn-hero-sec {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,.15); color: #fff !important;
    padding: 11px 20px; border-radius: var(--r-md);
    font-size: 14px; font-weight: 600; text-decoration: none !important;
    border: 1px solid rgba(255,255,255,.25); cursor: pointer;
    transition: all .25s ease; backdrop-filter: blur(4px);
}
.btn-hero-sec:hover { background: rgba(255,255,255,.22); transform: translateY(-2px); }

/* ============================================================
   CONTENT AREA (floats over banner)
   ============================================================ */
.content-area {
    padding: 0 32px 40px;
    margin-top: -56px;
    position: relative; z-index: 2;
}

/* ============================================================
   STATS GRID
   ============================================================ */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 24px;
}
@media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px)  { .stats-grid { grid-template-columns: 1fr; } }

.stat-card {
    background: var(--surf);
    border-radius: var(--r-xl);
    padding: 22px 24px 20px;
    border: 1px solid var(--border);
    box-shadow: var(--sh-sm);
    position: relative; overflow: hidden;
    transition: transform .25s ease, box-shadow .25s ease;
    cursor: default;
}
.stat-card:hover { transform: translateY(-4px); box-shadow: var(--sh-lg); }
.stat-card::before {
    content: ''; position: absolute;
    top: 0; left: 0; right: 0; height: 4px;
    border-radius: var(--r-xl) var(--r-xl) 0 0;
}
.sc-indigo::before { background: linear-gradient(90deg,#4F46E5,#818CF8); }
.sc-cyan::before   { background: linear-gradient(90deg,#06B6D4,#22D3EE); }
.sc-amber::before  { background: linear-gradient(90deg,#F59E0B,#FBBF24); }
.sc-purple::before { background: linear-gradient(90deg,#8B5CF6,#A78BFA); }

/* bg watermark icon */
.stat-card .wm {
    position: absolute; right: 16px; bottom: 12px;
    font-size: 52px; opacity: .05; pointer-events: none;
    line-height: 1; color: #000;
}

.stat-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.stat-ico {
    width: 50px; height: 50px; border-radius: var(--r-md);
    display: flex; align-items: center; justify-content: center; font-size: 22px;
    flex-shrink: 0;
}
.sico-indigo { background: linear-gradient(135deg,#EEF2FF,#E0E7FF); color: var(--pri); }
.sico-cyan   { background: linear-gradient(135deg,#ECFEFF,#CFFAFE); color: var(--cyan); }
.sico-amber  { background: linear-gradient(135deg,#FFFBEB,#FEF3C7); color: var(--warning); }
.sico-purple { background: linear-gradient(135deg,#F5F3FF,#EDE9FE); color: var(--purple); }

.stat-badge {
    font-size: 11px; font-weight: 700; padding: 4px 11px; border-radius: 30px;
    letter-spacing: .5px; text-transform: uppercase; white-space: nowrap;
}
.sb-green  { background: var(--success-light); color: #065F46; }
.sb-blue   { background: #DBEAFE; color: #1E40AF; }
.sb-amber  { background: var(--warning-light); color: #78350F; }
.sb-purple { background: var(--purple-light); color: #4C1D95; }

.stat-num {
    font-size: 38px; font-weight: 800; color: var(--txt);
    line-height: 1.15; margin-bottom: 4px;
    font-variant-numeric: tabular-nums;
}
.stat-lbl {
    font-size: 11px; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1px; color: var(--txt-3); margin-bottom: 12px;
}
.stat-foot {
    font-size: 12px; color: var(--txt-2);
    display: flex; align-items: center; gap: 6px;
    padding-top: 12px; border-top: 1px solid var(--border-lt);
}
.stat-foot i { color: var(--txt-3); font-size: 11px; }

/* trend badge */
.trend-up   { color: var(--success); font-weight: 700; }
.trend-down { color: var(--danger);  font-weight: 700; }

/* ============================================================
   ALERT
   ============================================================ */
.alert-mod {
    display: flex; align-items: flex-start; gap: 14px;
    padding: 14px 18px; border-radius: var(--r-md);
    margin-bottom: 20px; border: 1px solid transparent;
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

/* ============================================================
   MAIN CARD
   ============================================================ */
.main-card {
    background: var(--surf);
    border-radius: var(--r-xl);
    border: 1px solid var(--border);
    box-shadow: var(--sh-sm);
    overflow: hidden;
}
.mc-head {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 24px; border-bottom: 1px solid var(--border-lt);
    flex-wrap: wrap; gap: 14px;
    background: linear-gradient(to bottom, #FEFEFE, var(--surf));
}
.mc-ttl-grp { display: flex; align-items: center; gap: 14px; }
.mc-ttl-ico {
    width: 46px; height: 46px;
    background: linear-gradient(135deg, var(--pri-light), var(--pri-mid));
    border-radius: var(--r-md);
    display: flex; align-items: center; justify-content: center;
    color: var(--pri); font-size: 19px; flex-shrink: 0;
}
.mc-ttl-name { font-size: 17px; font-weight: 800; color: var(--txt); margin: 0; }
.mc-ttl-sub  { font-size: 12px; color: var(--txt-3); margin-top: 3px; }

/* Toolbar */
.toolbar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.srch-wrap { position: relative; }
.srch-wrap input {
    width: 250px; padding: 9px 14px 9px 40px;
    border: 1px solid var(--border); border-radius: var(--r-md);
    font-size: 13px; color: var(--txt); background: var(--surf-2);
    outline: none; transition: all .2s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.srch-wrap input:focus { border-color: var(--pri); background: #fff; box-shadow: 0 0 0 3px rgba(79,70,229,.1); }
.srch-ico { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: var(--txt-3); font-size: 13px; pointer-events: none; }
.btn-pdf {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 9px 18px; border-radius: var(--r-md);
    font-size: 13px; font-weight: 700; text-decoration: none !important;
    background: #FEF2F2; color: var(--danger) !important;
    border: 1px solid #FECACA; cursor: pointer;
    transition: all .2s ease;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.btn-pdf:hover { background: #FEE2E2; transform: translateY(-1px); box-shadow: var(--sh-sm); }

/* ============================================================
   TABLE  — no horizontal scroll, fits container like Data Pegawai
   ============================================================ */
.tbl-wrap { overflow: visible; }
.tbl { width: 100%; border-collapse: collapse; table-layout: fixed; }

/* Column widths — total = 100% */
.tbl colgroup .col-no     { width: 48px; }
.tbl colgroup .col-nama   { width: 20%; }
.tbl colgroup .col-ins    { width: 17%; }
.tbl colgroup .col-tujuan { width: 17%; }
.tbl colgroup .col-perihal{ width: 17%; }
.tbl colgroup .col-tgl    { width: 11%; }
.tbl colgroup .col-aksi   { width: 100px; }

.tbl thead tr { background: var(--surf-2); border-bottom: 2px solid var(--border); }
.tbl thead th {
    padding: 12px 10px;
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .8px; color: var(--txt-3);
    white-space: nowrap; user-select: none;
    overflow: hidden;
}
.tbl thead th:first-child { padding-left: 20px; }
.tbl thead th:last-child  { padding-right: 20px; text-align: center; }

.tbl tbody tr {
    border-bottom: 1px solid var(--border-lt);
    transition: background .15s;
    animation: rowIn .3s ease backwards;
}
.tbl tbody tr:hover { background: #F8F9FF; }
.tbl td { padding: 12px 10px; vertical-align: middle; font-size: 13px; overflow: hidden; }
.tbl td:first-child { padding-left: 20px; }
.tbl td:last-child  { padding-right: 20px; }

@keyframes rowIn {
    from { opacity:0; transform: translateY(8px); }
    to   { opacity:1; transform: none; }
}
.tbl tbody tr:nth-child(1) { animation-delay: .03s; }
.tbl tbody tr:nth-child(2) { animation-delay: .06s; }
.tbl tbody tr:nth-child(3) { animation-delay: .09s; }
.tbl tbody tr:nth-child(4) { animation-delay: .12s; }
.tbl tbody tr:nth-child(5) { animation-delay: .15s; }
.tbl tbody tr:nth-child(n+6) { animation-delay: .18s; }

/* Row number */
.row-num {
    width: 30px; height: 30px; border-radius: 50%;
    background: var(--surf-3);
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; font-weight: 700; color: var(--txt-3);
}

/* Avatar row */
.ava-row { display: flex; align-items: center; gap: 9px; min-width: 0; }
.ava {
    width: 38px; height: 38px; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: 13px; flex-shrink: 0;
    transition: transform .2s;
}
.ava:hover { transform: scale(1.06); }
.av0 { background: #EEF2FF; color: #4F46E5; }
.av1 { background: #ECFEFF; color: #06B6D4; }
.av2 { background: #F0FDF4; color: #10B981; }
.av3 { background: #FFFBEB; color: #F59E0B; }
.av4 { background: #F5F3FF; color: #8B5CF6; }
.av5 { background: #FFF1F2; color: #EF4444; }
.av6 { background: #FDF2F8; color: #DB2777; }
.ava-name { font-size: 13px; font-weight: 700; color: var(--txt); margin-bottom: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px; }
.ava-sub  { font-size: 11px; color: var(--txt-3); font-family: 'DM Mono', monospace; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px; }

/* Pills */
.pill {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 4px 9px; border-radius: 30px;
    font-size: 11px; font-weight: 600; white-space: nowrap;
    max-width: 100%; overflow: hidden; text-overflow: ellipsis;
}
.pill i { font-size: 10px; flex-shrink: 0; }
.pill-indigo { background: linear-gradient(135deg,#EEF2FF,#E0E7FF); color: #4338CA; }
.pill-teal   { background: linear-gradient(135deg,#F0FDFA,#CCFBF1); color: #0F766E; }
.pill-violet { background: linear-gradient(135deg,#F5F3FF,#EDE9FE); color: #5B21B6; }

/* Date cell */
.date-main { font-family: 'DM Mono', monospace; font-size: 12px; color: var(--txt); font-weight: 500; white-space: nowrap; }
.date-time { font-family: 'DM Mono', monospace; font-size: 11px; color: var(--txt-3); margin-top: 3px; white-space: nowrap; }

/* Actions */
.act-grp { display: flex; align-items: center; gap: 5px; justify-content: center; }
.act-btn {
    width: 32px; height: 32px; border-radius: var(--r-sm);
    border: 1px solid var(--border); background: var(--surf);
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; cursor: pointer; text-decoration: none;
    transition: all .2s ease; position: relative;
}
.act-view  { color: var(--cyan); }
.act-view:hover  { background: var(--cyan-light);    border-color: #A5F3FC; transform: translateY(-2px); box-shadow: var(--sh-sm); }
.act-edit  { color: var(--warning); }
.act-edit:hover  { background: var(--warning-light); border-color: #FCD34D; transform: translateY(-2px); box-shadow: var(--sh-sm); }
.act-del   { color: var(--danger); }
.act-del:hover   { background: var(--danger-light);  border-color: #FECACA; transform: translateY(-2px); box-shadow: var(--sh-sm); }

/* ============================================================
   EMPTY STATE
   ============================================================ */
.empty-wrap { text-align: center; padding: 64px 24px; }
.empty-ico {
    width: 84px; height: 84px; border-radius: 50%;
    background: var(--surf-3);
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 34px; color: var(--txt-3); margin-bottom: 20px;
}
.empty-ttl { font-size: 18px; font-weight: 800; color: var(--txt); margin-bottom: 8px; }
.empty-sub { font-size: 14px; color: var(--txt-3); margin-bottom: 24px; }

/* ============================================================
   PAGINATION  — style identik dengan Data Pegawai
   ============================================================ */
.pag-wrap {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 24px; border-top: 1px solid var(--border-lt);
    flex-wrap: wrap; gap: 14px;
    background: linear-gradient(to bottom, var(--surf), #FAFBFF);
}
.pag-info {
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; color: var(--txt-3); font-weight: 500;
}
.pag-info i { color: var(--pri); font-size: 13px; }
.pag-info strong { color: var(--txt); font-weight: 700; }

/* nav container */
.pag-nav {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
}

/* every page btn/link */
.pag-btn {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 36px; height: 36px; padding: 0 10px;
    border-radius: var(--r-sm); border: 1px solid var(--border);
    background: var(--surf); color: var(--txt-2);
    font-size: 13px; font-weight: 600; text-decoration: none !important;
    cursor: pointer; transition: all .2s ease; user-select: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.pag-btn:hover:not(.pag-active):not(.pag-disabled) {
    border-color: var(--pri); color: var(--pri);
    background: var(--pri-light); transform: translateY(-1px);
    box-shadow: var(--sh-sm);
}
.pag-active {
    background: linear-gradient(135deg, var(--pri), #6D28D9) !important;
    border-color: transparent !important; color: #fff !important;
    box-shadow: 0 4px 12px rgba(79,70,229,.35);
}
.pag-disabled {
    opacity: .4; cursor: not-allowed; pointer-events: none;
}
.pag-dots {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 36px; height: 36px;
    color: var(--txt-3); font-size: 14px; font-weight: 700; letter-spacing: 1px;
    user-select: none;
}

/* Prev / Next labels */
.pag-prev, .pag-next {
    gap: 6px; padding: 0 14px;
}

/* Page-of badge */
.pag-of {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 14px; border-radius: var(--r-sm);
    background: var(--surf-2); border: 1px solid var(--border);
    font-size: 12px; font-weight: 700; color: var(--txt-2);
    white-space: nowrap;
}
.pag-of i { color: var(--pri); font-size: 11px; }

/* ============================================================
   PROGRESS BAR (for stats footer)
   ============================================================ */
.progress-bar-wrap { margin-top: 8px; }
.progress-bar-track { height: 4px; background: var(--surf-3); border-radius: 4px; overflow: hidden; }
.progress-bar-fill  { height: 100%; border-radius: 4px; transition: width .6s ease; }

/* ============================================================
   TOOLTIP (title attr fallback already handles hover)
   ============================================================ */

/* ============================================================
   RESPONSIVE TWEAKS
   ============================================================ */
@media (max-width: 768px) {
    .hero-banner  { padding: 20px 18px 70px; }
    .content-area { padding: 0 14px 28px; }
    .mc-head      { padding: 14px 16px; }
    .srch-wrap input { width: 100%; }
    .toolbar      { width: 100%; }
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
                <span><i class="fas fa-users"></i> Data Tamu</span>
            </div>
            <h1 class="hero-title">
                <div class="ico-wrap"><i class="fas fa-address-book"></i></div>
                Data Tamu
            </h1>
            <p class="hero-sub">
                <i class="fas fa-chart-line"></i>
                Manajemen seluruh data kunjungan tamu &mdash; BKPSDM OKU Timur
            </p>
        </div>
        <div class="hero-right">
            <a href="{{ route('tamu.export.pdf') }}" class="btn-hero-sec">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <a href="{{ route('tamu.formulir.print') }}" target="_blank" class="btn-hero-sec" style="background:rgba(251,191,36,.18);border-color:rgba(245,158,11,.35);">
                <i class="fas fa-file-alt"></i> Cetak Formulir
            </a>
            <a href="{{ route('tamu.import.form') }}" class="btn-hero-sec" style="background:rgba(16,185,129,.2);border-color:rgba(16,185,129,.4);">
                <i class="fas fa-file-excel"></i> Import Excel
            </a>
            <a href="{{ route('tamu.create') }}" class="btn-hero-add">
                <i class="fas fa-plus-circle"></i> Tambah Tamu
            </a>
        </div>
    </div>
</div>

{{-- ============================================================
     CONTENT AREA (overlaps banner)
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
    @if(session('import_errors') && count(session('import_errors')) > 0)
    <div class="alert-mod" style="background:#FFFBEB;border-color:#FCD34D;" id="al-warn">
        <div class="am-icon" style="color:#F59E0B;"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="am-body">
            <div class="am-title" style="color:#78350F;">{{ count(session('import_errors')) }} baris dilewati saat import</div>
            <ul style="margin:6px 0 0;padding-left:18px;font-size:12px;color:#92400E;">
                @foreach(session('import_errors') as $err)<li>{{ $err }}</li>@endforeach
            </ul>
        </div>
        <button class="am-close" onclick="this.closest('.alert-mod').remove()"><i class="fas fa-times"></i></button>
    </div>
    @endif

    {{-- ============================================================
         STATS GRID — 4 CARDS
         ============================================================ --}}
    @php
        $tamuHariIni   = \App\Models\Tamu::whereDate('tanggal_kunjungan', today())->count();
        $totalInstansi = \App\Models\Tamu::distinct('instansi')->count('instansi');
        $totalBidang   = \App\Models\Tamu::distinct('bertemu_dengan')->count('bertemu_dengan');
        $totalAll      = $tamus->total();
        // Trend: tamu kemarin vs hari ini
        $tamuKemarin   = \App\Models\Tamu::whereDate('tanggal_kunjungan', today()->subDay())->count();
        $trendHariIni  = $tamuHariIni - $tamuKemarin;
    @endphp

    <div class="stats-grid">

        {{-- Card 1: Total Tamu --}}
        <div class="stat-card sc-indigo">
            <i class="fas fa-users wm"></i>
            <div class="stat-top">
                <div class="stat-ico sico-indigo"><i class="fas fa-users"></i></div>
                <span class="stat-badge sb-green">Semua Data</span>
            </div>
            <div class="stat-num">{{ number_format($totalAll, 0, ',', '.') }}</div>
            <div class="stat-lbl">Total Tamu</div>
            <div class="stat-foot">
                <i class="fas fa-database"></i>
                Seluruh kunjungan tercatat
            </div>
        </div>

        {{-- Card 2: Tamu Hari Ini --}}
        <div class="stat-card sc-cyan">
            <i class="fas fa-calendar-day wm"></i>
            <div class="stat-top">
                <div class="stat-ico sico-cyan"><i class="fas fa-calendar-day"></i></div>
                <span class="stat-badge sb-blue">{{ now()->translatedFormat('d M Y') }}</span>
            </div>
            <div class="stat-num">{{ number_format($tamuHariIni, 0, ',', '.') }}</div>
            <div class="stat-lbl">Tamu Hari Ini</div>
            <div class="stat-foot">
                @if($trendHariIni > 0)
                    <span class="trend-up"><i class="fas fa-arrow-up"></i> +{{ $trendHariIni }}</span> dari kemarin
                @elseif($trendHariIni < 0)
                    <span class="trend-down"><i class="fas fa-arrow-down"></i> {{ $trendHariIni }}</span> dari kemarin
                @else
                    <i class="fas fa-minus"></i> Sama seperti kemarin
                @endif
            </div>
        </div>

        {{-- Card 3: Instansi Berbeda --}}
        <div class="stat-card sc-amber">
            <i class="fas fa-building wm"></i>
            <div class="stat-top">
                <div class="stat-ico sico-amber"><i class="fas fa-building"></i></div>
                <span class="stat-badge sb-amber">Organisasi Unik</span>
            </div>
            <div class="stat-num">{{ number_format($totalInstansi, 0, ',', '.') }}</div>
            <div class="stat-lbl">Instansi Berbeda</div>
            <div class="stat-foot">
                <i class="fas fa-sitemap"></i>
                Variasi instansi pengunjung
            </div>
        </div>

        {{-- Card 4: Bidang Dituju --}}
        <div class="stat-card sc-purple">
            <i class="fas fa-door-open wm"></i>
            <div class="stat-top">
                <div class="stat-ico sico-purple"><i class="fas fa-door-open"></i></div>
                <span class="stat-badge sb-purple">Bidang Aktif</span>
            </div>
            <div class="stat-num">{{ number_format($totalBidang, 0, ',', '.') }}</div>
            <div class="stat-lbl">Bidang Dituju</div>
            <div class="stat-foot">
                <i class="fas fa-map-marker-alt"></i>
                Tujuan kunjungan aktif
            </div>
        </div>

    </div>{{-- /stats-grid --}}

    {{-- ============================================================
         MAIN TABLE CARD
         ============================================================ --}}
    <div class="main-card">

        {{-- Card Header --}}
        <div class="mc-head">
            <div class="mc-ttl-grp">
                <div class="mc-ttl-ico"><i class="fas fa-list-check"></i></div>
                <div>
                    <div class="mc-ttl-name">Daftar Kunjungan Tamu</div>
                    <div class="mc-ttl-sub">
                        <i class="fas fa-info-circle"></i>
                        Total <strong>{{ number_format($tamus->total(), 0, ',', '.') }}</strong> data tamu terdaftar
                    </div>
                </div>
            </div>
            <div class="toolbar">
                <div class="srch-wrap">
                    <i class="fas fa-search srch-ico"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama, instansi..." oninput="filterTbl(this.value)">
                </div>
                <a href="{{ route('tamu.export.pdf') }}" class="btn-pdf">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
                <a href="{{ route('tamu.formulir.print') }}" target="_blank" class="btn-pdf" style="background:#FEF3C7;color:#B45309 !important;border-color:#FCD34D;">
                    <i class="fas fa-file-alt"></i> Cetak Formulir
                </a>
                <a href="{{ route('tamu.import.form') }}" class="btn-pdf" style="background:#F0FDF4;color:#059669 !important;border-color:#86EFAC;">
                    <i class="fas fa-file-excel"></i> Import Excel
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="tbl-wrap">
            <table class="tbl" id="tamuTbl">
                <colgroup>
                    <col class="col-no">
                    <col class="col-nama">
                    <col class="col-ins">
                    <col class="col-tujuan">
                    <col class="col-perihal">
                    <col class="col-tgl">
                    <col class="col-aksi">
                </colgroup>
                <thead>
                    <tr>
                        <th style="width:56px">#</th>
                        <th>Nama Tamu</th>
                        <th>Instansi</th>
                        <th>Tujuan / Bidang</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th style="width:110px">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tamuBody">
                @forelse($tamus as $idx => $tamu)
                @php
                    $cIdx    = $idx % 7;
                    $inits   = strtoupper(mb_substr($tamu->nama, 0, 2));
                    $tgl     = \Carbon\Carbon::parse($tamu->tanggal_kunjungan)->translatedFormat('d M Y');
                    $jam     = \Carbon\Carbon::parse($tamu->tanggal_kunjungan)->format('H:i');
                    $rowNum  = $tamus->firstItem() + $idx;
                @endphp
                <tr>
                    {{-- # --}}
                    <td><span class="row-num">{{ $rowNum }}</span></td>

                    {{-- Nama --}}
                    <td>
                        <div class="ava-row">
                            <div class="ava av{{ $cIdx }}">{{ $inits }}</div>
                            <div style="min-width:0;flex:1">
                                <div class="ava-name">{{ $tamu->nama }}</div>
                                <div class="ava-sub"><i class="fas fa-id-card" style="margin-right:3px"></i>{{ $tamu->nip_nik }}</div>
                            </div>
                        </div>
                    </td>

                    {{-- Instansi --}}
                    <td>
                        <span class="pill pill-indigo" title="{{ $tamu->instansi }}">
                            <i class="fas fa-building"></i>
                            {{ Str::limit($tamu->instansi, 32) }}
                        </span>
                    </td>

                    {{-- Tujuan / Bidang --}}
                    <td>
                        <span class="pill pill-teal" title="{{ $tamu->bertemu_dengan }}">
                            <i class="fas fa-user-tie"></i>
                            {{ Str::limit($tamu->bertemu_dengan, 28) }}
                        </span>
                    </td>

                    {{-- Perihal --}}
                    <td>
                        <span class="pill pill-violet" title="{{ $tamu->perihal }}">
                            <i class="fas fa-file-alt"></i>
                            {{ Str::limit($tamu->perihal, 24) }}
                        </span>
                    </td>

                    {{-- Tanggal --}}
                    <td>
                        <div class="date-main">
                            <i class="fas fa-calendar-alt" style="color:var(--pri);font-size:10px;margin-right:5px"></i>{{ $tgl }}
                        </div>
                        <div class="date-time">
                            <i class="fas fa-clock" style="font-size:10px;margin-right:4px"></i>{{ $jam }}
                        </div>
                    </td>

                    {{-- Aksi --}}
                    <td>
                        <div class="act-grp">
                            <a href="{{ route('tamu.show', $tamu->id) }}" class="act-btn act-view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('tamu.edit', $tamu->id) }}" class="act-btn act-edit" title="Edit Data">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button class="act-btn act-del js-del-btn" data-id="{{ $tamu->id }}" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="del-{{ $tamu->id }}" action="{{ route('tamu.destroy', $tamu->id) }}"
                                  method="POST" style="display:none">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-wrap">
                            <div class="empty-ico"><i class="fas fa-users-slash"></i></div>
                            <div class="empty-ttl">Belum ada data tamu</div>
                            <div class="empty-sub">Mulai tambahkan data kunjungan tamu pertama Anda</div>
                            <a href="{{ route('tamu.create') }}" class="btn-hero-add" style="font-family:'Plus Jakarta Sans',sans-serif">
                                <i class="fas fa-plus-circle"></i> Tambah Tamu
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination — identik dengan Data Pegawai --}}
        @if($tamus->hasPages() || $tamus->total() > 0)
        <div class="pag-wrap">

            {{-- Kiri: info range --}}
            <div class="pag-info">
                <i class="fas fa-table-list"></i>
                Menampilkan
                <strong>{{ $tamus->firstItem() ?? 0 }}&ndash;{{ $tamus->lastItem() ?? 0 }}</strong>
                dari <strong>{{ number_format($tamus->total(), 0, ',', '.') }}</strong> data
            </div>

            {{-- Tengah: tombol navigasi --}}
            @if($tamus->hasPages())
            @php
                $currentPage  = $tamus->currentPage();
                $lastPage     = $tamus->lastPage();
                $window       = 1;
            @endphp
            <div class="pag-nav">

                {{-- Sebelumnya --}}
                @if($tamus->onFirstPage())
                    <span class="pag-btn pag-prev pag-disabled">
                        <i class="fas fa-chevron-left" style="font-size:11px"></i> Sebelumnya
                    </span>
                @else
                    <a href="{{ $tamus->previousPageUrl() }}" class="pag-btn pag-prev">
                        <i class="fas fa-chevron-left" style="font-size:11px"></i> Sebelumnya
                    </a>
                @endif

                {{-- Halaman 1 --}}
                @if($currentPage == 1)
                    <span class="pag-btn pag-active">1</span>
                @else
                    <a href="{{ $tamus->url(1) }}" class="pag-btn">1</a>
                @endif

                {{-- Ellipsis kiri --}}
                @if($currentPage > $window + 2)
                    <span class="pag-dots">&hellip;</span>
                @endif

                {{-- Window pages --}}
                @for($p = max(2, $currentPage - $window); $p <= min($lastPage - 1, $currentPage + $window); $p++)
                    @if($p == $currentPage)
                        <span class="pag-btn pag-active">{{ $p }}</span>
                    @else
                        <a href="{{ $tamus->url($p) }}" class="pag-btn">{{ $p }}</a>
                    @endif
                @endfor

                {{-- Ellipsis kanan --}}
                @if($currentPage < $lastPage - $window - 1)
                    <span class="pag-dots">&hellip;</span>
                @endif

                {{-- Halaman terakhir --}}
                @if($lastPage > 1)
                    @if($currentPage == $lastPage)
                        <span class="pag-btn pag-active">{{ $lastPage }}</span>
                    @else
                        <a href="{{ $tamus->url($lastPage) }}" class="pag-btn">{{ $lastPage }}</a>
                    @endif
                @endif

                {{-- Selanjutnya --}}
                @if($tamus->hasMorePages())
                    <a href="{{ $tamus->nextPageUrl() }}" class="pag-btn pag-next">
                        Selanjutnya <i class="fas fa-chevron-right" style="font-size:11px"></i>
                    </a>
                @else
                    <span class="pag-btn pag-next pag-disabled">
                        Selanjutnya <i class="fas fa-chevron-right" style="font-size:11px"></i>
                    </span>
                @endif

            </div>{{-- /pag-nav --}}

            {{-- Badge Halaman X dari Y --}}
            <div class="pag-of">
                <i class="fas fa-book-open"></i>
                Halaman <strong>{{ $currentPage }}</strong> dari <strong>{{ $lastPage }}</strong>
            </div>
            @endif

        </div>
        @endif

    </div>{{-- /main-card --}}

</div>{{-- /content-area --}}

<script>
/* ============================================================
   SEARCH FILTER
   ============================================================ */
function filterTbl(q) {
    var s = q.toLowerCase();
    document.querySelectorAll('#tamuBody tr').forEach(function(row) {
        row.style.display = row.textContent.toLowerCase().includes(s) ? '' : 'none';
    });
}

/* ============================================================
   DELETE CONFIRMATION
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.js-del-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var id = btn.getAttribute('data-id');
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah Anda yakin ingin menghapus data tamu ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    borderRadius: '12px'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        document.getElementById('del-' + id).submit();
                    }
                });
            } else if (confirm('Apakah Anda yakin ingin menghapus data tamu ini?')) {
                document.getElementById('del-' + id).submit();
            }
        });
    });

    /* Auto-dismiss alerts after 5 s */
    setTimeout(function () {
        ['al-ok', 'al-err'].forEach(function (aid) {
            var el = document.getElementById(aid);
            if (!el) return;
            el.style.transition = 'opacity .5s ease';
            el.style.opacity    = '0';
            setTimeout(function () { if (el && el.parentNode) el.remove(); }, 500);
        });
    }, 5000);

});
</script>
@endsection