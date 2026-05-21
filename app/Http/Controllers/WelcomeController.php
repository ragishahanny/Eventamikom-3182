<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Event; // Tambahkan ini agar bisa memanggil model Event
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request) // Tambahkan parameter Request di sini
    {
        // 1. Mengambil semua data kategori untuk tombol filter
        $categories = Category::orderBy('name', 'asc')->get();

        // 2. Mengambil semua data partner bisnis terbaru
        $partners = Partner::latest()->get();

        // 3. Mulai query untuk mengambil data Event dinamis
        $eventQuery = Event::with('category'); // Pastikan model Event punya relasi 'category'

        // JIKA USER KLIK TOMBOL KATEGORI, SARING DATA EVENT-NYA
        if ($request->has('category') && $request->category != '') {
            $eventQuery->where('category_id', $request->category);
        }

        // Ambil data event terbaru
        $events = $eventQuery->latest()->get();

        // Oper semua data ke view welcome
        return view('welcome', compact('categories', 'partners', 'events'));
    }
}