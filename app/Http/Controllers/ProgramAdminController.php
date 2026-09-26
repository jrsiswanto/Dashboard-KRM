<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramAdminController extends Controller
{
    // Menampilkan halaman
    public function index()
    {
        $programs = Program::all();
    
    // Perbaiki path view dari 'admin.program' ke 'pages.admin.tambahprogram'
    return view('pages.admin.tambahprogram', compact('programs'));
    }

    // Mengembalikan data JSON untuk JavaScript
    public function getProgramData($id)
    {
        $program = Program::with('contents')->findOrFail($id);
        return response()->json($program);
    }

    // Menyimpan (Create baru) atau Mengupdate data
    public function save(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'status' => 'required|boolean',
            'gambar_utama' => 'nullable|image|max:2048',
        ]);

        // Jika ada ID, berarti Update. Jika tidak, berarti Create.
        $program = $request->program_id ? Program::findOrFail($request->program_id) : new Program();
        
        $program->nama = $request->nama;
        $program->judul = $request->judul;
        $program->deskripsi = $request->deskripsi;
        $program->status = $request->status;

        // Upload Gambar Utama Hero
        if ($request->hasFile('gambar_utama')) {
            // Hapus gambar lama jika ada
            if ($program->gambar_utama && Storage::disk('public')->exists('assets/'.$program->gambar_utama)) {
                Storage::disk('public')->delete('assets/'.$program->gambar_utama);
            }
            $file = $request->file('gambar_utama');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets'), $filename); // Simpan di folder public/assets
            $program->gambar_utama = $filename;
        }

        $program->save();

        // Mengelola Program Contents
        // Menghapus ID konten yang dihapus oleh user di frontend
        if ($request->deleted_contents) {
            $deletedIds = explode(',', $request->deleted_contents);
            ProgramContent::whereIn('id', $deletedIds)->delete();
        }

        // Menyimpan / Update Konten Section
        if ($request->has('contents')) {
            foreach ($request->contents as $contentData) {
                $content = isset($contentData['id']) ? ProgramContent::find($contentData['id']) : new ProgramContent();
                
                $content->program_id = $program->id;
                $content->judul = $contentData['judul'];
                $content->deskripsi = $contentData['deskripsi'];

                if (isset($contentData['gambar']) && $contentData['gambar']->isValid()) {
                    $cFile = $contentData['gambar'];
                    $cFilename = time() . '_content_' . $cFile->getClientOriginalName();
                    $cFile->move(public_path('assets'), $cFilename);
                    $content->gambar = $cFilename;
                }

                $content->save();
            }
        }

        return redirect()->back()->with('success', 'Data program berhasil disimpan!');
    }
}