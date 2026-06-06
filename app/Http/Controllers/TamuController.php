<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Pegawai;
use App\Models\User;
use App\Notifications\NewTamuNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

// PhpSpreadsheet — pastikan sudah: composer require phpoffice/phpspreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Shared\Date as SpreadsheetDate;

class TamuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // =========================================================
    //  CRUD
    // =========================================================

    public function index()
    {
        $tamus = Tamu::orderBy('created_at', 'desc')->paginate(10);
        return view('tamu.index', compact('tamus'));
    }

    public function create()
    {
        [$bertemu_dengan, $perihal_options] = $this->getFormOptions();
        return view('tamu.create', compact('bertemu_dengan', 'perihal_options'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        try {
            $data = $request->all();
            $data['tanggal_kunjungan'] = !empty($data['tanggal_kunjungan'])
                ? Carbon::parse($data['tanggal_kunjungan'])
                : now();

            $tamu = Tamu::create($data);
            $this->notifyAdmins($tamu);
            return redirect()->route('tamu.index')->with('success', 'Data tamu berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show(Tamu $tamu)
    {
        return view('tamu.show', compact('tamu'));
    }

    public function edit(Tamu $tamu)
    {
        [$bertemu_dengan, $perihal_options] = $this->getFormOptions();
        return view('tamu.edit', compact('tamu', 'bertemu_dengan', 'perihal_options'));
    }

    public function update(Request $request, Tamu $tamu)
    {
        $request->validate($this->validationRules());

        try {
            $data = $request->all();
            if (!empty($data['tanggal_kunjungan'])) {
                $data['tanggal_kunjungan'] = Carbon::parse($data['tanggal_kunjungan']);
            }
            $tamu->update($data);
            return redirect()->route('tamu.index')->with('success', 'Data tamu berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function destroy(Tamu $tamu)
    {
        try {
            $tamu->delete();
            return redirect()->route('tamu.index')->with('success', 'Data tamu berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('tamu.index')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function markNotificationsAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'Notifikasi berhasil ditandai sudah dibaca.');
    }

    // =========================================================
    //  DASHBOARD
    // =========================================================

    public function dashboard()
    {
        $totalTamu    = Tamu::count();
        $tamuHariIni  = Tamu::whereDate('tanggal_kunjungan', today())->count();
        $totalPegawai = Pegawai::where('status', true)->count();
        $tamuTerbaru  = Tamu::orderBy('tanggal_kunjungan', 'desc')->take(5)->get();

        return view('dashboard', compact('totalTamu', 'tamuHariIni', 'totalPegawai', 'tamuTerbaru'));
    }

    // =========================================================
    //  IMPORT EXCEL
    // =========================================================

    /**
     * Tampilkan halaman form import Excel
     */
    public function importForm()
    {
        return view('tamu.import');
    }

    /**
     * Proses upload & import file Excel
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ], [
            'file_excel.required' => 'File Excel wajib dipilih.',
            'file_excel.mimes'    => 'Format file harus .xlsx, .xls, atau .csv.',
            'file_excel.max'      => 'Ukuran file maksimal 5 MB.',
        ]);

        try {
            $spreadsheet = IOFactory::load($request->file('file_excel')->getPathname());
            $rows        = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            $imported = 0;
            $skipped  = 0;
            $errors   = [];

            foreach ($rows as $rowIndex => $row) {
                // Baris 1 = header, lewati
                if ($rowIndex === 1) {
                    continue;
                }

                // Lewati baris kosong (kolom C = Nama)
                if (empty(trim((string)($row['C'] ?? '')))) {
                    continue;
                }

                try {
                    // ── Parsing tanggal ────────────────────────
                    $tanggal = $this->parseExcelDate($row['B'] ?? null);

                    // ── Bersihkan nilai kolom ──────────────────
                    $nama           = trim((string)($row['C'] ?? ''));
                    $nip_nik        = trim((string)($row['D'] ?? ''));
                    $no_hp          = trim((string)($row['E'] ?? '')) ?: null;
                    $instansi       = trim((string)($row['F'] ?? ''));
                    $bertemu_dengan = trim((string)($row['G'] ?? ''));
                    $alamat         = trim((string)($row['H'] ?? ''));
                    $perihal        = trim((string)($row['I'] ?? ''));

                    // ── Validasi kolom wajib ───────────────────
                    if (!$nama || !$nip_nik || !$instansi || !$bertemu_dengan || !$alamat || !$perihal) {
                        $skipped++;
                        $errors[] = "Baris {$rowIndex}: Terdapat kolom wajib yang kosong — baris dilewati.";
                        continue;
                    }

                    $tamu = Tamu::create([
                        'tanggal_kunjungan' => $tanggal,
                        'nama'              => $nama,
                        'nip_nik'           => $nip_nik,
                        'no_hp'             => $no_hp,
                        'instansi'          => $instansi,
                        'bertemu_dengan'    => $bertemu_dengan,
                        'alamat'            => $alamat,
                        'perihal'           => $perihal,
                    ]);
                    $this->notifyAdmins($tamu);

                    $imported++;

                } catch (\Exception $e) {
                    $skipped++;
                    $errors[] = "Baris {$rowIndex}: " . $e->getMessage();
                }
            }

            $message = "{$imported} data berhasil diimport.";
            if ($skipped > 0) {
                $message .= " {$skipped} baris dilewati.";
            }

            return redirect()->route('tamu.index')
                             ->with('success', $message)
                             ->with('import_errors', $errors);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
        }
    }

    /**
     * Download template Excel untuk import data tamu
     */
    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();

        // ── Sheet 1: Data Tamu ────────────────────────────────
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Tamu');

        // Header
        $headers = ['A1'=>'No','B1'=>'Tanggal Kunjungan','C1'=>'Nama','D1'=>'NIP/NIK',
                    'E1'=>'No. HP','F1'=>'Instansi','G1'=>'Bertemu Dengan','H1'=>'Alamat','I1'=>'Perihal'];
        foreach ($headers as $cell => $value) {
            $sheet->setCellValue($cell, $value);
        }

        // Style header
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF2C5AA0']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER,
                            'vertical'   => Alignment::VERTICAL_CENTER],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN,
                                             'color'       => ['argb' => 'FF1E3A6F']]],
        ]);
        $sheet->getRowDimension(1)->setRowHeight(22);

        // Lebar kolom
        foreach (['A'=>5,'B'=>22,'C'=>25,'D'=>20,'E'=>16,'F'=>25,'G'=>35,'H'=>30,'I'=>25] as $col=>$w) {
            $sheet->getColumnDimension($col)->setWidth($w);
        }

        // Contoh data
        $samples = [
            [1, '03/06/2026 08:30', 'Ahmad Fauzi',   '198501012010011001', '08123456789', 'Dinas Pendidikan',  'Kepala Badan',               'Jl. Merdeka No. 1 Palembang',  'Kenaikan Pangkat'],
            [2, '03/06/2026 09:15', 'Siti Rahayu',   '197703152005012002', '08234567890', 'Dinas Kesehatan',   'Sekretaris',                  'Jl. Sudirman No. 5 OKU Timur', 'Mutasi'],
            [3, '03/06/2026 10:00', 'Budi Santoso',  '3201011234567890',   '08345678901', 'Masyarakat Umum',  'Bidang Mutasi dan Promosi',   'Jl. Pahlawan No. 3 Martapura', 'Konsultasi'],
        ];

        foreach ($samples as $i => $row) {
            $rn   = $i + 2;
            $cols = ['A','B','C','D','E','F','G','H','I'];
            foreach ($cols as $j => $col) {
                $sheet->setCellValue($col . $rn, $row[$j]);
            }
            $sheet->getStyle("A{$rn}:I{$rn}")->applyFromArray([
                'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN,
                                               'color'       => ['argb' => 'FFD0D0D0']]],
                'fill'    => ['fillType'   => Fill::FILL_SOLID,
                              'startColor' => ['argb' => ($i % 2 === 0 ? 'FFF8F9FA' : 'FFFFFFFF')]],
            ]);
            $sheet->getRowDimension($rn)->setRowHeight(18);
        }

        // ── Sheet 2: Petunjuk ─────────────────────────────────
        $guide = $spreadsheet->createSheet();
        $guide->setTitle('Petunjuk');
        $guide->getColumnDimension('A')->setWidth(22);
        $guide->getColumnDimension('B')->setWidth(65);

        $guide->setCellValue('A1', 'PETUNJUK PENGISIAN TEMPLATE IMPORT DATA TAMU');
        $guide->getStyle('A1')->getFont()->setBold(true)->setSize(13);
        $guide->getStyle('A1')->getFont()->getColor()->setARGB('FF2C5AA0');

        $rows = [
            ['Kolom',              'Keterangan'],
            ['A – No',             'Nomor urut (opsional, boleh dikosongkan)'],
            ['B – Tanggal Kunjungan', 'Format: dd/mm/yyyy HH:mm  (contoh: 03/06/2026 08:30). Kosong = waktu import.'],
            ['C – Nama',           'Nama lengkap tamu (WAJIB)'],
            ['D – NIP/NIK',        'NIP untuk ASN, NIK untuk masyarakat umum (WAJIB)'],
            ['E – No. HP',         'Nomor HP tamu (boleh kosong)'],
            ['F – Instansi',       'Asal instansi/dinas tamu (WAJIB)'],
            ['G – Bertemu Dengan', 'Kepala Badan / Sekretaris / Bidang ... (WAJIB)'],
            ['H – Alamat',         'Alamat lengkap tamu (WAJIB)'],
            ['I – Perihal',        'Keperluan: Kenaikan Pangkat, Mutasi, Konsultasi, dll. (WAJIB)'],
            ['', ''],
            ['CATATAN:', 'Baris pertama (header) tidak diimport. Jangan ubah urutan kolom.'],
            ['', 'Baris dengan kolom wajib kosong akan dilewati otomatis.'],
            ['', 'Ukuran file maksimal 5 MB.'],
        ];

        foreach ($rows as $ri => $rd) {
            $rn = $ri + 2;
            $guide->setCellValue('A'.$rn, $rd[0]);
            $guide->setCellValue('B'.$rn, $rd[1]);
        }

        // Header tabel petunjuk
        $guide->getStyle('A2:B2')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF2C5AA0']],
        ]);
        $guide->getStyle('A2:B'.(count($rows)+1))
              ->getBorders()->getAllBorders()
              ->setBorderStyle(Border::BORDER_THIN);

        // ── Output ────────────────────────────────────────────
        $spreadsheet->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Template-Import-Tamu-BKPSDM.xlsx"');
        header('Cache-Control: max-age=0');

        (new XlsxWriter($spreadsheet))->save('php://output');
        exit;
    }

    // =========================================================
    //  PDF & PRINT
    // =========================================================

    public function exportDetailPDF(int $id)
    {
        $tamu = Tamu::findOrFail($id);
        $pdf  = Pdf::loadView('reports.detail-tamu-pdf', [
            'title' => 'Detail Data Tamu - ' . $tamu->nama,
            'tamu'  => $tamu,
            'date'  => now()->format('d F Y'),
        ])->setPaper('a4', 'portrait');

        return $pdf->download('Detail-Tamu-' . $tamu->nama . '-' . now()->format('Y-m-d') . '.pdf');
    }

    public function printDetail(int $id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('reports.detail-tamu-print', compact('tamu'));
    }

    public function exportDashboardPDF(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth());
        $endDate   = $request->input('end_date',   now()->endOfMonth());

        $tamuPeriode      = Tamu::whereBetween('tanggal_kunjungan', [$startDate, $endDate])
                                ->orderBy('tanggal_kunjungan', 'desc')->get();
        $statistikBertemu = Tamu::whereBetween('tanggal_kunjungan', [$startDate, $endDate])
                                ->select('bertemu_dengan', DB::raw('count(*) as total'))
                                ->groupBy('bertemu_dengan')->orderBy('total', 'desc')->limit(5)->get();
        $statistikPerihal = Tamu::whereBetween('tanggal_kunjungan', [$startDate, $endDate])
                                ->select('perihal', DB::raw('count(*) as total'))
                                ->groupBy('perihal')->orderBy('total', 'desc')->limit(5)->get();

        $pdf = Pdf::loadView('reports.dashboard-pdf', [
            'title'             => 'Laporan Dashboard Buku Tamu BKPSDM',
            'date'              => now()->format('d F Y'),
            'periode'           => ['start' => Carbon::parse($startDate)->format('d/m/Y'),
                                    'end'   => Carbon::parse($endDate)->format('d/m/Y')],
            'totalTamu'         => Tamu::count(),
            'tamuHariIni'       => Tamu::whereDate('tanggal_kunjungan', today())->count(),
            'totalPegawai'      => Pegawai::where('status', true)->count(),
            'tamuPeriode'       => $tamuPeriode,
            'statistikBertemu'  => $statistikBertemu,
            'statistikPerihal'  => $statistikPerihal,
            'jumlahTamuPeriode' => $tamuPeriode->count(),
        ])->setPaper('a4', 'portrait');

        return $pdf->download('Laporan-Dashboard-' . now()->format('Y-m-d') . '.pdf');
    }

    public function exportTamuPDF(Request $request)
    {
        $query = Tamu::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal_kunjungan', [$request->start_date, $request->end_date]);
        }
        if ($request->filled('bertemu_dengan')) {
            $query->where('bertemu_dengan', $request->bertemu_dengan);
        }
        if ($request->filled('perihal')) {
            $query->where('perihal', $request->perihal);
        }

        $tamus = $query->orderBy('tanggal_kunjungan', 'desc')->get();

        $pdf = Pdf::loadView('reports.tamu-pdf', [
            'title' => 'Laporan Data Tamu BKPSDM',
            'date'  => now()->format('d F Y'),
            'tamus' => $tamus,
            'total' => $tamus->count(),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('Data-Tamu-' . now()->format('Y-m-d') . '.pdf');
    }

    public function printDashboard()
    {
        $statistikBertemu = Tamu::select('bertemu_dengan', DB::raw('count(*) as total'))
                                ->groupBy('bertemu_dengan')->orderBy('total', 'desc')->limit(5)->get();

        return view('reports.dashboard-print', [
            'totalTamu'       => Tamu::count(),
            'tamuHariIni'     => Tamu::whereDate('tanggal_kunjungan', today())->count(),
            'totalPegawai'    => Pegawai::where('status', true)->count(),
            'tamuTerbaru'     => Tamu::orderBy('tanggal_kunjungan', 'desc')->take(10)->get(),
            'statistikBertemu'=> $statistikBertemu,
        ]);
    }

    public function printFormulir()
    {
        return view('reports.formulir-tamu-print');
    }

    // =========================================================
    //  PRIVATE HELPERS
    // =========================================================

    private function notifyAdmins(Tamu $tamu): void
    {
        $admins = User::where('role', 'admin')->get();

        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewTamuNotification($tamu));
        }
    }

    /** Daftar opsi dropdown form tamu */
    private function getFormOptions(): array
    {
        $bertemu_dengan = [
            'Kepala Badan',
            'Sekretaris',
            'Bidang Pengadaan, Pemberhentian dan Informasi',
            'Bidang Mutasi dan Promosi',
            'Bidang Pengembangan Kompetensi Aparatur',
            'Bidang Penilaian Kerja',
        ];

        $perihal_options = [
            'Kenaikan Pangkat','Gaji Berkala','Mutasi','Usul Jabatan Struktural',
            'Usul Jabatan Fungsional','Pengadaan CASN','Pensiun ASN',
            'Perbaikan Data/Informasi Data','Usul Ujian Dinas','Usul Diklat ASN',
            'Usul Karpeg/Karis/Karsu','Usul Satya Lencana','LHKPN','Konsultasi',
            'Legalisir','Diklat PIM','Latsar/Orientasi PPPK','JPT',
            'Penyesuaian Ijazah','Gelar Pendidikan','Usul Cuti','ZZ',
            'Absen Fingerprint','Izin Cerai','Taspen',
        ];

        return [$bertemu_dengan, $perihal_options];
    }

    /** Aturan validasi form tamu */
    private function validationRules(): array
    {
        return [
            'nip_nik'           => 'required|string|max:255',
            'nama'              => 'required|string|max:255',
            'no_hp'             => 'nullable|string|max:15',
            'alamat'            => 'required|string|max:500',
            'instansi'          => 'required|string|max:255',
            'bertemu_dengan'    => 'required|string|max:255',
            'perihal'           => 'required|string|max:500',
            'tanggal_kunjungan' => 'nullable|date',
        ];
    }

    /**
     * Parse nilai tanggal dari cell Excel.
     * Mendukung: serial number Excel, string dd/mm/yyyy, Y-m-d, dll.
     */
    private function parseExcelDate(mixed $raw): Carbon
    {
        $raw = trim((string)($raw ?? ''));

        if ($raw === '') {
            return now();
        }

        // Serial number Excel (misal: 46010)
        if (is_numeric($raw)) {
            return Carbon::instance(SpreadsheetDate::excelToDateTimeObject((float)$raw));
        }

        // Coba format-format umum
        foreach (['d/m/Y H:i', 'd/m/Y', 'Y-m-d H:i:s', 'Y-m-d H:i', 'Y-m-d'] as $fmt) {
            try {
                return Carbon::createFromFormat($fmt, $raw);
            } catch (\Exception) {
                // lanjut ke format berikutnya
            }
        }

        // Fallback: Carbon::parse (lebih toleran)
        return Carbon::parse($raw);
    }
}