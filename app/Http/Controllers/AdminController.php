<?php

namespace App\Http\Controllers;

use App\Models\User; // Tambahkan ini
use App\Models\Program;
use App\Models\Activity;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk enkripsi password

class AdminController extends Controller
{
    public function Dasboard()
    {
        // 1. Data Stat (Atas)
        $totalProgram = Program::count();
        
        // UBAH: Gunakan kolom 'tanggal'
        $aktivitasBulanIni = Activity::whereMonth('tanggal', date('m'))
                                     ->whereYear('tanggal', date('Y'))
                                     ->count();
                                     
        $totalMitra = Mitra::count();

        // 2. Data Tabel Program (Tampil 5 terbaru)
        $programs = Program::latest()->take(5)->get();

        // 3. Data Grafik Aktivitas Per Bulan
        $aktivitasBulanan = [];
        for ($i = 1; $i <= 12; $i++) {
            // UBAH: Gunakan kolom 'tanggal'
            $aktivitasBulanan[$i] = Activity::whereMonth('tanggal', $i)
                                            ->whereYear('tanggal', date('Y'))
                                            ->count();
        }
        $maksAktivitas = max($aktivitasBulanan) > 0 ? max($aktivitasBulanan) : 1;

        // 4. Data Aktivitas Terakhir (Sidebar Kanan)
        // UBAH: Urutkan berdasarkan kolom 'tanggal'
        $aktivitasTerakhir = Activity::orderBy('tanggal', 'desc')->take(5)->get();

        return view('pages.admin.dashboard', compact(
            'totalProgram', 'aktivitasBulanIni', 'totalMitra',
            'programs', 'aktivitasBulanan', 'maksAktivitas', 'aktivitasTerakhir'
        ));
    }
    
    // ==========================================
    // MODULE: AKTIVITAS
    // ==========================================
    public function activityIndex()
    {
        $activities = Activity::orderBy('tanggal', 'desc')->get();
        return view('pages.admin.aktivitas', compact('activities')); 
    }

    public function activityStore(Request $request)
    {
        $data = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'tanggal'   => 'required|date'
        ]);

        Activity::create($data);
        return redirect()->route('activity.index')->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    public function activityUpdate(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $data = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'tanggal'   => 'required|date'
        ]);

        $activity->update($data);
        return redirect()->back()->with('success', 'Data Aktivitas berhasil diperbarui!');
    }

    public function activityDestroy($id)
    {
        Activity::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data Aktivitas berhasil dihapus!');
    }


    // ==========================================
    // MODULE: MANAJEMEN PENGGUNA
    // ==========================================
    
    public function manajemenIndex(Request $request)
    {
        $query = User::query();

        // Filter Pencarian (Nama / Email)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        // Filter Peran (Role)
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Menghitung total pengguna keseluruhan (tanpa pagination)
        $totalUsers = User::count();

        // Mengambil data pengguna dengan pagination (10 data per halaman)
        $users = $query->latest()->paginate(10);

        // Pastikan view Anda tersimpan di 'resources/views/pages/admin/manajemen.blade.php'
        // Jika path berbeda, sesuaikan nama string view di bawah ini
        return view('pages.admin.manajemen', compact('users', 'totalUsers'));
    }

    public function manajemenStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'required|in:super-admin,operator-field',
            'status'   => 'required|in:aktif,nonaktif',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role'     => $request->role,
            'status'   => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data pengguna berhasil ditambahkan!');
    }

    public function manajemenUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Nullable karena opsional saat edit
            'role'     => 'required|in:super-admin,operator-field',
            'status'   => 'required|in:aktif,nonaktif',
        ]);

        $updateData = [
            'name'   => $request->name,
            'email'  => $request->email,
            'role'   => $request->role,
            'status' => $request->status,
        ];

        // Jika password diisi, enkripsi dan masukkan ke array update
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui!');
    }

    public function manajemenDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus!');
    }
}