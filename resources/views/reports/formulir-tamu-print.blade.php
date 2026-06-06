<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Tamu - BKPSDM</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
            background: #fff;
            margin: 0;
            padding: 24px;
        }
        .page {
            max-width: 900px;
            margin: 0 auto;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            padding: 24px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 16px;
            margin-bottom: 18px;
        }
        .title-wrap h1 { font-size: 22px; color: #1e3a8a; margin: 0 0 4px; }
        .title-wrap p { margin: 0; color: #4b5563; font-size: 12px; }
        .badge { display:inline-block; padding:6px 10px; border-radius:999px; background:#eff6ff; color:#1d4ed8; font-size:11px; font-weight:bold; }
        .grid { display:grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
        .field { border: 1px solid #d1d5db; border-radius: 8px; padding: 10px; background: #fff; }
        .field label { display:block; font-size: 11px; font-weight: bold; color: #374151; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 6px; }
        .field .line { border-bottom: 1px solid #d1d5db; min-height: 18px; }
        .full { grid-column: 1 / -1; }
        .notes { margin-top: 18px; border: 1px dashed #94a3b8; border-radius: 10px; padding: 12px; background: #f8fafc; font-size: 12px; color: #475569; }
        .footer-note { margin-top: 18px; font-size: 11px; color: #6b7280; text-align: right; }
        .no-print { text-align: center; margin-bottom: 16px; }
        .btn { display:inline-block; padding:10px 16px; border-radius: 8px; text-decoration:none; color:#fff; background:#2563eb; border: none; cursor:pointer; font-size: 13px; margin-right:8px; }
        .btn-secondary { background:#6b7280; }
        @media print {
            body { padding: 0; }
            .page { border: none; border-radius: 0; padding: 0; max-width: none; }
            .no-print { display:none; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button class="btn" onclick="window.print()">Cetak Formulir</button>
        <a class="btn btn-secondary" href="{{ route('tamu.index') }}">Kembali</a>
    </div>

    <div class="page">
        <div class="header">
            <div class="title-wrap">
                <h1>FORMULIR DATA TAMU</h1>
                <p>BKPSDM OKU Timur — digunakan untuk pengisian data tamu secara manual</p>
            </div>
            <span class="badge">Form kosong</span>
        </div>

        <div class="grid">
            <div class="field"><label>Tanggal Kunjungan</label><div class="line"></div></div>
            <div class="field"><label>Nama Tamu</label><div class="line"></div></div>
            <div class="field"><label>NIP / NIK</label><div class="line"></div></div>
            <div class="field"><label>No. HP</label><div class="line"></div></div>
            <div class="field full"><label>Instansi / Perusahaan</label><div class="line"></div></div>
            <div class="field full"><label>Bertemu Dengan</label><div class="line"></div></div>
            <div class="field full"><label>Alamat</label><div class="line"></div></div>
            <div class="field full"><label>Perihal / Keperluan</label><div class="line"></div></div>
        </div>

        <div class="notes">
            <strong>Petunjuk:</strong> Silakan isi formulir ini dengan lengkap dan jelas. Setelah selesai, serahkan kembali ke petugas untuk diinput ke sistem.
        </div>

        <div class="grid" style="margin-top:18px;">
            <div class="field">
                <label>Tanda Tangan Tamu</label>
                <div class="line" style="min-height: 56px;"></div>
            </div>
            <div class="field">
                <label>Petugas Penerima</label>
                <div class="line" style="min-height: 56px;"></div>
            </div>
        </div>

        <div class="footer-note">Dicetak dari sistem Buku Tamu BKPSDM — {{ now()->translatedFormat('d F Y') }}</div>
    </div>
</body>
</html>
