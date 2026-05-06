<!DOCTYPE html>
<html>
<head>
    <title>Detail Tamu - {{ $tamu->nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.4;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18pt;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h3 {
            background-color: #f8f9fa;
            padding: 8px;
            border-left: 4px solid #007bff;
            font-size: 14pt;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 15px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-item label {
            font-weight: bold;
            color: #666;
            display: block;
        }
        .perihal-box {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f8f9fa;
            margin-top: 10px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10pt;
            color: #666;
        }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA</h1>
        <div>Detail Data Tamu Kunjungan</div>
    </div>

    <div class="info-section">
        <h3>Informasi Tamu</h3>
        <div class="info-grid">
            <div>
                <div class="info-item">
                    <label>NIP/NIK</label>
                    <div>{{ $tamu->nip_nik }}</div>
                </div>
                <div class="info-item">
                    <label>Nama Tamu</label>
                    <div>{{ $tamu->nama }}</div>
                </div>
                <div class="info-item">
                    <label>Instansi/Perusahaan</label>
                    <div>{{ $tamu->instansi }}</div>
                </div>
                <div class="info-item">
                    <label>No. HP/Telepon</label>
                    <div>{{ $tamu->no_hp ?: '-' }}</div>
                </div>
            </div>
            <div>
                <div class="info-item">
                    <label>Alamat</label>
                    <div>{{ $tamu->alamat }}</div>
                </div>
                <div class="info-item">
                    <label>Bertemu Dengan</label>
                    <div><strong>{{ $tamu->bertemu_dengan }}</strong></div>
                </div>
                <div class="info-item">
                    <label>Tanggal Kunjungan</label>
                    <div>{{ $tamu->tanggal_kunjungan->format('d/m/Y H:i') }} WIB</div>
                </div>
                <div class="info-item">
                    <label>Waktu Input</label>
                    <div>{{ $tamu->created_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="info-section">
        <h3>Perihal Kunjungan</h3>
        <div class="perihal-box">
            {{ $tamu->perihal ?: 'Tidak ada keterangan' }}
        </div>
    </div>

    <div class="footer">
        <div>Dicetak pada: {{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <div class="no-print" style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; font-size: 12pt;">
            Cetak Dokumen
        </button>
        <button onclick="window.close()" style="padding: 10px 20px; font-size: 12pt; margin-left: 10px;">
            Tutup
        </button>
    </div>
</body>
</html>