<?php
// Ragisha hanny azalia putri//
//24.12.3182//
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController;


Route::get('/',[HomeController::class, 'index']
)->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');
Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentenag Aplikasi Event Hub</h1>';
});

Route::get('/kontak', function () {
    return view('contact');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// Route::get('/event', function () {
//     return view('admin.events');
// })->name('admin.events');

// Route::get('/transactions', function () {
//     return view('admin.transactions');
// })->name('admin.transactions');

// Route::get('/admin/kategori', function () {
//     return view('admin.categories.index');
// })->name('admin.kategori');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('events', EventAdminController::class);
    
    Route::get('/transactions', function () {
        return view('admin.transactions');
    })->name('transactions');

    Route::get('/kategori', function () {
        return view('admin.categories.index');
    })->name('kategori');
});

// Route::group(['prefix' => 'admin','as' => 'admin.'], function () {

// Route::get('/', [DashboardController::class,'index'])->name('dashboard');

// Route::get('/events', [EventController::class,'indexAdmin'])->name('events.index');

Route::get('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
Route::get('/login', function () {
    return redirect()->route('admin.login');
    })->name('login');
    // Grouping untuk URL berawalan /admin
    Route::prefix('admin')->name('admin.')->group(function () {
    // Rute Login bebas akses
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // Mengamankan Route Administrasi di balik tembok (Middleware)
    Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
});
});