<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Kebun Raya Mangrove (KRM) Surabaya
|--------------------------------------------------------------------------
| Website frontend-only (Blade + HTML5 + CSS3 + JS vanilla + Bootstrap 5).
| Tidak ada database, API, auth, maupun admin panel. Setiap route hanya
| mengembalikan view statis dengan konten berbahasa Indonesia.
*/

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

Route::view('/login', 'pages.auth.login')->name('login');