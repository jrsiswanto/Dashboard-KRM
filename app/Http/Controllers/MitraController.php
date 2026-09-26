<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
{
    // Menghitung statistik untuk Summary Cards
    $totalMitraAktif = Mitra::where('status', 'AKTIF')->count();
    $laporanTahunIni = Mitra::whereYear('created_at', date('Y'))->count();
    $programDidukung = Mitra::distinct('program_krm')->count('program_krm');

    // Mengambil data mitra dengan Pagination (misal 10 per halaman)
    $mitras = Mitra::latest()->paginate(10);

    return view('pages.admin.csr', compact(
        'totalMitraAktif', 
        'laporanTahunIni', 
        'programDidukung', 
        'mitras'
    )); 
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_perusahaan' => 'required|string|max:150',
            'program_krm' => 'required|string|max:150',
            'dukungan' => 'required|string|max:150',
            'periode' => 'required|string|max:100',
            'status' => 'required|string|in:AKTIF,SELESAI'
        ]);

        Mitra::create($data);

        return redirect()->back()->with('success', 'Data Mitra CSR berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);

        $data = $request->validate([
            'nama_perusahaan' => 'required|string|max:150',
            'program_krm' => 'required|string|max:150',
            'dukungan' => 'required|string|max:150',
            'periode' => 'required|string|max:100',
            'status' => 'required|string|in:AKTIF,SELESAI'
        ]);

        $mitra->update($data);

        return redirect()->back()->with('success', 'Data Mitra CSR berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();

        return redirect()->back()->with('success', 'Data Mitra CSR berhasil dihapus!');
    }
}