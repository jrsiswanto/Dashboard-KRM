@extends('layouts.app')

@section('title', 'Kebun Raya Mangrove Surabaya — Konservasi, Inovasi & Pemberdayaan Pesisir')
@php($active = 'home')

@section('content')

    <x-hero
        image="assets/Home.jpg"
        eyebrow="KEBUN RAYA MANGROVE SURABAYA"
        title="Melangkah Bersama Menjaga Masa Depan Hijau Surabaya"
        highlight="Menjaga Masa Depan Hijau"
        description="Selamat datang di portal resmi Kebun Raya Mangrove (KRM) Surabaya. Kami mengintegrasikan pelestarian alam, inovasi teknologi ramah lingkungan, dan pemberdayaan ekonomi masyarakat pesisir."
        primaryLabel="Lihat Program Kami"
        :primaryUrl="route('program')"
        secondaryLabel="Pelajari Biodiversitas"
        :secondaryUrl="route('biodiversitas')"
    />

    {{-- Data & Dampak KRM Surabaya --}}
    <section class="krm-stats">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-2">
                <div>
                    <span class="krm-section-eyebrow">REAL-TIME DASHBOARD</span>
                    <h2 class="krm-section-title krm-mb-0">Data &amp; Dampak KRM Surabaya</h2>
                </div>
                <a href="{{ route('karbon-trading') }}" class="krm-program-card__link">Lihat laporan lengkap <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="krm-stats__grid">
                <x-statistic-card icon="fa-map-location-dot" value="30,2" unit="Hektar" label="Luas Area" sublabel="Kawasan Konservasi Hijau" :live="true" />
                <x-statistic-card icon="fa-chart-line" value="1.850" unit="Ton/Thn" label="Karbon Terserap" sublabel="Kontribusi Karbon Trading" :live="true" />
                <x-statistic-card icon="fa-seedling" value="42+" label="Spesies Mangrove" sublabel="Biodiversitas Flora &amp; Fauna" :live="true" />
                <x-statistic-card icon="fa-solar-panel" value="8,4" unit="kW" label="Energi Terbarukan" sublabel="Produksi Solar Cell &amp; Pirolisis" :live="true" />
            </div>
        </div>
    </section>

    {{-- Program --}}
    <section class="krm-programs">
        <div class="container">
            <span class="krm-section-eyebrow">PROGRAM UNGGULAN</span>
            <h2 class="krm-section-title">Program yang menjaga kawasan sekaligus memberdayakan warga pesisir</h2>

            <div class="krm-programs__grid">
                <x-program-card
                    icon="fa-fire-flame-curved"
                    title="Pirolisis &amp; Solar Cell"
                    description="Konversi limbah biomassa menjadi energi alternatif serta pemanfaatan pembangkit listrik tenaga surya mandiri untuk operasional kawasan."
                    :url="route('pirolisis')"
                />
                <x-program-card
                    icon="fa-leaf"
                    title="Keragaman Biodiversitas"
                    description="Rumah bagi puluhan spesies mangrove terlindungi serta habitat alami bagi fauna pesisir pantai utara Surabaya."
                    :url="route('biodiversitas')"
                />
                <x-program-card
                    icon="fa-fish"
                    title="Produk Olahan &amp; Silvo Fishery"
                    description="Integrasi budidaya perikanan tradisional (wana mina) dengan hilirisasi produk lokal berbahan dasar mangrove."
                    :url="route('produk-olahan')"
                />
            </div>
        </div>
    </section>

    <section class="krm-csr-band">
        <div class="container">
            <div class="krm-cta__box" data-animate="fade-up">
                <div class="krm-cta__text">
                    <span class="krm-cta__eyebrow">KOLABORASI BISNIS</span>
                    <h2 class="krm-cta__title">Corporate Social Responsibility &amp; Karbon Trading</h2>
                    <p class="krm-cta__desc">Bergabunglah dalam program kemitraan karbon dan CSR bersama KRM Surabaya untuk masa depan yang lebih hijau.</p>
                </div>
                <div class="krm-cta__actions">
                    <a href="{{ route('csr') }}" class="btn krm-btn krm-btn--primary">CSR Partnership <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="{{ route('karbon-trading') }}" class="krm-cta__link">Karbon Trading</a>
                </div>
            </div>
        </div>
    </section>

    <x-about-strip 
        image="assets/Home2.jpg"
        :related="[
            ['icon' => 'fa-sun', 'title' => 'Biodiversitas Mangrove', 'desc' => 'Koleksi spesies mangrove yang tumbuh di kawasan KRM.', 'url' => route('biodiversitas')],
            ['icon' => 'fa-right-left', 'title' => 'Produk Olahan Mangrove', 'desc' => 'Hasil olahan komunitas dari buah dan daun mangrove.', 'url' => route('produk-olahan')],
        ]" 
    />

@endsection