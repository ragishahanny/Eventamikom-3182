<?php
// Ragisha hanny azalia putri //
// 24.12.3182 //

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| 1. RUTE UNTUK PENGUNJUNG UMUM / USER biasa
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});
Route::get('/kontak', function () { return view('contact'); });
Route::get('/profile', function () { return view('profile'); });
Route::get('/katalog', function () { return view('katalog'); });
Route::get('/bantuan', function () { return view('bantuan'); });

Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');

// Jika ada yang tidak sengaja mengetik /login, lempar ke login admin
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


/*
|--------------------------------------------------------------------------
| 2. RUTE AUTENTIKASI ADMIN (Bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| 3. RUTE PROTEKSI ADMIN (Hanya bisa diakses JIKA sudah login / Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Halaman utama admin: http://127.0.0.1:8000/admin atau /admin/dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']); 

    // Kelola Data Admin Resource (Mendukung semua fungsi CRUD)
    Route::resource('events', EventAdminController::class);
    Route::resource('partners', PartnerController::class);
    
    // Kelola Kategori (URL Bahasa Indonesia, Nama Rute Tetap 'admin.categories.index' dkk)
    Route::resource('kategori', CategoryController::class)->names('categories');
    
    // Kelola Transaksi Admin
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
});