<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    // READ: Menampilkan daftar partner + Fitur Pencarian (Search Basic)
    public function index(Request $request) // <-- Tambahkan Request $request di sini
    {
        // Menangkap kata kunci dari form pencarian
        $search = $request->input('search');

        // Menggunakan kondisional, jika $search terisi maka lakukan filter LIKE
        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    // CREATE: Menyimpan partner baru beserta logonya
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:partners,name',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logoUrl = null;
        if ($request->hasFile('logo')) {
            // Menyimpan ke folder public/partners
            $path = $request->file('logo')->store('partners', 'public');
            $logoUrl = Storage::url($path);
        }

        Partner::create([
            'name' => $request->name,
            'logo_url' => $logoUrl,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan!');
    }

    // UPDATE: Mengubah data partner & mengganti file logo lama
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:partners,name,' . $partner->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logoUrl = $partner->logo_url;
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($partner->logo_url) {
                $oldPath = str_replace('/storage/', '', $partner->logo_url);
                Storage::disk('public')->delete($oldPath);
            }
            // Simpan logo baru
            $path = $request->file('logo')->store('partners', 'public');
            $logoUrl = Storage::url($path);
        }

        $partner->update([
            'name' => $request->name,
            'logo_url' => $logoUrl,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui!');
    }

    // DELETE: Menghapus partner beserta file logonya dari storage
    public function destroy(Partner $partner)
    {
        if ($partner->logo_url) {
            $oldPath = str_replace('/storage/', '', $partner->logo_url);
            Storage::disk('public')->delete($oldPath);
        }

        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus!');
    }
}