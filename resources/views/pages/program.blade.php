@extends('layouts.app')

@section('title', 'Program KRM Surabaya — Konservasi, Energi & Ekonomi Pesisir')
@php($active = 'program')

@section('content')

    <x-hero
        image="assets/Home.jpg"
        eyebrow="PROGRAM UNGGULAN"
        title="Program yang Menjaga Kawasan, Menghidupi Pesisir"
        highlight="Menghidupi Pesisir"
        description="Dari pengolahan energi terbarukan hingga pemberdayaan ekonomi warga, setiap program KRM Surabaya dirancang saling terhubung dalam satu ekosistem konservasi yang berkelanjutan."
    />

    <x-info-bar :items="[
        ['label' => 'PROGRAM AKTIF', 'value' => '6'],
        ['label' => 'KATEGORI', 'value' => 'Energi, Ekonomi, Konservasi'],
        ['label' => 'MITRA CSR', 'value' => '24+'],
        ['label' => 'SEJAK', 'value' => '2009'],
    ]" />

    <section class="krm-programs" style="padding-top: 96px;">
        <div class="container">
            <span class="krm-section-eyebrow">DAFTAR PROGRAM</span>
            <h2 class="krm-section-title">Lima program utama, satu tujuan konservasi</h2>

            <div class="krm-programs__grid">
                <x-program-card icon="fa-fire-flame-curved" title="Pirolisis" description="Mengubah limbah biomassa dan sisa tanaman mangrove menjadi biochar, bio-oil, dan syngas." :url="route('pirolisis')" />
                <x-program-card icon="fa-solar-panel" title="Solar Cell" description="Panel surya yang mengubah cahaya matahari menjadi listrik untuk kebutuhan operasional kawasan." :url="route('solar-cell')" />
                <x-program-card icon="fa-fish" title="Silvo Fishery" description="Sistem tambak yang menyisakan sabuk mangrove di sekeliling petak air, memadukan konservasi dan ekonomi." :url="route('silvo-fishery')" />
                <x-program-card icon="fa-wind" title="Terangin" description="Platform edukasi ekologi interaktif untuk generasi muda tentang pelestarian ekosistem mangrove." :url="route('terangin')" />
                <x-program-card icon="fa-basket-shopping" title="Produk Olahan Mangrove" description="Hilirisasi hasil hutan mangrove menjadi produk minuman kesehatan dan camilan bernilai ekonomi." :url="route('produk-olahan')" />
            </div>
        </div>
    </section>

    <x-about-strip :related="[
        ['icon' => 'fa-leaf', 'title' => 'Biodiversitas Mangrove', 'desc' => 'Koleksi spesies mangrove yang tumbuh di kawasan KRM.', 'url' => route('biodiversitas')],
        ['icon' => 'fa-chart-simple', 'title' => 'Karbon Trading', 'desc' => 'Dashboard transparansi aset karbon biru dari kawasan konservasi.', 'url' => route('karbon-trading')],
    ]" />

@endsection