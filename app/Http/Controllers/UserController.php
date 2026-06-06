<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use App\Notifications\NewTamuNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    // =========================================================
    //  DASHBOARD USER
    // =========================================================

    public function dashboard()
    {
        $user = Auth::user();

        // Riwayat kunjungan berdasarkan email user (match ke nama tamu)
        // Kita track berdasarkan session/cookie atau bisa juga lewat user_id jika ditambahkan nanti.
        // Untuk sekarang: tampilkan semua tamu yang nama-nya match dengan nama user,
        // atau gunakan pendekatan sederhana: tampilkan kunjungan hari ini sebagai info publik.

        $tamuHariIni   = Tamu::whereDate('tanggal_kunjungan', today())->count();
        $riwayatSaya   = Tamu::where('nama', 'like', '%' . $user->name . '%')
                              ->orderBy('tanggal_kunjungan', 'desc')
                              ->take(5)
                              ->get();
        $totalKunjungan = Tamu::where('nama', 'like', '%' . $user->name . '%')->count();

        return view('user.dashboard', compact('user', 'tamuHariIni', 'riwayatSaya', 'totalKunjungan'));
    }

    // =========================================================
    //  FORM ISI BUKU TAMU
    // =========================================================

    public function formBukuTamu()
    {
        $user = Auth::user();
        [$bertemu_dengan, $perihal_options] = $this->getFormOptions();

        return view('user.form', compact('user', 'bertemu_dengan', 'perihal_options'));
    }

    public function simpanBukuTamu(Request $request)
    {
        $request->validate([
            'nip_nik'           => 'required|string|max:255',
            'nama'              => 'required|string|max:255',
            'no_hp'             => 'nullable|string|max:15',
            'alamat'            => 'required|string|max:500',
            'instansi'          => 'required|string|max:255',
            'bertemu_dengan'    => 'required|string|max:255',
            'perihal'           => 'required|string|max:500',
            'tanggal_kunjungan' => 'nullable|date',
        ], [
            'nip_nik.required'        => 'NIP/NIK wajib diisi.',
            'nama.required'           => 'Nama lengkap wajib diisi.',
            'alamat.required'         => 'Alamat wajib diisi.',
            'instansi.required'       => 'Instansi wajib diisi.',
            'bertemu_dengan.required' => 'Mohon pilih pegawai yang akan ditemui.',
            'perihal.required'        => 'Mohon pilih keperluan kunjungan.',
        ]);

        try {
            $data = $request->only([
                'nip_nik', 'nama', 'no_hp', 'alamat',
                'instansi', 'bertemu_dengan', 'perihal', 'tanggal_kunjungan',
            ]);

            $data['tanggal_kunjungan'] = !empty($data['tanggal_kunjungan'])
                ? Carbon::parse($data['tanggal_kunjungan'])
                : now();

            $tamu = Tamu::create($data);
            $this->notifyAdmins($tamu);

            return redirect()->route('user.riwayat')
                ->with('success', 'Terima kasih! Data kunjungan Anda berhasil dicatat. Silakan menunggu di ruang tamu.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // =========================================================
    //  RIWAYAT KUNJUNGAN
    // =========================================================

    public function riwayat(Request $request)
    {
        $user  = Auth::user();
        $query = Tamu::where('nama', 'like', '%' . $user->name . '%');

        if ($request->filled('perihal')) {
            $query->where('perihal', $request->perihal);
        }

        if ($request->filled('bertemu_dengan')) {
            $query->where('bertemu_dengan', $request->bertemu_dengan);
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_kunjungan', $request->bulan)
                  ->whereYear('tanggal_kunjungan', $request->filled('tahun') ? $request->tahun : now()->year);
        }

        $riwayat        = $query->orderBy('tanggal_kunjungan', 'desc')->paginate(10);
        $totalKunjungan = Tamu::where('nama', 'like', '%' . $user->name . '%')->count();
        $perihalTerbanyak = Tamu::where('nama', 'like', '%' . $user->name . '%')
                                ->groupBy('perihal')
                                ->selectRaw('perihal, count(*) as total')
                                ->orderBy('total', 'desc')
                                ->value('perihal');
        [$bertemu_dengan, $perihal_options] = $this->getFormOptions();
        $uniquePegawai  = Tamu::select('bertemu_dengan')->distinct()->pluck('bertemu_dengan');

        return view('user.riwayat', compact('riwayat', 'totalKunjungan', 'bertemu_dengan', 'perihal_options', 'uniquePegawai', 'perihalTerbanyak'));
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
            'Kenaikan Pangkat', 'Gaji Berkala', 'Mutasi', 'Usul Jabatan Struktural',
            'Usul Jabatan Fungsional', 'Pengadaan CASN', 'Pensiun ASN',
            'Perbaikan Data/Informasi Data', 'Usul Ujian Dinas', 'Usul Diklat ASN',
            'Usul Karpeg/Karis/Karsu', 'Usul Satya Lencana', 'LHKPN', 'Konsultasi',
            'Legalisir', 'Diklat PIM', 'Latsar/Orientasi PPPK', 'JPT',
            'Penyesuaian Ijazah', 'Gelar Pendidikan', 'Usul Cuti', 'ZZ',
            'Absen Fingerprint', 'Izin Cerai', 'Taspen',
        ];

        return [$bertemu_dengan, $perihal_options];
    }
}