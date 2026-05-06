<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $pegawais = Pegawai::where('status', true)
                          ->orderBy('nama')
                          ->paginate(10);

        // Tambahan statistik
        $totalPegawai = Pegawai::where('status', true)->count();
        $totalBidang = Pegawai::where('status', true)->distinct('bidang')->count('bidang');
        $totalJabatan = Pegawai::where('status', true)->distinct('jabatan')->count('jabatan');

        return view('pegawai.index', compact(
            'pegawais',
            'totalPegawai',
            'totalBidang',
            'totalJabatan'
        ));
    }

    public function create()
    {
        $bidangOptions = [
            'Kepala Badan',
            'Sekretaris',
            'Bidang Pengadaan, Pemberhentian dan Informasi',
            'Bidang Mutasi dan Promosi',
            'Bidang Pengembangan Kompetensi Aparatur',
            'Bidang Penilaian Kerja'
        ];
        
        return view('pegawai.create', compact('bidangOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:20|unique:pegawais,nip',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255'
        ]);

        try {
            $data = $request->all();
            $data['status'] = true;

            Pegawai::create($data);

            return redirect()->route('pegawai.index')
                            ->with('success', 'Data pegawai berhasil disimpan.');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show(Pegawai $pegawai)
    {
        // ========== PERBAIKAN: Tambahkan statistik seperti di index ==========
        $totalPegawai = Pegawai::where('status', true)->count();
        $totalBidang = Pegawai::where('status', true)->distinct('bidang')->count('bidang');
        $totalJabatan = Pegawai::where('status', true)->distinct('jabatan')->count('jabatan');

        return view('pegawai.show', compact('pegawai', 'totalPegawai', 'totalBidang', 'totalJabatan'));
    }

    public function edit(Pegawai $pegawai)
    {
        $bidangOptions = [
            'Kepala Badan',
            'Sekretaris',
            'Bidang Pengadaan, Pemberhentian dan Informasi',
            'Bidang Mutasi dan Promosi',
            'Bidang Pengembangan Kompetensi Aparatur',
            'Bidang Penilaian Kerja'
        ];
        
        return view('pegawai.edit', compact('pegawai', 'bidangOptions'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:20|unique:pegawais,nip,' . $pegawai->id,
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255'
        ]);

        try {
            $pegawai->update($request->all());

            return redirect()->route('pegawai.index')
                            ->with('success', 'Data pegawai berhasil diupdate.');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function destroy(Pegawai $pegawai)
    {
        try {
            // Soft delete dengan mengubah status menjadi false
            $pegawai->update(['status' => false]);

            return redirect()->route('pegawai.index')
                            ->with('success', 'Data pegawai berhasil dinonaktifkan.');

        } catch (\Exception $e) {
            return redirect()->route('pegawai.index')
                            ->with('error', 'Gagal menonaktifkan data: ' . $e->getMessage());
        }
    }
}