<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/program', 'pages.program')->name('program');

Route::view('/biodiversitas', 'pages.biodiversitas')->name('biodiversitas');

Route::view('/produk-olahan', 'pages.produk-olahan')->name('produk-olahan');

Route::view('/csr', 'pages.csr')->name('csr');

Route::view('/karbon-trading', 'pages.karbon-trading')->name('karbon-trading');

Route::view('/pirolisis', 'pages.pirolisis')->name('pirolisis');

Route::view('/solar-cell', 'pages.solar-cell')->name('solar-cell');

Route::view('/silvo-fishery', 'pages.silvo-fishery')->name('silvo-fishery');

Route::view('/terangin', 'pages.terangin')->name('terangin');

Route::view('/hubungi-kami', 'pages.hubungi-kami')->name('hubungi-kami');

Route::get('/admin-dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('admin.dashboard');

Route::get('/dokumentasi', function () {
        return view('pages.admin.dokumentasi');
    })->name('dokumentasi');

Route::get('/tambah-program', function () {
        return view('pages.admin.tambahprogram');
    })->name('tambah-program');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
