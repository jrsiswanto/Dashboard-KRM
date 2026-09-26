<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('tanggal', 'desc')->get();
        return view('pages.admin.aktivitas', compact('activities')); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'tanggal' => 'required|date'
        ]);

        Activity::create($data);

        return redirect()->back()->with('success', 'Data Aktivitas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $data = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'tanggal' => 'required|date'
        ]);

        $activity->update($data);

        return redirect()->back()->with('success', 'Data Aktivitas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->back()->with('success', 'Data Aktivitas berhasil dihapus!');
    }
}