<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Dashboard - BKPSDM Buku Tamu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }

        .print-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #2C5AA0;
        }

        .print-header h1 {
            font-size: 24px;
            color: #2C5AA0;
            margin-bottom: 5px;
        }

        .print-header h2 {
            font-size: 16px;
            color: #666;
            font-weight: normal;
            margin-bottom: 10px;
        }

        .print-header p {
            font-size: 12px;
            color: #999;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border: 2px solid #e9ecef;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #2C5AA0;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #2C5AA0;
            margin: 30px 0 15px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table thead {
            background: #2C5AA0;
            color: white;
        }

        table thead th {
            padding: 12px 10px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table tbody td {
            padding: 10px;
            border-bottom: 1px solid #e9ecef;
            font-size: 11px;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            background: #2C5AA0;
            color: white;
        }

        .chart-item {
            margin-bottom: 15px;
        }

        .chart-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 12px;
            color: #666;
        }

        .chart-bar-wrapper {
            background: #e9ecef;
            height: 25px;
            border-radius: 4px;
            overflow: hidden;
        }

        .chart-bar-fill {
            background: #2C5AA0;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10px;
            color: white;
            font-size: 11px;
            font-weight: bold;
        }

        .print-footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
            text-align: center;
            font-size: 11px;
            color: #999;
        }

        .no-print {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-print {
            background: #2C5AA0;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        @media print {
            body {
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .page-break {
                page-break-after: always;
            }
        }
    </style>
</head>
<body>
    <!-- No Print Buttons -->
    <div class="no-print">
        <button onclick="window.print()" class="btn-print">
            Cetak Halaman
        </button>
        <a href="{{ route('dashboard') }}" class="btn-back">
            Kembali
        </a>
    </div>

    <!-- Print Header -->
    <div class="print-header">
        <h1>Dashboard Buku Tamu</h1>
        <h2>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</h2>
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i:s') }}</p>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-container">
        <div class="stat-card">
            <span class="stat-number">{{ $totalTamu }}</span>
            <span class="stat-label">Total Tamu</span>
        </div>
        <div class="stat-card">
            <span class="stat-number">{{ $tamuHariIni }}</span>
            <span class="stat-label">Tamu Hari Ini</span>
        </div>
        <div class="stat-card">
            <span class="stat-number">{{ $totalPegawai }}</span>
            <span class="stat-label">Total Pegawai</span>
        </div>
    </div>

    <!-- Top Pegawai Chart -->
    <h2 class="section-title">Pegawai/Bagian Terbanyak Dikunjungi</h2>
    <div class="chart-container">
        @foreach($statistikBertemu as $index => $item)
        <div class="chart-item">
            <div class="chart-label">
                <span>{{ $index + 1 }}. {{ $item->bertemu_dengan }}</span>
                <span>{{ $item->total }} kunjungan</span>
            </div>
            <div class="chart-bar-wrapper">
                <div class="chart-bar-fill" style="width: {{ ($item->total / $statistikBertemu->max('total')) * 100 }}%">
                    {{ number_format(($item->total / $statistikBertemu->sum('total')) * 100, 1) }}%
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Recent Visitors Table -->
    <h2 class="section-title">Tamu Terbaru (10 Terakhir)</h2>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="12%">Tanggal</th>
                <th width="15%">Nama</th>
                <th width="12%">NIP/NIK</th>
                <th width="15%">Instansi</th>
                <th width="18%">Bertemu Dengan</th>
                <th width="23%">Perihal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tamuTerbaru as $index => $tamu)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $tamu->tanggal_kunjungan->format('d/m/Y H:i') }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->nip_nik }}</td>
                <td>{{ $tamu->instansi }}</td>
                <td><span class="badge">{{ $tamu->bertemu_dengan }}</span></td>
                <td>{{ Str::limit($tamu->perihal, 40) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data tamu</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Print Footer -->
    <div class="print-footer">
        <p><strong>Laporan Dashboard Buku Tamu BKPSDM</strong></p>
        <p>Dokumen ini dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i:s') }}</p>
    </div>
</body>
</html>