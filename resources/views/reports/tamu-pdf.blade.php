<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
            line-height: 1.4;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #2C5AA0;
        }

        .header h1 {
            font-size: 16px;
            color: #2C5AA0;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 12px;
            color: #666;
            font-weight: normal;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 9px;
            color: #999;
        }

        .info-box {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 15px;
            text-align: center;
        }

        .info-box p {
            margin: 3px 0;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table thead {
            background: #2C5AA0;
            color: white;
        }

        table thead th {
            padding: 8px 5px;
            text-align: left;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #1e3a6f;
        }

        table tbody td {
            padding: 6px 5px;
            border: 1px solid #e9ecef;
            font-size: 9px;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 2px;
            font-size: 8px;
            font-weight: bold;
            background: #2C5AA0;
            color: white;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 8px 0;
            font-size: 8px;
            color: #999;
            border-top: 1px solid #e9ecef;
        }

        .summary {
            margin-top: 20px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 3px;
        }

        .summary-row {
            display: table;
            width: 100%;
            margin-bottom: 5px;
        }

        .summary-label {
            display: table-cell;
            width: 150px;
            font-weight: bold;
            color: #555;
            font-size: 10px;
        }

        .summary-value {
            display: table-cell;
            color: #333;
            font-size: 10px;
        }

        .signature {
            margin-top: 40px;
            width: 100%;
        }

        .signature-box {
            float: right;
            width: 300px;
            text-align: center;
            font-size: 10px;
        }
        .signature-box p {
            margin: 0;
            padding: 0;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>{{ $title }}</h1>
        <h2>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</h2>
        <p>Dicetak pada: {{ $date }}</p>
    </div>

    <!-- Info Box -->
    <div class="info-box">
        <p><strong>Total Data: {{ $total }} kunjungan</strong></p>
    </div>

    <!-- Tabel Data Tamu -->
    <table>
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="10%">Tanggal</th>
                <th width="14%">Nama</th>
                <th width="10%">NIP/NIK</th>
                <th width="10%">No. HP</th>
                <th width="13%">Instansi</th>
                <th width="15%">Bertemu Dengan</th>
                <th width="15%">Alamat</th>
                <th width="10%">Perihal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tamus as $index => $tamu)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $tamu->tanggal_kunjungan->format('d/m/Y H:i') }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->nip_nik }}</td>
                <td>{{ $tamu->no_hp ?? '-' }}</td>
                <td>{{ Str::limit($tamu->instansi, 20) }}</td>
                <td><span class="badge">{{ Str::limit($tamu->bertemu_dengan, 15) }}</span></td>
                <td>{{ Str::limit($tamu->alamat, 25) }}</td>
                <td>{{ Str::limit($tamu->perihal, 20) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">Tidak ada data tamu</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Summary -->
    <div class="summary">
        <div class="summary-row">
            <span class="summary-label">Total Kunjungan:</span>
            <span class="summary-value">{{ $total }} kunjungan</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Tanggal Cetak:</span>
            <span class="summary-value">{{ now()->format('d F Y H:i:s') }}</span>
        </div>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature">
        <div class="signature-box">
            <p>Kepala Badan</p>
            <br><br><br><br>
            <p><strong>(Nama Lengkap Pejabat)</strong></p>
            <p>NIP. ............................</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Laporan Data Tamu BKPSDM - Dokumen ini dicetak secara otomatis</p>
    </div>
</body>
</html>