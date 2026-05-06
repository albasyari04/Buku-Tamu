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
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            line-height: 1.6;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #2C5AA0;
        }

        .header h1 {
            font-size: 18px;
            color: #2C5AA0;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 14px;
            color: #666;
            font-weight: normal;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 10px;
            color: #999;
        }

        .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .info-row {
            margin-bottom: 5px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 150px;
        }

        .info-value {
            color: #333;
        }

        .stats-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .stat-item {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #2C5AA0;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 10px;
            color: #666;
            text-transform: uppercase;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #2C5AA0;
            margin: 20px 0 10px 0;
            padding-bottom: 5px;
            border-bottom: 2px solid #e9ecef;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table thead {
            background: #2C5AA0;
            color: white;
        }

        table thead th {
            padding: 10px 8px;
            text-align: left;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table tbody td {
            padding: 8px;
            border-bottom: 1px solid #e9ecef;
            font-size: 10px;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
            background: #2C5AA0;
            color: white;
        }

        .chart-container {
            margin: 20px 0;
        }

        .chart-bar {
            margin-bottom: 10px;
        }

        .chart-label {
            font-size: 10px;
            color: #666;
            margin-bottom: 3px;
        }

        .chart-bar-wrapper {
            background: #e9ecef;
            height: 20px;
            border-radius: 3px;
            overflow: hidden;
            position: relative;
        }

        .chart-bar-fill {
            background: #2C5AA0;
            height: 100%;
            border-radius: 3px;
        }

        .chart-value {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 9px;
            color: #333;
            font-weight: bold;
        }

        .page-break {
            page-break-after: always;
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

    <!-- Info Periode -->
    <div class="info-box">
        <div class="info-row">
            <span class="info-label">Periode Laporan:</span>
            <span class="info-value">{{ $periode['start'] }} s/d {{ $periode['end'] }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Total Data:</span>
            <span class="info-value">{{ $jumlahTamuPeriode }} kunjungan</span>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-item">
            <span class="stat-number">{{ $totalTamu }}</span>
            <span class="stat-label">Total Tamu</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $tamuHariIni }}</span>
            <span class="stat-label">Tamu Hari Ini</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $totalPegawai }}</span>
            <span class="stat-label">Total Pegawai</span>
        </div>
    </div>

    <!-- Statistik Bertemu Dengan -->
    <h3 class="section-title">Top 5 Pegawai/Bagian Terbanyak Dikunjungi</h3>
    <div class="chart-container">
        @foreach($statistikBertemu as $index => $item)
        <div class="chart-bar">
            <div class="chart-label">{{ $index + 1 }}. {{ $item->bertemu_dengan }}</div>
            <div class="chart-bar-wrapper">
                <div class="chart-bar-fill" style="width: {{ ($item->total / $statistikBertemu->max('total')) * 100 }}%"></div>
                <div class="chart-value">{{ $item->total }} kunjungan</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Statistik Perihal -->
    <h3 class="section-title">Top 5 Perihal Kunjungan</h3>
    <div class="chart-container">
        @foreach($statistikPerihal as $index => $item)
        <div class="chart-bar">
            <div class="chart-label">{{ $index + 1 }}. {{ $item->perihal }}</div>
            <div class="chart-bar-wrapper">
                <div class="chart-bar-fill" style="width: {{ ($item->total / $statistikPerihal->max('total')) * 100 }}%; background: #28a745;"></div>
                <div class="chart-value">{{ $item->total }} kunjungan</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Data Tamu Periode -->
    <h3 class="section-title">Data Kunjungan Tamu (Periode: {{ $periode['start'] }} - {{ $periode['end'] }})</h3>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="15%">Nama Tamu</th>
                <th width="12%">NIP/NIK</th>
                <th width="15%">Instansi</th>
                <th width="18%">Bertemu Dengan</th>
                <th width="20%">Perihal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tamuPeriode as $index => $tamu)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $tamu->tanggal_kunjungan->format('d/m/Y H:i') }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->nip_nik }}</td>
                <td>{{ $tamu->instansi }}</td>
                <td><span class="badge">{{ $tamu->bertemu_dengan }}</span></td>
                <td>{{ Str::limit($tamu->perihal, 30) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data pada periode ini</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>