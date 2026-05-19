<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        // Mengambil semua data kategori untuk ditampilkan di section platform
        $categories = Category::orderBy('name', 'asc')->get();

        // Mengambil semua data partner bisnis terbaru
        $partners = Partner::latest()->get();

        // Oper kedua data tersebut ke view welcome
        return view('welcome', compact('categories', 'partners'));
    }
}