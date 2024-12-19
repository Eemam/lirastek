<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home', [
        'items' => DB::table('barangs')->paginate(10)->withQueryString(),
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'items' => DB::table('barangs')->paginate(10)->withQueryString(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('barang', BarangController::class);
});

require __DIR__.'/auth.php';
