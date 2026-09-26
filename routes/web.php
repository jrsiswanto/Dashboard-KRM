<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramAdminController;
use App\Http\Controllers\ProgramContentController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// --- Rute Halaman Publik ---
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


// Panggil menggunakan Controller agar datanya dikirim
Route::get('/admin-csr', [MitraController::class, 'index'])->name('admin.csr');

Route::get('/manajemen', function () {
    return view('pages.admin.manajemen');
})->name('manajemen');

// --- Rute Auth ---
Route::middleware('auth')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'Dasboard'])->name('admin.dashboard');
    Route::get('/manajemen', [UserController::class, 'index'])->name('manajemen');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->prefix('admin/aktivitas')->as('activity.')->group(function () {
    Route::get('/', 'activityIndex')->name('index');
    Route::post('/', 'activityStore')->name('store');
    Route::put('/{id}', 'activityUpdate')->name('update');
    Route::delete('/{id}', 'activityDestroy')->name('destroy');
});

// --- Rute Admin Program (Diperbaiki) ---
// Arahkan /tambah-program langsung ke method index Controller
Route::get('/tambah-program', [ProgramAdminController::class, 'index'])->name('tambah-program');
Route::get('/admin/program/api/{id}', [App\Http\Controllers\ProgramAdminController::class, 'getProgramData']);

Route::prefix('admin')->group(function () {
    Route::get('/program', [ProgramAdminController::class, 'index'])->name('admin.program');
    Route::get('/program/api/{id}', [ProgramAdminController::class, 'getProgramData']);
    Route::post('/program/save', [ProgramAdminController::class, 'save'])->name('admin.program.save');
});

Route::resource('program_content', ProgramContentController::class);

require __DIR__.'/auth.php';