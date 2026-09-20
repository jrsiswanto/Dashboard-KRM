@extends('layouts.app')

@section('title', 'Pirolisis — Dari Limbah Menjadi Energi | KRM Surabaya')
@php($active = 'program')

@section('content')

    <x-hero
        image="assets/Pirolisis Hero.jpg"
        title="Pirolisis: Dari Limbah Menjadi Energi"
        description="Mengubah limbah biomassa dan sisa tanaman mangrove menjadi arang (biochar), bio-oil, dan syngas melalui proses pembakaran minim oksigen — mengurangi sampah kawasan sekaligus menghasilkan energi alternatif."
        primaryLabel="Lihat Program Kami"
        :primaryUrl="route('program')"
        secondaryLabel="Pelajari Biodiversitas"
        :secondaryUrl="route('biodiversitas')"
    />

    <x-info-bar :items="[
        ['label' => 'SUHU PROSES', 'value' => '300–600°C'],
        ['label' => 'BAHAN BAKU', 'value' => 'Biomassa'],
        ['label' => 'OUTPUT UTAMA', 'value' => '3 Jenis'],
        ['label' => 'KATEGORI', 'value' => 'Energi'],
    ]" />

    <section style="padding-top: 96px;">
        <div class="container">
            <div class="krm-split" data-animate="fade-up">
                <div>
                    <h2 class="krm-section-title">Membakar tanpa membiarkan udara masuk.</h2>
                    <p class="krm-muted">Pirolisis adalah proses dekomposisi termokimia bahan organik pada suhu tinggi tanpa atau dengan sedikit oksigen. Dengan mencegah pembakaran sempurna, proses ini memisahkan biomassa menjadi tiga produk bernilai: padatan (biochar), cairan (bio-oil), dan gas (syngas).</p>
                    <p class="krm-muted">Di KRM Surabaya, reaktor pirolisis mengolah ranting, daun kering, dan sisa produksi olahan mangrove yang sebelumnya menjadi limbah kawasan.</p>
                </div>
                
                {{-- Pembaruan: Foto Reaktor Mesin Pirolisis Utama --}}
                <div class="krm-split__image krm-card-plain p-0" style="overflow:hidden;">
                    <img src="{{ asset('assets/Pirolisis Utama.jpg') }}" 
                         alt="Reaktor Pirolisis KRM Surabaya" 
                         loading="lazy" 
                         style="width:100%;height:340px;object-fit:cover;display:block;">
                </div>
            </div>
        </div>
    </section>

    <x-step-list
        title="Empat tahap, dari limbah ke energi."
        :steps="[
            ['title' => 'Pengumpulan Limbah', 'desc' => 'Ranting, daun kering, dan sisa produksi olahan mangrove dikumpulkan dari kawasan kebun.'],
            ['title' => 'Pengeringan', 'desc' => 'Biomassa dikeringkan untuk mengurangi kadar air sebelum masuk ke reaktor pirolisis.'],
            ['title' => 'Proses Pirolisis', 'desc' => 'Biomassa dipanaskan pada suhu 300–600°C tanpa oksigen di dalam reaktor tertutup.'],
            ['title' => 'Pemisahan Output', 'desc' => 'Hasil proses dipisahkan menjadi biochar, bio-oil, dan syngas sesuai fase dan suhu kondensasi.'],
        ]"
    />

    <section>
        <div class="container">
            <div class="krm-card-plain" data-animate="fade-up">
                <span class="krm-section-eyebrow">TENTANG KRM SURABAYA</span>
                <h2 class="krm-section-title">Ekosistem Hidup di Jantung <span style="color:var(--krm-emerald);">Pesisir Utara</span></h2>
                <x-output-cards :items="[
                    ['image' => 'assets/Pirolisis 1.jpg', 'title' => 'Biochar (Arang)', 'desc' => 'Digunakan sebagai pembenah tanah dan media tanam yang menyimpan karbon jangka panjang.'],
                    ['image' => 'assets/Pirolisis 2.jpg', 'title' => 'Bio-oil', 'desc' => 'Cairan hasil kondensasi asap berpotensi diolah lebih lanjut menjadi bahan bakar cair.'],
                    ['image' => 'assets/Pirolisis 3.jpg', 'title' => 'Syngas', 'desc' => 'Gas sintesis yang dapat dibakar kembali untuk membantu menjaga suhu reaktor tetap stabil.'],
                ]" />
            </div>
        </div>
    </section>

    <x-feature-grid
        :features="[
            ['icon' => 'fa-trash-can', 'title' => 'Kurangi Limbah', 'desc' => 'Sisa biomassa yang tadinya dibuang kini punya jalur pemanfaatan.'],
            ['icon' => 'fa-bolt', 'title' => 'Hasikan Energi', 'desc' => 'Syngas dan bio-oil menjadi sumber energi alternatif bagi operasional kawasan.'],
            ['icon' => 'fa-cloud', 'title' => 'Simpan Karbon', 'desc' => 'Biochar mengunci karbon dalam bentuk padat untuk jangka waktu panjang.'],
        ]"
    />

    <x-about-strip
        image="assets/Home2.jpg"
        :related="[
            ['icon' => 'fa-solar-panel', 'title' => 'Solar Cell', 'desc' => 'Panel surya untuk kebutuhan listrik mandiri kawasan.', 'url' => route('solar-cell')],
            ['icon' => 'fa-wind', 'title' => 'Terangin', 'desc' => 'Energi angin pesisir untuk penerangan kawasan.', 'url' => route('terangin')],
        ]"
    />

@endsection