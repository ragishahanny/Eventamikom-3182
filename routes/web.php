<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    // Route CRUD Kategori otomatis (index, store, update, destroy, dll)
    Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Route yang sudah ada sebelumnya (events, categories... )
    
    // Tambahkan baris ini untuk partner:
    Route::resource('partners', PartnerController::class);
});

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');


// });