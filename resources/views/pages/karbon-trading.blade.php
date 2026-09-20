@extends('layouts.app')

@section('title', 'Karbon Trading Dashboard — KRM Surabaya')
@php($active = 'karbon-trading')

@section('content')

    <x-hero
        image="assets/Karbon Trading Hero.jpg"
        title="Karbon Trading Dashboard"
        description="Pantau dan kelola aset karbon biru dari ekosistem mangrove kami. Transparansi dan integritas ekologis untuk masa depan yang berkelanjutan."
        primaryLabel="Unduh Laporan"
        primaryUrl="#"
    />

    <x-info-bar :items="[
        ['label' => 'TOTAL PENYERAPAN KARBON', 'value' => '45.210 tCO2e'],
        ['label' => 'AREA KONSERVASI AKTIF', 'value' => '2.850 Ha'],
        ['label' => 'NILAI KREDIT KARBON (ESTIMASI)', 'value' => '$1,2 Juta'],
        ['label' => 'STATUS SERTIFIKASI', 'value' => 'Verified Verra'],
    ]" />

    <section style="padding-top: 96px;">
        <div class="container">
            <div class="krm-card-plain" data-animate="fade-up">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                    <h2 class="h5 fw-bold mb-0" style="color:var(--krm-forest);">Tren Sekuestrasi vs Penjualan Kredit</h2>
                    <span class="krm-info-bar__label" style="background:var(--krm-off-white);padding:8px 14px;border-radius:999px;">Tahun Terakhir <i class="fa-solid fa-chevron-down ms-1"></i></span>
                </div>

                <div class="krm-bars">
                    <div class="krm-bars__col"><div class="krm-bars__fill" style="height:22%;background-color:#9fc6b8;"></div><span class="krm-bars__label">2019</span></div>
                    <div class="krm-bars__col"><div class="krm-bars__fill" style="height:38%;background-color:#7fb6a3;"></div><span class="krm-bars__label">2020</span></div>
                    <div class="krm-bars__col"><div class="krm-bars__fill" style="height:52%;background-color:#4f9c81;"></div><span class="krm-bars__label">2021</span></div>
                    <div class="krm-bars__col"><div class="krm-bars__fill" style="height:70%;background-color:var(--krm-emerald);"></div><span class="krm-bars__label">2022</span></div>
                    <div class="krm-bars__col"><div class="krm-bars__fill" style="height:100%;background-color:var(--krm-forest);"></div><span class="krm-bars__label">2023</span></div>
                    <div class="krm-bars__col"><div class="krm-bars__fill" style="height:86%;background-color:#1c5b78;"></div><span class="krm-bars__label">2024</span></div>
                </div>
            </div>
        </div>
    </section>

    <x-step-list
        title="Bagaimana Sistem Ini Bekerja"
        :steps="[
            ['title' => 'Konservasi & Pengukuran', 'desc' => 'Kami merawat ekosistem mangrove dan melakukan audit bio-massa secara berkala menggunakan teknologi satelit dan drone untuk mengukur serapan karbon aktual.'],
            ['title' => 'Verifikasi Independen', 'desc' => 'Data penyerapan dikirim ke lembaga sertifikasi internasional (seperti Verra atau Gold Standard) untuk diverifikasi dan diterbitkan sebagai Kredit Karbon bersertifikat.'],
            ['title' => 'Trading & Investasi Kembali', 'desc' => 'Perusahaan dapat membeli kredit ini untuk mengimbangi emisi mereka. Pendapatan diinvestasikan kembali 100% untuk perluasan area konservasi dan pemberdayaan masyarakat lokal.'],
        ]"
    />

    <x-about-strip
        image="assets/Home2.jpg"
        :related="[
            ['icon' => 'fa-handshake', 'title' => 'CSR Partnership', 'desc' => 'Kolaborasi program keberlanjutan dan ESG perusahaan.', 'url' => route('csr')],
            ['icon' => 'fa-leaf', 'title' => 'Biodiversitas Mangrove', 'desc' => 'Koleksi spesies mangrove yang dilindungi di kawasan.', 'url' => route('biodiversitas')],
        ]"
    />

@endsection