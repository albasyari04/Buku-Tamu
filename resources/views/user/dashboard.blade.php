@extends('layouts.user')

@section('title', 'Dashboard Portal Tamu — BKPSDM OKU Timur')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">

<style>
/* ==========================================================
   DASHBOARD USER — PROFESSIONAL ELEGANT v3
   FULL-WIDTH MENTOK KANAN-KIRI
========================================================== */

:root {
    --ind:       #4F46E5;
    --ind-dk:    #4338CA;
    --ind-lt:    #6366F1;
    --ind-50:    #EEF2FF;
    --ind-100:   #E0E7FF;
    --ind-200:   #C7D2FE;
    --sl-50:     #F8FAFC;
    --sl-100:    #F1F5F9;
    --sl-200:    #E2E8F0;
    --sl-400:    #94A3B8;
    --sl-500:    #64748B;
    --sl-600:    #475569;
    --sl-700:    #334155;
    --sl-800:    #1E293B;
    --sl-900:    #0F172A;
    --grn:       #10B981;
    --grn-50:    #F0FDF4;
    --ylw:       #F59E0B;
    --ylw-50:    #FFFBEB;
    --sky:       #0EA5E9;
    --sky-50:    #F0F9FF;
    --r:         20px;
    --sh-sm:     0 2px 10px rgba(0,0,0,.05);
    --sh-md:     0 4px 20px rgba(0,0,0,.07);
    --sh-lg:     0 8px 32px rgba(0,0,0,.10);
    --sh-ind:    0 6px 24px rgba(79,70,229,.22);
    --fh:        'Plus Jakarta Sans', sans-serif;
    --fb:        'DM Sans', sans-serif;
}

/* ----------------------------------------------------------
   FULL-WIDTH BREAKOUT
   Memaksa keluar dari container/wrapper parent apapun
---------------------------------------------------------- */
.dash-page {
    /* Breakout dari parent container */
    position: relative;
    left: 50%;
    right: 50%;
    margin-left:  -50vw !important;
    margin-right: -50vw !important;
    width:        100vw !important;
    max-width:    100vw !important;
    box-sizing:   border-box;

    min-height: calc(100vh - 64px);
    background: #F2F4FB;
    font-family: var(--fb);
    overflow-x: hidden;
}

.dash-inner {
    width: 100%;
    display: flex;
    flex-direction: column;
    overflow-x: hidden;
}

/* ----------------------------------------------------------
   ANIMATIONS
---------------------------------------------------------- */
@keyframes fadeUp {
    from { opacity:0; transform:translateY(18px); }
    to   { opacity:1; transform:translateY(0); }
}
@keyframes scaleIn {
    from { opacity:0; transform:scale(.96); }
    to   { opacity:1; transform:scale(1); }
}
.a1 { animation: scaleIn .42s cubic-bezier(.22,.68,0,1.2) both; }
.a2 { animation: fadeUp .38s ease .10s both; }
.a3 { animation: fadeUp .38s ease .18s both; }
.a4 { animation: fadeUp .38s ease .26s both; }
.a5 { animation: fadeUp .38s ease .34s both; }

/* ==========================================================
   ROW 1 — HERO + PROFILE
========================================================== */
.top-row {
    padding: 1.75rem 2rem;
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 1.5rem;
    align-items: start;
    box-sizing: border-box;
    width: 100%;
}
@media (max-width:960px) { .top-row { grid-template-columns:1fr; padding:1rem; } }

/* ── Hero ── */
.hero-card {
    background: linear-gradient(135deg,#EEF2FF 0%,#F5F3FF 45%,#EFF6FF 100%);
    border-radius: var(--r);
    box-shadow: var(--sh-md);
    padding: 2.75rem 2.5rem;
    position: relative;
    overflow: hidden;
    min-height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.hero-card::before {
    content:'';
    position:absolute;
    width:380px;height:380px;
    background:radial-gradient(circle,rgba(99,102,241,.14) 0%,transparent 65%);
    top:-120px;right:140px;
    pointer-events:none;
}
.hero-card::after {
    content:'';
    position:absolute;
    width:220px;height:220px;
    background:radial-gradient(circle,rgba(79,70,229,.09) 0%,transparent 65%);
    bottom:-70px;left:30px;
    pointer-events:none;
}

.hero-content {
    position:relative;
    z-index:2;
    max-width:430px;
}

.hero-eyebrow {
    display:inline-flex;
    align-items:center;
    gap:.4rem;
    font-family:var(--fh);
    font-size:.7rem;
    font-weight:700;
    color:var(--ind);
    letter-spacing:.1em;
    text-transform:uppercase;
    background:var(--ind-50);
    border:1px solid var(--ind-200);
    border-radius:30px;
    padding:.28rem .75rem;
    margin-bottom:1rem;
}
.hero-eyebrow i { font-size:.6rem; }

.hero-title {
    font-family:var(--fh);
    font-size:2.15rem;
    font-weight:900;
    color:var(--sl-900);
    line-height:1.17;
    margin-bottom:.85rem;
}
.hero-title .brand { color:var(--ind); }

.hero-desc {
    font-size:.84rem;
    color:var(--sl-500);
    line-height:1.65;
    margin-bottom:1.75rem;
    max-width:360px;
}

.hero-btns { display:flex; gap:.7rem; flex-wrap:wrap; }

.btn-primary {
    display:inline-flex;
    align-items:center;
    gap:.45rem;
    background:linear-gradient(135deg,var(--ind),var(--ind-lt));
    color:#fff;
    font-family:var(--fh);
    font-size:.82rem;
    font-weight:700;
    padding:.72rem 1.5rem;
    border-radius:50px;
    text-decoration:none;
    box-shadow:var(--sh-ind);
    transition:all .22s ease;
}
.btn-primary:hover { transform:translateY(-2px); box-shadow:0 12px 28px rgba(79,70,229,.38); color:#fff; }

.btn-outline {
    display:inline-flex;
    align-items:center;
    gap:.45rem;
    background:rgba(255,255,255,.9);
    color:var(--ind);
    font-family:var(--fh);
    font-size:.82rem;
    font-weight:700;
    padding:.72rem 1.5rem;
    border-radius:50px;
    text-decoration:none;
    border:1.5px solid var(--ind-200);
    transition:all .22s ease;
}
.btn-outline:hover { background:var(--ind-50); color:var(--ind-dk); }

/* Building image */
.hero-visual {
    position:absolute;
    right:0;top:0;bottom:0;
    width:42%;
    z-index:1;
    overflow:hidden;
    border-radius:0 var(--r) var(--r) 0;
}
.hero-visual img {
    width:100%;height:100%;
    object-fit:cover;
    object-position:center;
    opacity:.9;
    transition:transform .6s ease;
}
.hero-card:hover .hero-visual img { transform:scale(1.03); }
.hero-visual::before {
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(90deg,#EEF2FF 0%,rgba(238,242,255,.15) 30%,transparent 60%);
    z-index:2;
}

/* Floating badge */
.hero-badge {
    position:absolute;
    right:1.5rem;bottom:1.5rem;
    z-index:4;
    background:rgba(255,255,255,.92);
    backdrop-filter:blur(12px);
    border:1px solid rgba(199,210,254,.5);
    border-radius:14px;
    padding:.75rem 1.1rem;
    display:flex;
    align-items:center;
    gap:.65rem;
    box-shadow:0 6px 20px rgba(0,0,0,.08);
}
.hero-badge-icon {
    width:36px;height:36px;
    border-radius:10px;
    background:linear-gradient(135deg,var(--ind),var(--ind-lt));
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:.85rem;
    box-shadow:0 4px 10px rgba(79,70,229,.35);
}
.hero-badge-text strong { display:block; font-family:var(--fh); font-size:.8rem; font-weight:800; color:var(--sl-900); }
.hero-badge-text span   { font-size:.69rem; color:var(--sl-400); }

@media (max-width:768px) {
    .hero-visual { display:none; }
    .hero-title  { font-size:1.65rem; }
    .hero-badge  { display:none; }
}

/* ── Profile Card ── */
.profile-card {
    background:#fff;
    border-radius:var(--r);
    box-shadow:var(--sh-md);
    overflow:hidden;
    transition:box-shadow .25s;
}
.profile-card:hover { box-shadow:var(--sh-lg); }

.profile-header {
    background:linear-gradient(145deg,#4338CA 0%,#4F46E5 50%,#6366F1 100%);
    padding:1.75rem 1.5rem 3rem;
    text-align:center;
    position:relative;
    overflow:hidden;
}
.profile-header::before {
    content:'';
    position:absolute;
    width:160px;height:160px;
    border-radius:50%;
    background:rgba(255,255,255,.07);
    top:-40px;right:-30px;
}
.profile-header::after {
    content:'';
    position:absolute;
    width:100px;height:100px;
    border-radius:50%;
    background:rgba(255,255,255,.05);
    bottom:10px;left:-20px;
}
.profile-avatar {
    width:72px;height:72px;
    border-radius:50%;
    background:rgba(255,255,255,.22);
    border:3px solid rgba(255,255,255,.55);
    color:#fff;
    font-family:var(--fh);
    font-size:1.6rem;
    font-weight:900;
    display:flex;align-items:center;justify-content:center;
    margin:0 auto .85rem;
    position:relative;z-index:1;
    box-shadow:0 4px 16px rgba(0,0,0,.15);
}
.profile-name {
    font-family:var(--fh);
    font-size:1rem;
    font-weight:800;
    color:#fff;
    margin-bottom:.3rem;
    position:relative;z-index:1;
}
.profile-badge {
    display:inline-block;
    background:rgba(255,255,255,.18);
    color:rgba(255,255,255,.95);
    font-size:.68rem;
    font-weight:700;
    padding:.2rem .7rem;
    border-radius:20px;
    letter-spacing:.05em;
    border:1px solid rgba(255,255,255,.22);
    position:relative;z-index:1;
}

.profile-body {
    padding:1.5rem;
    margin-top:-1.2rem;
    background:#fff;
    border-radius:18px 18px 0 0;
    position:relative;z-index:2;
}
.pinfo-row {
    display:flex;
    align-items:center;
    gap:.65rem;
    padding:.6rem 0;
    border-bottom:1px solid var(--sl-100);
}
.pinfo-row:last-of-type { border-bottom:none; }
.pinfo-ico {
    width:30px;height:30px;
    border-radius:8px;
    background:var(--ind-50);
    color:var(--ind);
    display:flex;align-items:center;justify-content:center;
    font-size:.7rem;
    flex-shrink:0;
}
.pinfo-ico.green { background:var(--grn-50); color:var(--grn); }
.pinfo-ico.sky   { background:var(--sky-50); color:var(--sky); }
.pinfo-lbl { font-size:.67rem; color:var(--sl-400); font-weight:500; margin-bottom:.06rem; }
.pinfo-val { font-size:.8rem; font-weight:700; color:var(--sl-800); }

.status-pulse {
    display:inline-flex;align-items:center;gap:.35rem;
    color:var(--grn);font-size:.8rem;font-weight:700;
}
.pulse-dot {
    width:7px;height:7px;
    border-radius:50%;
    background:var(--grn);
    box-shadow:0 0 0 3px rgba(16,185,129,.2);
    animation:pulse 2s infinite;
}
@keyframes pulse {
    0%,100% { box-shadow:0 0 0 3px rgba(16,185,129,.2); }
    50%      { box-shadow:0 0 0 5px rgba(16,185,129,.07); }
}

.btn-logout {
    display:flex;
    align-items:center;justify-content:center;
    gap:.45rem;
    width:100%;
    background:var(--sl-50);
    border:1.5px solid var(--sl-200);
    color:var(--sl-500);
    font-family:var(--fh);
    font-size:.79rem;
    font-weight:700;
    padding:.65rem;
    border-radius:12px;
    text-decoration:none;
    margin-top:1rem;
    transition:all .2s ease;
    cursor:pointer;
}
.btn-logout:hover { background:#FFF5F5; border-color:#FECACA; color:#EF4444; }

/* ==========================================================
   ROW 2 — STATS STRIP (background penuh)
========================================================== */
.stats-section {
    background:#fff;
    border-top:1px solid var(--sl-100);
    border-bottom:1px solid var(--sl-100);
    padding:1.25rem 2rem;
    width:100%;
    box-sizing:border-box;
}
.stats-grid {
    display:grid;
    grid-template-columns:repeat(4,1fr) 1.3fr;
    gap:1rem;
    align-items:center;
}
@media (max-width:1000px) { .stats-grid { grid-template-columns:repeat(3,1fr); } }
@media (max-width:640px)  { .stats-grid { grid-template-columns:repeat(2,1fr); } }

.stat-card {
    background:var(--sl-50);
    border-radius:16px;
    padding:1.1rem 1.25rem;
    display:flex;align-items:center;gap:.85rem;
    border:1px solid var(--sl-100);
    transition:all .22s ease;
    cursor:default;
}
.stat-card:hover {
    background:#fff;
    border-color:var(--ind-200);
    box-shadow:var(--sh-sm);
    transform:translateY(-1px);
}
.stat-ico {
    width:46px;height:46px;
    border-radius:14px;
    display:flex;align-items:center;justify-content:center;
    font-size:.95rem;flex-shrink:0;
}
.ico-ind { background:var(--ind-50); color:var(--ind); }
.ico-grn { background:var(--grn-50); color:var(--grn); }
.ico-ylw { background:var(--ylw-50); color:var(--ylw); }
.ico-sky { background:var(--sky-50); color:var(--sky); }

.stat-lbl  { font-size:.67rem; color:var(--sl-400); font-weight:600; letter-spacing:.04em; text-transform:uppercase; margin-bottom:.12rem; }
.stat-val  { font-family:var(--fh); font-size:1.4rem; font-weight:900; color:var(--sl-900); line-height:1; margin-bottom:.06rem; }
.stat-desc { font-size:.68rem; color:var(--sl-500); }

.help-card {
    background:linear-gradient(135deg,#4338CA,#6366F1);
    border-radius:16px;
    padding:1.1rem 1.25rem;
    display:flex;flex-direction:column;gap:.35rem;
    box-shadow:0 6px 20px rgba(79,70,229,.25);
    transition:all .22s ease;
}
.help-card:hover { transform:translateY(-2px); box-shadow:0 10px 28px rgba(79,70,229,.35); }
.help-ico {
    width:36px;height:36px;
    border-radius:10px;
    background:rgba(255,255,255,.18);
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:.88rem;margin-bottom:.2rem;
}
.help-title { font-family:var(--fh); font-size:.85rem; font-weight:800; color:#fff; }
.help-sub   { font-size:.7rem; color:rgba(255,255,255,.75); line-height:1.4; }
.help-link  {
    display:inline-flex;align-items:center;gap:.3rem;
    color:rgba(255,255,255,.9);font-size:.72rem;font-weight:700;
    text-decoration:none;margin-top:.25rem;transition:all .18s;
}
.help-link:hover { color:#fff; gap:.5rem; }

/* ==========================================================
   ROW 3 — STEPS + INFO + MAP
========================================================== */
.content-section {
    padding:1.75rem 2rem;
    display:grid;
    grid-template-columns:1fr 320px;
    gap:1.5rem;
    align-items:start;
    box-sizing:border-box;
    width:100%;
}
@media (max-width:960px) { .content-section { grid-template-columns:1fr; padding:1rem; } }

/* ── Steps Card ── */
.steps-card {
    background:#fff;
    border-radius:var(--r);
    box-shadow:var(--sh-sm);
    border:1px solid var(--sl-100);
    padding:1.75rem 2rem;
}
.card-title {
    font-family:var(--fh);
    font-size:1.05rem;
    font-weight:800;
    color:var(--sl-900);
    margin-bottom:.22rem;
}
.card-sub {
    font-size:.78rem;
    color:var(--sl-400);
    margin-bottom:1.75rem;
    line-height:1.5;
}

.steps-row { display:flex; align-items:flex-start; position:relative; }
.step-item {
    flex:1;display:flex;flex-direction:column;align-items:center;
    text-align:center;position:relative;
}
.step-item:not(:last-child)::after {
    content:'';position:absolute;
    top:28px;
    left:calc(50% + 28px);right:calc(-50% + 28px);
    height:2px;
    background:repeating-linear-gradient(90deg,var(--ind-200) 0,var(--ind-200) 6px,transparent 6px,transparent 12px);
    z-index:0;
}
.step-num {
    width:24px;height:24px;border-radius:50%;
    background:var(--ind);color:#fff;
    font-size:.65rem;font-weight:800;
    display:flex;align-items:center;justify-content:center;
    margin-bottom:.5rem;
    font-family:var(--fh);
    position:relative;z-index:1;
    box-shadow:0 3px 8px rgba(79,70,229,.35);
}
.step-num.done { background:var(--grn); box-shadow:0 3px 8px rgba(16,185,129,.35); }
.step-ico-box {
    width:56px;height:56px;border-radius:18px;
    display:flex;align-items:center;justify-content:center;
    font-size:1.1rem;margin-bottom:.6rem;
    transition:transform .22s ease;
    position:relative;z-index:1;
}
.step-item:hover .step-ico-box { transform:translateY(-3px); }
.s1 { background:var(--ind-50); color:var(--ind);  box-shadow:0 4px 12px rgba(79,70,229,.15); }
.s2 { background:var(--sky-50); color:var(--sky);  box-shadow:0 4px 12px rgba(14,165,233,.12); }
.s3 { background:var(--ylw-50); color:var(--ylw);  box-shadow:0 4px 12px rgba(245,158,11,.12); }
.s4 { background:var(--grn-50); color:var(--grn);  box-shadow:0 4px 12px rgba(16,185,129,.12); }
.step-name { font-family:var(--fh); font-size:.79rem; font-weight:800; color:var(--sl-800); margin-bottom:.28rem; }
.step-desc { font-size:.69rem; color:var(--sl-400); line-height:1.4; padding:0 .2rem; }

/* ── Right col ── */
.right-col { display:flex; flex-direction:column; gap:1.25rem; }

.info-card {
    background:#fff;border-radius:18px;
    box-shadow:var(--sh-sm);border:1px solid var(--sl-100);
    padding:1.5rem;
}
.info-item {
    display:flex;align-items:flex-start;gap:.8rem;
    padding:.65rem 0;border-bottom:1px solid var(--sl-100);
}
.info-item:last-child { border-bottom:none; padding-bottom:0; }
.info-ico {
    width:34px;height:34px;border-radius:10px;
    display:flex;align-items:center;justify-content:center;
    font-size:.78rem;flex-shrink:0;margin-top:2px;
}
.info-item strong { font-family:var(--fh); font-size:.8rem; font-weight:800; color:var(--sl-800); display:block; margin-bottom:.1rem; }
.info-item span   { font-size:.73rem; color:var(--sl-500); line-height:1.45; }

.map-card {
    background:#fff;border-radius:18px;
    box-shadow:var(--sh-sm);border:1px solid var(--sl-100);
    overflow:hidden;
}
.map-card-head { padding:1.1rem 1.4rem .8rem; }
.map-visual {
    width:100%;height:130px;
    background:linear-gradient(135deg,#DBEAFE 0%,var(--ind-50) 100%);
    display:flex;align-items:center;justify-content:center;
    position:relative;overflow:hidden;
}
.map-visual::before {
    content:'';position:absolute;inset:0;
    background-image:
        repeating-linear-gradient(0deg,rgba(79,70,229,.05) 0,rgba(79,70,229,.05) 1px,transparent 1px,transparent 30px),
        repeating-linear-gradient(90deg,rgba(79,70,229,.05) 0,rgba(79,70,229,.05) 1px,transparent 1px,transparent 30px);
}
.map-pin {
    width:44px;height:44px;border-radius:50%;
    background:linear-gradient(135deg,var(--ind),var(--ind-lt));
    color:#fff;display:flex;align-items:center;justify-content:center;
    font-size:1.05rem;box-shadow:0 6px 18px rgba(79,70,229,.4);
    position:relative;z-index:1;
}
.map-card-body   { padding:1rem 1.4rem 1.25rem; }
.map-name        { font-family:var(--fh); font-size:.9rem; font-weight:800; color:var(--sl-900); margin-bottom:.22rem; }
.map-addr        { font-size:.74rem; color:var(--sl-500); line-height:1.45; }

/* ==========================================================
   ROW 4 — RIWAYAT TABLE
========================================================== */
.table-section {
    padding:0 2rem 2rem;
    box-sizing:border-box;
    width:100%;
}
@media (max-width:960px) { .table-section { padding:0 1rem 2rem; } }

.recent-card {
    background:#fff;border-radius:var(--r);
    box-shadow:var(--sh-sm);border:1px solid var(--sl-100);
    overflow:hidden;
}
.recent-head {
    padding:1.5rem 1.75rem 1.1rem;
    display:flex;align-items:center;justify-content:space-between;
    border-bottom:1px solid var(--sl-100);
}
.recent-sub { font-size:.74rem; color:var(--sl-400); margin-top:.06rem; }

.btn-see-all {
    display:inline-flex;align-items:center;gap:.35rem;
    background:var(--ind-50);color:var(--ind);
    font-family:var(--fh);font-size:.76rem;font-weight:700;
    padding:.42rem 1rem;border-radius:20px;
    text-decoration:none;border:1px solid var(--ind-100);
    transition:all .2s ease;white-space:nowrap;
}
.btn-see-all:hover { background:var(--ind-100); color:var(--ind-dk); }

.recent-table { width:100%; border-collapse:collapse; }
.recent-table thead tr { background:var(--sl-50); border-bottom:1px solid var(--sl-100); }
.recent-table thead th {
    font-family:var(--fh);font-size:.68rem;font-weight:700;
    color:var(--sl-400);letter-spacing:.06em;text-transform:uppercase;
    padding:.8rem 1.5rem;white-space:nowrap;
}
.recent-table tbody tr { border-bottom:1px solid var(--sl-50); transition:background .15s; }
.recent-table tbody tr:last-child { border-bottom:none; }
.recent-table tbody tr:hover { background:#FAFBFF; }
.recent-table tbody td { padding:.9rem 1.5rem; font-size:.81rem; color:var(--sl-700); vertical-align:middle; }
.date-main { font-family:var(--fh); font-weight:700; color:var(--sl-800); font-size:.8rem; }
.date-sub  { font-size:.68rem; color:var(--sl-400); margin-top:.1rem; display:flex; align-items:center; gap:.25rem; }
.badge-done {
    display:inline-flex;align-items:center;gap:.3rem;
    background:var(--grn-50);color:var(--grn);
    font-size:.69rem;font-weight:700;
    padding:.28rem .65rem;border-radius:20px;
    border:1px solid #BBF7D0;
}

.empty-state { padding:3rem 1.5rem; text-align:center; }
.empty-ico {
    width:56px;height:56px;border-radius:16px;
    background:var(--ind-50);color:var(--ind);
    display:flex;align-items:center;justify-content:center;
    font-size:1.15rem;margin:0 auto .85rem;
}
.empty-title { font-family:var(--fh); font-size:.92rem; font-weight:800; color:var(--sl-900); margin-bottom:.28rem; }
.empty-sub   { font-size:.77rem; color:var(--sl-400); }

/* ==========================================================
   FOOTER
========================================================== */
.dash-footer {
    text-align:center;
    padding:1.25rem 2rem;
    font-size:.73rem;
    color:var(--sl-400);
    border-top:1px solid var(--sl-100);
    background:#fff;
    display:flex;align-items:center;justify-content:center;
    gap:.4rem;
}

/* ==========================================================
   RESPONSIVE
========================================================== */
@media (max-width:640px) {
    .top-row, .content-section, .table-section { padding:1rem; }
    .stats-section  { padding:1rem; }
    .hero-card      { min-height:auto; padding:1.75rem 1.5rem; }
    .hero-title     { font-size:1.5rem; }
    .steps-card     { padding:1.25rem; }
    .recent-head    { padding:1.1rem; }
    .recent-table thead th,
    .recent-table tbody td { padding:.7rem .9rem; }
}
</style>
@endpush

@section('content')
<div class="dash-page">
<div class="dash-inner">

{{-- ══════════════════════════════════════
     ROW 1 — HERO + PROFILE
══════════════════════════════════════ --}}
<div class="top-row a1">

    {{-- Hero --}}
    <div class="hero-card">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fas fa-building"></i> Selamat datang di
            </div>
            <h1 class="hero-title">
                Portal Tamu <span class="brand">BKPSDM</span><br>
                <span class="brand">OKU Timur</span>
            </h1>
            <p class="hero-desc">
                Silakan isi buku tamu untuk keperluan administrasi
                dan keamanan di lingkungan BKPSDM OKU Timur.
            </p>
            <div class="hero-btns">
                <a href="{{ route('user.form') }}" class="btn-primary">
                    <i class="fas fa-pen-to-square"></i> Isi Buku Tamu
                </a>
                <a href="{{ route('user.riwayat') }}" class="btn-outline">
                    <i class="fas fa-clock-rotate-left"></i> Lihat Riwayat Kunjungan
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <img src="{{ asset('images/bangunan.jpg') }}" alt="Gedung BKPSDM OKU Timur">
        </div>

        <div class="hero-badge">
            <div class="hero-badge-icon"><i class="fas fa-clipboard-check"></i></div>
            <div class="hero-badge-text">
                <strong>Buku Tamu Digital</strong>
                <span>Sistem Terintegrasi BKPSDM</span>
            </div>
        </div>
    </div>

    {{-- Profile --}}
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div class="profile-name">{{ $user->name }}</div>
            <span class="profile-badge">Tamu</span>
        </div>
        <div class="profile-body">
            <div class="pinfo-row">
                <div class="pinfo-ico"><i class="fas fa-envelope"></i></div>
                <div>
                    <div class="pinfo-lbl">Email</div>
                    <div class="pinfo-val" style="font-size:.74rem;word-break:break-all;">{{ $user->email }}</div>
                </div>
            </div>
            <div class="pinfo-row">
                <div class="pinfo-ico sky"><i class="fas fa-calendar-days"></i></div>
                <div>
                    <div class="pinfo-lbl">Tanggal Hari Ini</div>
                    <div class="pinfo-val">{{ now()->translatedFormat('d F Y') }}</div>
                </div>
            </div>
            <div class="pinfo-row">
                <div class="pinfo-ico green"><i class="fas fa-circle-check"></i></div>
                <div>
                    <div class="pinfo-lbl">Status Akun</div>
                    <div class="pinfo-val">
                        <span class="status-pulse"><span class="pulse-dot"></span> Akun Aktif</span>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" id="logout-dash">
                @csrf
                <a href="#" class="btn-logout"
                   onclick="event.preventDefault();document.getElementById('logout-dash').submit();">
                    <i class="fas fa-right-from-bracket"></i> Keluar
                </a>
            </form>
        </div>
    </div>

</div>{{-- /.top-row --}}

{{-- ══════════════════════════════════════
     ROW 2 — STATS
══════════════════════════════════════ --}}
@php
    $lastVisit = \App\Models\Tamu::where('nama', 'like', '%' . $user->name . '%')
        ->orderByDesc('tanggal_kunjungan')->first();
@endphp

<div class="stats-section a2">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-ico ico-ind"><i class="fas fa-book-open"></i></div>
            <div>
                <div class="stat-lbl">Total Kunjungan</div>
                <div class="stat-val">{{ number_format($totalKunjungan,0,',','.') }}</div>
                <div class="stat-desc">Kunjungan Anda</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-ico ico-grn"><i class="fas fa-calendar-day"></i></div>
            <div>
                <div class="stat-lbl">Kunjungan Hari Ini</div>
                <div class="stat-val">{{ number_format($tamuHariIni,0,',','.') }}</div>
                <div class="stat-desc">Kunjungan</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-ico ico-ylw"><i class="fas fa-clock"></i></div>
            <div>
                <div class="stat-lbl">Terakhir Kunjungan</div>
                <div class="stat-val" style="font-size:.95rem;line-height:1.3;margin-top:.1rem;">
                    @if($lastVisit)
                        {{ \Carbon\Carbon::parse($lastVisit->tanggal_kunjungan)->translatedFormat('d M Y') }}
                    @else —
                    @endif
                </div>
                <div class="stat-desc">
                    @if($lastVisit) {{ \Carbon\Carbon::parse($lastVisit->tanggal_kunjungan)->format('H:i') }} WIB
                    @else Belum ada kunjungan
                    @endif
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-ico ico-sky"><i class="fas fa-building"></i></div>
            <div>
                <div class="stat-lbl">Lokasi Kunjungan</div>
                <div class="stat-val" style="font-size:.95rem;line-height:1.3;margin-top:.1rem;">BKPSDM</div>
                <div class="stat-desc">OKU Timur</div>
            </div>
        </div>
        <div class="help-card">
            <div class="help-ico"><i class="fas fa-headset"></i></div>
            <div class="help-title">Butuh Bantuan?</div>
            <div class="help-sub">Tim kami siap membantu Anda jika mengalami kendala.</div>
            <a href="#" class="help-link">Hubungi Petugas <i class="fas fa-arrow-right" style="font-size:.6rem;"></i></a>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     ROW 3 — STEPS + INFO + MAP
══════════════════════════════════════ --}}
<div class="content-section a3">

    <div class="steps-card">
        <div class="card-title">Langkah Pengisian Buku Tamu</div>
        <div class="card-sub">Ikuti langkah mudah berikut untuk mengisi buku tamu secara digital.</div>
        <div class="steps-row">
            <div class="step-item">
                <div class="step-num">1</div>
                <div class="step-ico-box s1"><i class="fas fa-file-pen"></i></div>
                <div class="step-name">Isi Formulir</div>
                <div class="step-desc">Lengkapi data diri dan keperluan kunjungan Anda.</div>
            </div>
            <div class="step-item">
                <div class="step-num">2</div>
                <div class="step-ico-box s2"><i class="fas fa-shield-check"></i></div>
                <div class="step-name">Verifikasi Data</div>
                <div class="step-desc">Pastikan data yang Anda isi sudah benar.</div>
            </div>
            <div class="step-item">
                <div class="step-num">3</div>
                <div class="step-ico-box s3"><i class="fas fa-paper-plane"></i></div>
                <div class="step-name">Kirim Data</div>
                <div class="step-desc">Kirim data kunjungan Anda ke sistem kami.</div>
            </div>
            <div class="step-item">
                <div class="step-num done">4</div>
                <div class="step-ico-box s4"><i class="fas fa-circle-check"></i></div>
                <div class="step-name">Selesai</div>
                <div class="step-desc">Data berhasil disimpan. Terima kasih!</div>
            </div>
        </div>
    </div>

    <div class="right-col">
        <div class="info-card">
            <div class="card-title" style="margin-bottom:.9rem;">Informasi Penting</div>
            <div class="info-item">
                <div class="info-ico" style="background:var(--ind-50);color:var(--ind);"><i class="fas fa-shield-halved"></i></div>
                <div>
                    <strong>Keamanan Data</strong>
                    <span>Data Anda aman dan hanya digunakan untuk keperluan administrasi.</span>
                </div>
            </div>
            <div class="info-item">
                <div class="info-ico" style="background:var(--sky-50);color:var(--sky);"><i class="fas fa-clock"></i></div>
                <div>
                    <strong>Jam Operasional</strong>
                    <span>Senin – Jumat, 08:00 – 16:00 WIB</span>
                </div>
            </div>
            <div class="info-item">
                <div class="info-ico" style="background:var(--ylw-50);color:var(--ylw);"><i class="fas fa-circle-info"></i></div>
                <div>
                    <strong>Bantuan</strong>
                    <span>Jika mengalami kendala, silakan hubungi petugas front office.</span>
                </div>
            </div>
        </div>

        <div class="map-card">
            <div class="map-card-head"><div class="card-title">Lokasi Kantor</div></div>
            <div class="map-visual"><div class="map-pin"><i class="fas fa-location-dot"></i></div></div>
            <div class="map-card-body">
                <div class="map-name">BKPSDM OKU Timur</div>
                <div class="map-addr">Jl. Lintas Sumatera No. 01,<br>Martapura, OKU Timur</div>
            </div>
        </div>
    </div>

</div>{{-- /.content-section --}}

{{-- ══════════════════════════════════════
     ROW 4 — RIWAYAT TABLE
══════════════════════════════════════ --}}
<div class="table-section a4">
    <div class="recent-card">
        <div class="recent-head">
            <div>
                <div class="card-title">Riwayat Kunjungan Anda</div>
                <div class="recent-sub">5 kunjungan terbaru yang tercatat atas nama Anda.</div>
            </div>
            <a href="{{ route('user.riwayat') }}" class="btn-see-all">
                Lihat semua <i class="fas fa-arrow-right" style="font-size:.6rem;"></i>
            </a>
        </div>

        @if($riwayatSaya->isEmpty())
            <div class="empty-state">
                <div class="empty-ico"><i class="fas fa-inbox"></i></div>
                <div class="empty-title">Belum ada riwayat</div>
                <div class="empty-sub">Riwayat kunjungan Anda akan muncul di sini setelah mengisi buku tamu.</div>
            </div>
        @else
            <div style="overflow-x:auto;">
                <table class="recent-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Instansi</th>
                            <th>Bertemu Dengan</th>
                            <th>Perihal</th>
                            <th style="text-align:center;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayatSaya as $item)
                        <tr>
                            <td>
                                <div class="date-main">
                                    <i class="fas fa-calendar" style="color:var(--ind-200);font-size:.68rem;margin-right:.3rem;"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->translatedFormat('d M Y') }}
                                </div>
                                <div class="date-sub">
                                    <i class="fas fa-clock" style="font-size:.6rem;"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('H:i') }} WIB
                                </div>
                            </td>
                            <td style="font-weight:700;color:var(--sl-800);">{{ $item->instansi }}</td>
                            <td style="color:var(--sl-600);">{{ $item->bertemu_dengan }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td style="text-align:center;">
                                <span class="badge-done">
                                    <i class="fas fa-circle-check" style="font-size:.6rem;"></i> Selesai
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

</div>{{-- /.dash-inner --}}
</div>{{-- /.dash-page --}}
@endsection