@extends('layouts.app')

@section('title', 'Solar Cell — Listrik dari Cahaya Matahari | KRM Surabaya')
@php($active = 'program')

@section('content')

    <x-hero
        image="assets/Solar Cell Hero.jpg"
        title="Solar Cell: Listrik dari Cahaya Matahari"
        description="Rangkaian panel surya yang mengubah cahaya matahari menjadi listrik untuk penerangan, pompa air, dan kebutuhan operasional kawasan — mengurangi ketergantungan pada jaringan PLN sekaligus memangkas emisi karbon kawasan."
        primaryLabel="Lihat Program Kami"
        :primaryUrl="route('program')"
        secondaryLabel="Pelajari Biodiversitas"
        :secondaryUrl="route('biodiversitas')"
    />

    <x-info-bar :items="[
        ['label' => 'KAPASITAS TERPASANG', 'value' => '8,4 kWp'],
        ['label' => 'JENIS PANEL', 'value' => 'Monokristalin'],
        ['label' => 'PRODUKSI HARIAN', 'value' => '34 kWh'],
        ['label' => 'KATEGORI', 'value' => 'Energi'],
    ]" />

    <section style="padding-top: 96px;">
        <div class="container">
            <div class="krm-split" data-animate="fade-up">
                <div>
                    <h2 class="krm-section-title">Cahaya matahari, diubah jadi arus listrik.</h2>
                    <p class="krm-muted">Solar cell atau sel fotovoltaik adalah komponen yang mengubah energi cahaya matahari langsung menjadi listrik arus searah (DC) melalui efek fotovoltaik. Susunan sel ini dirangkai menjadi panel, lalu beberapa panel dirangkai menjadi satu sistem pembangkit.</p>
                    <p class="krm-muted">Di KRM Surabaya, sistem solar cell dipasang di area terbuka kawasan untuk menyuplai listrik penerangan jalur kunjungan, pompa air kolam mangrove, dan perangkat monitoring — mengurangi beban listrik dari jaringan PLN.</p>
                </div>
                <div class="krm-split__image">
                    <img src="{{ asset('assets/Solar Cell.jpg') }}" alt="Panel surya terpasang di kawasan KRM Surabaya" loading="lazy" style="height:320px;">
                </div>
            </div>
        </div>
    </section>

    <x-step-list
        title="Empat tahap, dari cahaya ke listrik siap pakai."
        :steps="[
            ['title' => 'Penyerapan Cahaya', 'desc' => 'Panel surya menyerap foton dari sinar matahari yang jatuh pada permukaan sel fotovoltaik.'],
            ['title' => 'Konversi ke Arus DC', 'desc' => 'Efek fotovoltaik pada sel silikon menghasilkan arus listrik searah (DC).'],
            ['title' => 'Inversi ke Arus AC', 'desc' => 'Inverter mengubah arus DC menjadi arus AC yang sesuai untuk peralatan kawasan.'],
            ['title' => 'Distribusi & Simpan', 'desc' => 'Listrik didistribusikan ke jalur penerangan dan pompa, kelebihannya disimpan dalam baterai.'],
        ]"
    />

    <section>
        <div class="container">
            <div class="krm-card-plain" data-animate="fade-up">
                <span class="krm-section-eyebrow">TENTANG KRM SURABAYA</span>
                <h2 class="krm-section-title">Ekosistem Hidup di Jantung <span style="color:var(--krm-emerald);">Pesisir Utara</span></h2>
                <x-output-cards :items="[
                    ['image' => 'assets/Solar Cell 1.jpg', 'title' => 'Jalur Kunjungan', 'desc' => 'Menyalakan lampu jalur edukasi dan area kawasan pada malam hari.'],
                    ['image' => 'assets/Solar Cell 2.jpg', 'title' => 'Pompa Kolam Mangrove', 'desc' => 'Menjaga sirkulasi air pada kolam pembibitan dan area konservasi.'],
                    ['image' => 'assets/Solar Cell 3.jpg', 'title' => 'Baterai Penyimpanan', 'desc' => 'Kelebihan produksi listrik disimpan untuk dipakai saat mendung atau malam hari.'],
                ]" />
            </div>
        </div>
    </section>

    <x-feature-grid
        :features="[
            ['icon' => 'fa-plug-circle-bolt', 'title' => 'Mandiri Energi', 'desc' => 'Operasional kawasan tidak lagi sepenuhnya bergantung pada jaringan PLN.'],
            ['icon' => 'fa-smog', 'title' => 'Rendah Emisi', 'desc' => 'Menggantikan kebutuhan listrik dari sumber berbahan bakar fosil.'],
            ['icon' => 'fa-chalkboard-user', 'title' => 'Sarana Edukasi', 'desc' => 'Panel dan data produksi jadi contoh nyata energi terbarukan bagi pengunjung.'],
        ]"
    />

    <x-about-strip :related="[
        ['icon' => 'fa-fire-flame-curved', 'title' => 'Pirolisis', 'desc' => 'Limbah biomassa diubah menjadi biochar, bio-oil, dan syngas.', 'url' => route('pirolisis')],
        ['icon' => 'fa-wind', 'title' => 'Terangin', 'desc' => 'Energi angin pesisir untuk penerangan kawasan.', 'url' => route('terangin')],
    ]" />

@endsection