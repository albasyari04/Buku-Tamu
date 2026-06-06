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

        $totalPegawai = Pegawai::where('status', true)->count();
        $totalBidang  = Pegawai::where('status', true)->distinct('bidang')->count('bidang');

        return view('pegawai.index', compact(
            'pegawais',
            'totalPegawai',
            'totalBidang'
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
            'nama'   => 'required|string|max:255',
            'nip'    => 'nullable|string|max:20|unique:pegawais,nip',
            'bidang' => 'required|string|max:255'
        ]);

        try {
            $data = $request->only(['nama', 'nip', 'bidang']);
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
        $totalPegawai = Pegawai::where('status', true)->count();
        $totalBidang  = Pegawai::where('status', true)->distinct('bidang')->count('bidang');

        return view('pegawai.show', compact('pegawai', 'totalPegawai', 'totalBidang'));
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
            'nama'   => 'required|string|max:255',
            'nip'    => 'nullable|string|max:20|unique:pegawais,nip,' . $pegawai->id,
            'bidang' => 'required|string|max:255'
        ]);

        try {
            $pegawai->update($request->only(['nama', 'nip', 'bidang']));

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
            $pegawai->update(['status' => false]);

            return redirect()->route('pegawai.index')
                             ->with('success', 'Data pegawai berhasil dinonaktifkan.');

        } catch (\Exception $e) {
            return redirect()->route('pegawai.index')
                             ->with('error', 'Gagal menonaktifkan data: ' . $e->getMessage());
        }
    }
}