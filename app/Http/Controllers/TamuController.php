<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class TamuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $tamus = Tamu::orderBy('created_at', 'desc')
                    ->paginate(10);
        
        return view('tamu.index', compact('tamus'));
    }

    public function create()
    {
        $bertemu_dengan = [
            'Kepala Badan',
            'Sekretaris',
            'Bidang Pengadaan, Pemberhentian dan Informasi',
            'Bidang Mutasi dan Promosi', 
            'Bidang Pengembangan Kompetensi Aparatur',
            'Bidang Penilaian Kerja'
        ];

        $perihal_options = [
            'Kenaikan Pangkat',
            'Gaji Berkala',
            'Mutasi',
            'Usul Jabatan Struktural',
            'Usul Jabatan Fungsional',
            'Pengadaan CASN',
            'Pensiun ASN',
            'Perbaikan Data/Informasi Data',
            'Usul Ujian Dinas',
            'Usul Diklat ASN',
            'Usul Karpeg/Karis/Karsu',
            'Usul Satya Lencana',
            'LHKPN',
            'Konsultasi',
            'Legalisir',
            'Diklat PIM',
            'Latsar/Orientasi PPPK',
            'JPT',
            'Penyesuaian Ijazah',
            'Gelar Pendidikan',
            'Usul Cuti',
            'ZZ',
            'Absen Fingerprint',
            'Izin Cerai',
            'Taspen'
        ];
        
        return view('tamu.create', compact('bertemu_dengan', 'perihal_options'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip_nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:500',
            'instansi' => 'required|string|max:255',
            'bertemu_dengan' => 'required|string|max:255',
            'perihal' => 'required|string|max:500',
            'tanggal_kunjungan' => 'nullable|date'
        ]);

        try {
            $data = $request->all();
            
            // Format tanggal kunjungan - menerima format dari datetime-local HTML5
            if (!empty($data['tanggal_kunjungan'])) {
                // Format dari datetime-local: Y-m-d\TH:i
                // Contoh: 2025-11-14T14:40
                $data['tanggal_kunjungan'] = Carbon::parse($data['tanggal_kunjungan']);
            } else {
                $data['tanggal_kunjungan'] = now();
            }

            Tamu::create($data);

            return redirect()->route('tamu.index')
                            ->with('success', 'Data tamu berhasil disimpan.');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show(Tamu $tamu)
    {
        return view('tamu.show', compact('tamu'));
    }

    public function edit(Tamu $tamu)
    {
        $bertemu_dengan = [
            'Kepala Badan',
            'Sekretaris',
            'Bidang Pengadaan, Pemberhentian dan Informasi',
            'Bidang Mutasi dan Promosi',
            'Bidang Pengembangan Kompetensi Aparatur',
            'Bidang Penilaian Kerja'
        ];

        $perihal_options = [
            'Kenaikan Pangkat',
            'Gaji Berkala',
            'Mutasi',
            'Usul Jabatan Struktural',
            'Usul Jabatan Fungsional',
            'Pengadaan CASN',
            'Pensiun ASN',
            'Perbaikan Data/Informasi Data',
            'Usul Ujian Dinas',
            'Usul Diklat ASN',
            'Usul Karpeg/Karis/Karsu',
            'Usul Satya Lencana',
            'LHKPN',
            'Konsultasi',
            'Legalisir',
            'Diklat PIM',
            'Latsar/Orientasi PPPK',
            'JPT',
            'Penyesuaian Ijazah',
            'Gelar Pendidikan',
            'Usul Cuti',
            'ZZ',
            'Absen Fingerprint',
            'Izin Cerai',
            'Taspen'
        ];
        
        return view('tamu.edit', compact('tamu', 'bertemu_dengan', 'perihal_options'));
    }

    public function update(Request $request, Tamu $tamu)
    {
        $request->validate([
            'nip_nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:500',
            'instansi' => 'required|string|max:255',
            'bertemu_dengan' => 'required|string|max:255',
            'perihal' => 'required|string|max:500',
            'tanggal_kunjungan' => 'nullable|date'
        ]);

        try {
            $data = $request->all();
            
            // Format tanggal kunjungan - menerima format dari datetime-local HTML5
            if (!empty($data['tanggal_kunjungan'])) {
                $data['tanggal_kunjungan'] = Carbon::parse($data['tanggal_kunjungan']);
            }

            $tamu->update($data);

            return redirect()->route('tamu.index')
                            ->with('success', 'Data tamu berhasil diupdate.');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function destroy(Tamu $tamu)
    {
        try {
            $tamu->delete();

            return redirect()->route('tamu.index')
                            ->with('success', 'Data tamu berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->route('tamu.index')
                            ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function dashboard()
    {
        $totalTamu = Tamu::count();
        $tamuHariIni = Tamu::whereDate('tanggal_kunjungan', today())->count();
        $totalPegawai = Pegawai::where('status', true)->count();
        
        $tamuTerbaru = Tamu::orderBy('tanggal_kunjungan', 'desc')
                          ->take(5)
                          ->get();

        return view('dashboard', compact('totalTamu', 'tamuHariIni', 'totalPegawai', 'tamuTerbaru'));
    }

    /**
     * Export Detail Tamu ke PDF
     */
    public function exportDetailPDF($id)
    {
        $tamu = Tamu::findOrFail($id);

        $data = [
            'title' => 'Detail Data Tamu - ' . $tamu->nama,
            'tamu' => $tamu,
            'date' => now()->format('d F Y')
        ];

        $pdf = Pdf::loadView('reports.detail-tamu-pdf', $data)
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Detail-Tamu-' . $tamu->nama . '-' . now()->format('Y-m-d') . '.pdf');
    }

    /**
     * Print Detail Tamu (untuk browser print)
     */
    public function printDetail($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('reports.detail-tamu-print', compact('tamu'));
    }

    /**
     * Export Laporan Dashboard ke PDF
     */
    public function exportDashboardPDF(Request $request)
    {
        // Ambil filter periode jika ada
        $startDate = $request->input('start_date', now()->startOfMonth());
        $endDate = $request->input('end_date', now()->endOfMonth());

        // Data statistik
        $totalTamu = Tamu::count();
        $tamuHariIni = Tamu::whereDate('tanggal_kunjungan', today())->count();
        $totalPegawai = Pegawai::where('status', true)->count();
        
        // Data tamu berdasarkan periode
        $tamuPeriode = Tamu::whereBetween('tanggal_kunjungan', [$startDate, $endDate])
                          ->orderBy('tanggal_kunjungan', 'desc')
                          ->get();

        // Statistik bertemu dengan
        $statistikBertemu = Tamu::whereBetween('tanggal_kunjungan', [$startDate, $endDate])
                                ->select('bertemu_dengan', DB::raw('count(*) as total'))
                                ->groupBy('bertemu_dengan')
                                ->orderBy('total', 'desc')
                                ->limit(5)
                                ->get();

        // Statistik perihal
        $statistikPerihal = Tamu::whereBetween('tanggal_kunjungan', [$startDate, $endDate])
                                ->select('perihal', DB::raw('count(*) as total'))
                                ->groupBy('perihal')
                                ->orderBy('total', 'desc')
                                ->limit(5)
                                ->get();

        $data = [
            'title' => 'Laporan Dashboard Buku Tamu BKPSDM',
            'date' => now()->format('d F Y'),
            'periode' => [
                'start' => Carbon::parse($startDate)->format('d/m/Y'),
                'end' => Carbon::parse($endDate)->format('d/m/Y')
            ],
            'totalTamu' => $totalTamu,
            'tamuHariIni' => $tamuHariIni,
            'totalPegawai' => $totalPegawai,
            'tamuPeriode' => $tamuPeriode,
            'statistikBertemu' => $statistikBertemu,
            'statistikPerihal' => $statistikPerihal,
            'jumlahTamuPeriode' => $tamuPeriode->count()
        ];

        $pdf = Pdf::loadView('reports.dashboard-pdf', $data)
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Laporan-Dashboard-' . now()->format('Y-m-d') . '.pdf');
    }

    /**
     * Export Data Tamu ke PDF
     */
    public function exportTamuPDF(Request $request)
    {
        // Ambil filter
        $query = Tamu::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal_kunjungan', [
                $request->start_date,
                $request->end_date
            ]);
        }

        if ($request->filled('bertemu_dengan')) {
            $query->where('bertemu_dengan', $request->bertemu_dengan);
        }

        if ($request->filled('perihal')) {
            $query->where('perihal', $request->perihal);
        }

        $tamus = $query->orderBy('tanggal_kunjungan', 'desc')->get();

        $data = [
            'title' => 'Laporan Data Tamu BKPSDM',
            'date' => now()->format('d F Y'),
            'tamus' => $tamus,
            'total' => $tamus->count()
        ];

        $pdf = Pdf::loadView('reports.tamu-pdf', $data)
                  ->setPaper('a4', 'landscape');

        return $pdf->download('Data-Tamu-' . now()->format('Y-m-d') . '.pdf');
    }

    /**
     * Print Dashboard (untuk browser print)
     */
    public function printDashboard()
    {
        $totalTamu = Tamu::count();
        $tamuHariIni = Tamu::whereDate('tanggal_kunjungan', today())->count();
        $totalPegawai = Pegawai::where('status', true)->count();
        
        $tamuTerbaru = Tamu::orderBy('tanggal_kunjungan', 'desc')
                          ->take(10)
                          ->get();

        // Statistik bertemu dengan
        $statistikBertemu = Tamu::select('bertemu_dengan', DB::raw('count(*) as total'))
                                ->groupBy('bertemu_dengan')
                                ->orderBy('total', 'desc')
                                ->limit(5)
                                ->get();

        return view('reports.dashboard-print', compact(
            'totalTamu', 
            'tamuHariIni', 
            'totalPegawai', 
            'tamuTerbaru',
            'statistikBertemu'
        ));
    }
}