<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('pages.hubungi-kami');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:150',
            ],

            'telepon' => [
                'nullable',
                'string',
                'max:20',
            ],

            'topik' => [
                'required',
                'in:Kunjungan & Edukasi,Kemitraan CSR,Karbon Trading,Produk Olahan Mangrove,Lainnya',
            ],

            'pesan' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        Contact::create($validated);

        return redirect()
            ->route('hubungi-kami')
            ->with(
                'success',
                'Terima kasih, pesan Anda telah terkirim. Kami akan segera merespons.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $contacts = Contact::latest()->get();

        $totalPesan = Contact::count();

        $pesanBaru = Contact::where('status', 'baru')->count();

        $pesanDibaca = Contact::where('status', 'dibaca')->count();

        return view('pages.admin.contact', compact(
            'contacts',
            'totalPesan',
            'pesanBaru',
            'pesanDibaca'
        ));
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update([
            'status' => 'dibaca',
        ]);

        return redirect()
            ->route('admin.contact')
            ->with('success', 'Pesan berhasil ditandai sebagai dibaca.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contact')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}