<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramAdminController;
use App\Http\Controllers\ProgramContentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/program', 'program')->name('program');
    Route::get('/biodiversitas', 'biodiversitas')->name('biodiversitas');
    Route::get('/produk-olahan', 'produkOlahan')->name('produk-olahan');
    Route::get('/csr', 'csr')->name('csr');
    Route::get('/karbon-trading', 'karbonTrading')->name('karbon-trading');
    Route::get('/pirolisis', 'pirolisis')->name('pirolisis');
    Route::get('/solar-cell', 'solarCell')->name('solar-cell');
    Route::get('/silvo-fishery', 'silvoFishery')->name('silvo-fishery');
    Route::get('/terangin', 'terangin')->name('terangin');
    Route::get('/hubungi-kami', 'hubungiKami')->name('hubungi-kami');
});

// Route untuk fitur CSR (GET, POST, PUT, DELETE)
Route::controller(MitraController::class)->prefix('admin/csr')->group(function () {
    Route::get('/', 'index')->name('admin.csr');
    Route::post('/', 'store')->name('admin.csr.store');
    Route::put('/{id}', 'update')->name('admin.csr.update');
    Route::delete('/{id}', 'destroy')->name('admin.csr.destroy');
});

Route::get('/tambah-program', [ProgramAdminController::class, 'index'])->name('tambah-program');
Route::get('/hubungi-kami', [ContactController::class, 'index'])
    ->name('hubungi-kami');

Route::post('/hubungi-kami', [ContactController::class, 'store'])
    ->name('hubungi-kami.store');

Route::prefix('admin')->group(function () {

    Route::get('/pesan', [ContactController::class, 'adminIndex'])
        ->name('admin.contact');

    Route::patch('/pesan/{contact}/dibaca', [ContactController::class, 'markAsRead'])
        ->name('admin.contact.read');

    Route::delete('/pesan/{contact}', [ContactController::class, 'destroy'])
        ->name('admin.contact.destroy');

});

Route::put('/admin/csr/pengajuan/{id}/read', [MitraController::class, 'readPengajuan'])
    ->name('admin.csr.pengajuan.read');

Route::delete('/admin/csr/pengajuan/{id}', [MitraController::class, 'destroyPengajuan'])
    ->name('admin.csr.pengajuan.destroy');

Route::post('/csr/pengajuan', [MitraController::class, 'submitPengajuan'])
    ->name('csr.pengajuan.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'Dasboard'])->name('admin.dashboard');
    
    // Route Manajemen Pengguna (CRUD Lengkap)
    Route::controller(UserController::class)->prefix('admin/manajemen')->group(function () {
        Route::get('/', 'index')->name('manajemen');
        Route::post('/', 'store')->name('manajemen.store');
        Route::put('/{id}', 'update')->name('manajemen.update');
        Route::delete('/{id}', 'destroy')->name('manajemen.destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

Route::controller(AdminController::class)->prefix('admin/aktivitas')->as('activity.')->group(function () {
    Route::get('/', 'activityIndex')->name('index');
    Route::post('/', 'activityStore')->name('store');
    Route::put('/{id}', 'activityUpdate')->name('update');
    Route::delete('/{id}', 'activityDestroy')->name('destroy');
});

Route::controller(ProgramAdminController::class)->prefix('admin/program')->group(function () {
    Route::get('/', 'index')->name('admin.program');
    Route::get('/api/{id}', 'getProgramData');
    Route::post('/save', 'save')->name('admin.program.save');

    Route::delete('/{id}', 'destroy')->name('admin.program.destroy');
});

Route::resource('program_content', ProgramContentController::class);

require __DIR__.'/auth.php';