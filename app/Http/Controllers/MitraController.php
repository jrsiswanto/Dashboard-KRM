<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\PengajuanCsr;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Halaman Admin CSR
     */
    public function index()
    {
        // ==============================
        // STATISTIK RIWAYAT KEMITRAAN
        // ==============================

        $totalMitraAktif = Mitra::where('status', 'AKTIF')->count();

        $laporanTahunIni = Mitra::whereYear(
            'created_at',
            now()->year
        )->count();

        $programDidukung = Mitra::distinct('program_krm')
            ->count('program_krm');


        // ==============================
        // RIWAYAT KEMITRAAN
        // ==============================

        $mitras = Mitra::latest()
            ->paginate(10, ['*'], 'mitra_page');


        // ==============================
        // PENGAJUAN CSR
        // ==============================

        $totalPengajuan = PengajuanCsr::count();

        $pengajuanBaru = PengajuanCsr::where(
            'status',
            'BARU'
        )->count();

        $pengajuanTahunIni = PengajuanCsr::whereYear(
            'created_at',
            now()->year
        )->count();

        $pengajuans = PengajuanCsr::latest()
            ->paginate(10, ['*'], 'pengajuan_page');


        return view('pages.admin.csr', compact(
            'totalMitraAktif',
            'laporanTahunIni',
            'programDidukung',
            'mitras',

            'totalPengajuan',
            'pengajuanBaru',
            'pengajuanTahunIni',
            'pengajuans'
        ));
    }


    /**
     * Menyimpan data riwayat kemitraan
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_perusahaan' => 'required|string|max:150',
            'program_krm' => 'required|string|max:150',
            'dukungan' => 'required|string|max:150',
            'periode' => 'required|string|max:100',
            'status' => 'required|string|in:AKTIF,SELESAI',
        ]);

        Mitra::create($data);

        return redirect()
            ->back()
            ->with('success', 'Data Mitra CSR berhasil ditambahkan!');
    }


    /**
     * Update riwayat kemitraan
     */
    public function update(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);

        $data = $request->validate([
            'nama_perusahaan' => 'required|string|max:150',
            'program_krm' => 'required|string|max:150',
            'dukungan' => 'required|string|max:150',
            'periode' => 'required|string|max:100',
            'status' => 'required|string|in:AKTIF,SELESAI',
        ]);

        $mitra->update($data);

        return redirect()
            ->back()
            ->with('success', 'Data Mitra CSR berhasil diperbarui!');
    }


    /**
     * Hapus riwayat kemitraan
     */
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);

        $mitra->delete();

        return redirect()
            ->back()
            ->with('success', 'Data Mitra CSR berhasil dihapus!');
    }


    /**
     * Tandai pengajuan CSR sebagai sudah dibaca
     */
    public function readPengajuan($id)
    {
        $pengajuan = PengajuanCsr::findOrFail($id);

        $pengajuan->update([
            'status' => 'DIBACA',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pengajuan CSR ditandai sebagai sudah dibaca.');
    }


    /**
     * Hapus pengajuan CSR
     */
    public function destroyPengajuan($id)
    {
        $pengajuan = PengajuanCsr::findOrFail($id);

        $pengajuan->delete();

        return redirect()
            ->back()
            ->with('success', 'Pengajuan CSR berhasil dihapus.');
    }

    /**
 * Menyimpan pengajuan CSR dari halaman publik
 */
public function submitPengajuan(Request $request)
{
    $data = $request->validate([
        'nama' => 'required|string|max:150',
        'perusahaan' => 'required|string|max:150',
        'email' => 'required|email|max:150',
        'kategori' => 'required|string|in:bibit,edukasi,offset,lainnya',
        'pesan' => 'required|string|max:5000',
    ]);

    PengajuanCsr::create([
        'nama' => $data['nama'],
        'perusahaan' => $data['perusahaan'],
        'email' => $data['email'],
        'kategori' => $data['kategori'],
        'pesan' => $data['pesan'],
        'status' => 'BARU',
    ]);

    return redirect()
        ->back()
        ->with('success', 'Permintaan CSR berhasil dikirim. Tim KRM akan meninjau pengajuan Anda.');
}
}