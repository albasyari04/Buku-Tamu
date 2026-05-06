<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.4;
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
        .header .subtitle {
            font-size: 14pt;
            color: #666;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h3 {
            background-color: #f8f9fa;
            padding: 8px;
            border-left: 4px solid #007bff;
            font-size: 14pt;
            margin-bottom: 15px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-item label {
            font-weight: bold;
            color: #666;
            font-size: 10pt;
            display: block;
            margin-bottom: 2px;
        }
        .info-item .value {
            font-size: 11pt;
        }
        .perihal-box {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f8f9fa;
            margin-top: 5px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10pt;
            color: #666;
        }
        .badge {
            background-color: #007bff;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA</h1>
        <div class="subtitle">Detail Data Tamu Kunjungan</div>
    </div>

    <div class="info-section">
        <h3>Informasi Tamu</h3>
        <div class="info-grid">
            <div>
                <div class="info-item">
                    <label>NIP/NIK</label>
                    <div class="value">{{ $tamu->nip_nik }}</div>
                </div>
                <div class="info-item">
                    <label>Nama Tamu</label>
                    <div class="value">{{ $tamu->nama }}</div>
                </div>
                <div class="info-item">
                    <label>Instansi/Perusahaan</label>
                    <div class="value">{{ $tamu->instansi }}</div>
                </div>
                <div class="info-item">
                    <label>No. HP/Telepon</label>
                    <div class="value">{{ $tamu->no_hp ?: '-' }}</div>
                </div>
            </div>
            <div>
                <div class="info-item">
                    <label>Alamat</label>
                    <div class="value">{{ $tamu->alamat }}</div>
                </div>
                <div class="info-item">
                    <label>Bertemu Dengan</label>
                    <div class="value">
                        <span class="badge">{{ $tamu->bertemu_dengan }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <label>Tanggal Kunjungan</label>
                    <div class="value">
                        {{ $tamu->tanggal_kunjungan->format('d/m/Y H:i') }} WIB
                    </div>
                </div>
                <div class="info-item">
                    <label>Waktu Input</label>
                    <div class="value">
                        {{ $tamu->created_at->format('d/m/Y H:i') }}
                    </div>
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
        <div>Dicetak pada: {{ $date }}</div>
        <div>BKPSDM - Sistem Buku Tamu Digital</div>
    </div>
</body>
</html>