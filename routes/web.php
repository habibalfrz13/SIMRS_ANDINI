<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini lo daftarin semua route web.
| Default Laravel login masih aktif, tapi route keuangan dibuat publik.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// halaman dashboard cuma bisa diakses setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route publik (gak butuh login)
Route::prefix('keuangan')->group(function() {

    // Halaman utama
    Route::get('/', [HomeController::class, 'indexKeuangan'])->name('home.keuangan');

    // DataTables AJAX
    Route::get('/data', [HomeController::class, 'getDataKeuangan'])->name('home.dataKeuangan');

    // Total embalase
    Route::get('/total-embalase', [HomeController::class, 'getTotalEmbalase'])->name('home.totalEmbalase');

    // Embalase Ralan
    Route::get('/embalase-ralan', [HomeController::class, 'getEmbalaseRalan'])->name('home.embalaseRalan');

    // Embalase Ranap
    Route::get('/embalase-ranap', [HomeController::class, 'getEmbalaseRanap'])->name('home.embalaseRanap');

});

// route yang butuh login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
